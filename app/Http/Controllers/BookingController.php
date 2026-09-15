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
        
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'partner_id' => $partner->id,
            'category_id' => $request->category_id,
            'booking_date' => date('Y-m-d', strtotime($request->date)),
            'booking_time' => date('H:i:s', strtotime($request->time)),
            'end_time' => $request->end_time ? date('H:i:s', strtotime($request->end_time)) : null,
            'amount' => $request->amount ?? (($partner->price_per_hour ?? 0) * 2),
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
