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
        
        if (Auth::user()->role === 'partner') {
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
            'payment_id' => $request->razorpay_payment_id
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
}
