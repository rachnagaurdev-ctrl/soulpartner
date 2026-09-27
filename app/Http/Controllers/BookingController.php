<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function initiate(Request $request, $profile_id)
    {
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'category_id' => 'required',
            'razorpay_payment_id' => 'required'
        ]);

        $partner = User::where('profile_id', $profile_id)->firstOrFail();
        $user = Auth::user();

        // Check Membership & Matches Limit
        $order = \App\Models\MembershipOrder::where('email', $user->email)
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'You need an active membership plan to make a booking.'
            ], 403);
        }

        $periodStr = strtolower(trim($order->billing_period));
        $expiryDate = null;
        if (str_contains($periodStr, 'month')) {
            preg_match('/(\d+)/', $periodStr, $matches);
            $months = !empty($matches[1]) ? (int)$matches[1] : 1;
            $expiryDate = $order->created_at->addMonths($months);
        } elseif (str_contains($periodStr, 'year')) {
            preg_match('/(\d+)/', $periodStr, $matches);
            $years = !empty($matches[1]) ? (int)$matches[1] : 1;
            $expiryDate = $order->created_at->addYears($years);
        } elseif (str_contains($periodStr, 'day')) {
            preg_match('/(\d+)/', $periodStr, $matches);
            $days = !empty($matches[1]) ? (int)$matches[1] : 1;
            $expiryDate = $order->created_at->addDays($days);
        }

        if ($expiryDate && now()->greaterThan($expiryDate)) {
            $order->update(['status' => 'expired']);
            return response()->json([
                'success' => false,
                'message' => 'Your membership plan has expired. Please upgrade your plan.'
            ], 403);
        }

        $matchesLimit = (int) $order->matches_count;
        if ($matchesLimit > 0 && $matchesLimit < 9999) {
            $bookingsSincePurchase = \App\Models\Booking::where('user_id', $user->id)
                ->where('created_at', '>=', $order->created_at)
                ->count();
                
            if ($bookingsSincePurchase >= $matchesLimit) {
                return response()->json([
                    'success' => false,
                    'message' => 'You have reached your limit of '.$matchesLimit.' matches/bookings for this plan. Please upgrade.'
                ], 403);
            }
        }

        if ($user->role === 'partner') {
            return response()->json([
                'success' => false,
                'message' => 'Partners are not allowed to book other partners.'
            ], 403);
        }

        if (Auth::id() === $partner->id) {
            return response()->json([
                'success' => false,
                'message' => 'You cannot book yourself.'
            ], 403);
        }

        $category = \App\Models\Category::findOrFail($request->category_id);
        $partnerPrices = is_string($partner->category_prices) ? json_decode($partner->category_prices, true) : ($partner->category_prices ?? []);
        $basePrice = $partnerPrices[$category->slug] ?? $category->prices;
        
        $reqDate = date('Y-m-d', strtotime($request->date));
        $reqStart = date('H:i:s', strtotime($request->time));
        $reqEnd = $request->end_time ? date('H:i:s', strtotime($request->end_time)) : date('H:i:s', strtotime($request->time . ' +1 hour'));
        
        $conflict = Booking::where('partner_id', $partner->id)
            ->where('booking_date', $reqDate)
            ->where('status', 'confirmed')
            ->where(function($q) use ($reqStart, $reqEnd) {
                // Check if existing bookings overlap with requested time
                // Overlap exists if (existing_start < requested_end) AND (existing_end > requested_start)
                $q->whereRaw('booking_time < ? AND COALESCE(end_time, booking_time) > ?', [$reqEnd, $reqStart]);
            })->exists();

        if ($conflict) {
            return response()->json([
                'success' => false,
                'message' => 'The partner is already booked for the selected time slot.'
            ], 400);
        }
        
        $expectedAmount = $basePrice;
        if ($category->pricing_type === 'hourly' && $request->time && $request->end_time) {
            $start = strtotime($request->time);
            $end = strtotime($request->end_time);
            if ($end > $start) {
                $hours = ($end - $start) / 3600;
                $expectedAmount = $basePrice * $hours;
            } else {
                $expectedAmount = 0;
            }
        }
        
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'partner_id' => $partner->id,
            'category_id' => $request->category_id,
            'booking_date' => date('Y-m-d', strtotime($request->date)),
            'booking_time' => date('H:i:s', strtotime($request->time)),
            'end_time' => $request->end_time ? date('H:i:s', strtotime($request->end_time)) : null,
            'amount' => $expectedAmount,
            'status' => 'confirmed',
            'payment_id' => $request->razorpay_payment_id,
            'start_code' => str_pad((string)mt_rand(1000, 9999), 4, '0', STR_PAD_LEFT)
        ]);

        session()->put('success_booking_id', $booking->id);

        return response()->json([
            'success' => true,
            'message' => 'Booking confirmed successfully!',
            'redirect_url' => route('booking.success')
        ]);
    }

    public function success()
    {
        $bookingId = session('success_booking_id');
        if (!$bookingId) {
            return redirect('/');
        }

        $booking = Booking::with(['partner', 'category'])->findOrFail($bookingId);

        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }
        
        return view('booking-success', compact('booking'));
    }

    public function startBooking(Request $request, $id)
    {
        $request->validate([
            'start_code' => 'required|string'
        ]);

        $booking = Booking::findOrFail($id);

        if ($booking->user_id !== Auth::id()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized.'], 403);
        }

        if (!in_array($booking->status, ['confirmed', 'upcoming'])) {
            return response()->json(['success' => false, 'message' => 'Booking cannot be started in current status.'], 400);
        }

        if ($booking->start_code !== $request->start_code) {
            return response()->json(['success' => false, 'message' => 'Invalid booking code.'], 400);
        }

        $booking->started_at = now();
        $booking->save();

        return response()->json(['success' => true, 'message' => 'Booking started successfully!']);
    }

    public function endBooking($id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->user_id !== Auth::id()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized.'], 403);
        }

        if (!$booking->started_at) {
            return response()->json(['success' => false, 'message' => 'Booking has not been started yet.'], 400);
        }

        $booking->ended_at = now();
        $booking->status = 'completed';
        $booking->save();

        return response()->json(['success' => true, 'message' => 'Booking completed successfully!']);
    }

    public function submitReview(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000'
        ]);

        $booking = Booking::findOrFail($id);

        if ($booking->status !== 'completed') {
            return response()->json(['success' => false, 'message' => 'You can only review completed bookings.'], 400);
        }

        if ($booking->user_id !== Auth::id() && $booking->partner_id !== Auth::id()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized.'], 403);
        }

        $revieweeId = ($booking->user_id === Auth::id()) ? $booking->partner_id : $booking->user_id;

        // Check if review already exists
        $existing = \App\Models\Review::where('booking_id', $booking->id)
                                      ->where('reviewer_id', Auth::id())
                                      ->first();
        if ($existing) {
            return response()->json(['success' => false, 'message' => 'You have already reviewed this booking.'], 400);
        }

        \App\Models\Review::create([
            'booking_id' => $booking->id,
            'reviewer_id' => Auth::id(),
            'reviewee_id' => $revieweeId,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        return response()->json(['success' => true, 'message' => 'Review submitted successfully!']);
    }
}
