<?php

namespace App\Http\Controllers;

use App\Models\MembershipOrder;
use App\Models\MembershipPlan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    /**
     * Membership plans catalog — loaded from database.
     * Falls back to empty array if table is not yet seeded.
     */
    public static function getPlans(): array
    {
        try {
            $dbPlans = MembershipPlan::active()->get();
            if ($dbPlans->isEmpty()) {
                return [];
            }
            $plans = [];
            foreach ($dbPlans as $plan) {
                $plans[$plan->slug] = $plan->toCheckoutArray();
            }
            return $plans;
        } catch (\Exception $e) {
            // Table may not exist yet; return empty
            return [];
        }
    }

    /**
     * Display checkout page with membership selection
     */
    public function index(Request $request)
    {
        $plans = self::getPlans();

        // Determine the selected plan key
        $selectedPlanKey = strtolower($request->query('plan', 'gold'));
        if (!array_key_exists($selectedPlanKey, $plans)) {
            // Fall back to first available plan or 'gold'
            $selectedPlanKey = !empty($plans) ? array_key_first($plans) : 'gold';
        }

        $razorpayKey = env('RAZORPAY_KEY_ID');

        return view('checkout', [
            'plans'          => $plans,
            'selectedPlanKey'=> $selectedPlanKey,
            'selectedPlan'   => $plans[$selectedPlanKey] ?? [],
            'razorpayKey'    => $razorpayKey,
        ]);
    }

    /**
     * Process checkout & store membership order
     */
    public function process(Request $request)
    {
        $validSlugs = MembershipPlan::active()->pluck('slug')->toArray();
        if (empty($validSlugs)) {
            $validSlugs = ['silver', 'gold', 'premium', 'yearly'];
        }

        $validator = Validator::make($request->all(), [
            'full_name'       => 'required|string|max:255',
            'email'           => 'required|email|max:255',
            'phone'           => 'required|string|max:20',
            'membership_plan' => 'required|string|in:' . implode(',', $validSlugs),
            'payment_id'      => 'nullable|string|max:255',
            'payment_status'  => 'nullable|string|in:completed,pending,failed',
            'referral_code'   => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
                'message' => 'Please fill in all required fields.',
            ], 422);
        }

        $plans = self::getPlans();
        $planKey = strtolower($request->input('membership_plan'));
        $plan = $plans[$planKey] ?? $plans['gold'];

        $subtotal = (float) $plan['price'];
        $discount = 0.00;
        $coupon = strtoupper(trim($request->input('coupon_code', '')));

        if ($coupon === 'WELCOME50') {
            $discount = round($subtotal * 0.50, 2);
        } elseif ($coupon === 'LAUNCH10') {
            $discount = round($subtotal * 0.10, 2);
        }

        $tax = round(($subtotal - $discount) * 0.18, 2); // 18% GST standard or inclusive
        // We will make total = subtotal - discount (tax inclusive or additive - standard is subtotal - discount)
        $total = max(0, round($subtotal - $discount, 2));

        $orderNumber = MembershipOrder::generateOrderNumber();
        $paymentStatus = $request->input('payment_status', 'completed');
        $paymentId = $request->input('payment_id') ?: ('pay_mock_' . substr(md5(uniqid()), 0, 14));

        // Create membership order record
        $order = MembershipOrder::create([
            'order_number' => $orderNumber,
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => $request->input('password') ? Hash::make($request->input('password')) : null,
            'date_of_birth' => $request->input('date_of_birth'),
            'gender' => $request->input('gender'),
            'city' => $request->input('city'),
            'pincode' => $request->input('pincode'),
            'country' => $request->input('country', 'India'),
            'user_type' => $request->input('user_type', 'both'),
            'membership_plan' => $planKey,
            'plan_name' => $plan['name'],
            'billing_period' => $plan['period'],
            'matches_count' => $plan['matches'],
            'subtotal' => $subtotal,
            'discount_amount' => $discount,
            'tax_amount' => $tax,
            'total_amount' => $total,
            'coupon_code' => $coupon ?: null,
            'referral_code' => $request->input('referral_code'),
            'payment_method' => $request->input('payment_method', 'razorpay'),
            'payment_id' => $paymentId,
            'razorpay_order_id' => $request->input('razorpay_order_id'),
            'razorpay_signature' => $request->input('razorpay_signature'),
            'payment_status' => $paymentStatus,
            'status' => 'active',
            'notes' => 'Registered and paid via online checkout journey.',
            'metadata' => [
                'user_agent' => $request->userAgent(),
                'ip' => $request->ip(),
            ],
        ]);

        // Auto-login the customer after successful checkout
        $loggedIn = false;
        try {
            // Find or create the user account
            $user = User::where('email', $request->input('email'))->first();
            $referrer = null;

            if ($request->input('referral_code')) {
                $referrer = User::where('referral_code', strtoupper($request->input('referral_code')))->first();
            }
            $response = 0;
            if (!$user) {
                $user = User::create([
                    'name'     => $request->input('full_name'),
                    'email'    => $request->input('email'),
                    'password' => Hash::make($request->input('password') ?: \Illuminate\Support\Str::random(10)),
                    'phone'    => $request->input('phone'),
                    'gender'   => $request->input('gender'),
                    'city'     => $request->input('city'),
                    'pincode'  => $request->input('pincode'),
                    'country'  => $request->input('country'),
                    'iwantto'  => $request->input('user_type'),
                    'dob'      => $request->input('date_of_birth'),
                    'referred_by' => $referrer ? $referrer->id : null,
                ]);
                $response = 1;

                if ($referrer) {
                    $referrer->wallet_balance += 100;
                    $referrer->save();
                    $response = 2;
                }
            } elseif ($user && $referrer && is_null($user->referred_by) && $user->id !== $referrer->id) {
                $user->referred_by = $referrer->id;
                $user->save();
                
                $referrer->wallet_balance += 100;
                $referrer->save();
                $response = 3;
            }

            // Log in the customer (web guard) so they land on their dashboard
            if ($user) {
                Auth::guard('web')->login($user, true); // true = remember me
                $loggedIn = true;
            }
        } catch (\Exception $e) {
            // Non-fatal: proceed without login if something goes wrong
        }

        return response()->json([
            'success'       => true,
            'order_number'  => $order->order_number,
            'payment_id'    => $order->payment_id,
            'plan_name'     => $order->plan_name,
            'total_amount'  => $order->total_amount,
            'message'       => 'Membership activated successfully!',
            'order'         => $order,
            'logged_in'     => $loggedIn,
            'dashboard_url' => url('/dashboard'),
            'response'      => $response,
            'referrer' => $referrer,
            'request' => $request->all()
        ]);
    }
}
