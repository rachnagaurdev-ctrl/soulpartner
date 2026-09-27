<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.customer', compact('user'));
    }

    public function bookings()
    {
        $user = Auth::user();
        $bookings = \App\Models\Booking::where(function ($q) use ($user) {
                $q->where('user_id', $user->id)
                  ->orWhere('partner_id', $user->id);
            })
            ->with(['user', 'partner', 'category'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('dashboard.bookings', compact('bookings', 'user'));
    }

    public function reviews()
    {
        $user = Auth::user();
        $reviews = \App\Models\Review::where('reviewee_id', $user->id)->with('reviewer')->latest()->get();
        return view('dashboard.reviews', compact('user', 'reviews'));
    }

    public function membership()
    {
        $user = Auth::user();
        $plans = \App\Models\MembershipPlan::active()->get();
        // Fallback hardcoded plans if table is empty
        if ($plans->isEmpty()) {
            $plans = collect([
                (object)[
                    'name' => 'Premium',
                    'slug' => 'premium',
                    'price' => 999.00,
                    'period' => 'month',
                    'is_popular' => true,
                    'features' => [
                        'Verified Profile Badge',
                        'Unlimited Chat & Messaging',
                        'HD Video Calls Access',
                        'Priority Search Ranking'
                    ]
                ]
            ]);
        }
        
        $currentPlanName = 'Basic Tier';
        $order = \App\Models\MembershipOrder::where('email', $user->email)
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->first();

        $purchaseDate = null;
        $expiryDate = null;

        if ($order) {
            $currentPlanName = $order->plan_name;
            $purchaseDate = $order->created_at->format('d M Y');
            
            $periodStr = strtolower(trim($order->billing_period));
            // e.g. "3 months", "1 year", "monthly", "month"
            if (str_contains($periodStr, 'month')) {
                // extract number if exists, e.g. "3 months"
                preg_match('/(\d+)/', $periodStr, $matches);
                $months = !empty($matches[1]) ? (int)$matches[1] : 1;
                $expiryDate = $order->created_at->addMonths($months)->format('d M Y');
            } elseif (str_contains($periodStr, 'year')) {
                preg_match('/(\d+)/', $periodStr, $matches);
                $years = !empty($matches[1]) ? (int)$matches[1] : 1;
                $expiryDate = $order->created_at->addYears($years)->format('d M Y');
            } elseif (str_contains($periodStr, 'day')) {
                preg_match('/(\d+)/', $periodStr, $matches);
                $days = !empty($matches[1]) ? (int)$matches[1] : 1;
                $expiryDate = $order->created_at->addDays($days)->format('d M Y');
            }
        } elseif ($user->is_verified) {
            // Fallback for manually verified users without orders
            $currentPlanName = 'Premium Tier';
        }

        return view('dashboard.membership', compact('user', 'plans', 'currentPlanName', 'order', 'purchaseDate', 'expiryDate'));
    }

    public function settings()
    {
        $user = Auth::user();
        return view('dashboard.settings', compact('user'));
    }

    public function toggleAutoRenew(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer',
            'status' => 'required|boolean'
        ]);

        $order = \App\Models\MembershipOrder::where('id', $request->order_id)
            ->where('email', Auth::user()->email)
            ->first();

        if ($order) {
            $order->auto_renew = $request->status;
            $order->save();
            
            // Simulate Razorpay Subscription Update (Requires actual subscription_id in production)
            if ($order->razorpay_order_id) { 
                $statusText = $request->status ? 'resume' : 'cancel';
                try {
                    $key = env('RAZORPAY_KEY_ID');
                    $secret = env('RAZORPAY_KEY_SECRET');
                    
                    // Note: Real Razorpay subscription updates require a 'subscription_id' not 'order_id'
                    // \Illuminate\Support\Facades\Http::withBasicAuth($key, $secret)
                    //    ->post("https://api.razorpay.com/v1/subscriptions/{$order->subscription_id}/$statusText");
                    
                    \Illuminate\Support\Facades\Log::info("Razorpay Auto-Renew $statusText simulated for order {$order->id}.");
                } catch (\Exception $e) {
                    \Illuminate\Support\Facades\Log::error('Razorpay auto-renew update failed: ' . $e->getMessage());
                }
            }

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Order not found.'], 404);
    }
}
