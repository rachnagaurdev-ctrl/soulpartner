@extends('partial.layout')

@section('content')
<div class="container" style="max-width: 800px; margin: 80px auto; text-align: center; padding: 40px; background: #fff; border-radius: 16px; box-shadow: 0 12px 36px rgba(19, 16, 43, 0.08);">
    <div style="width: 80px; height: 80px; background: #4caf50; color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
    </div>
    <h1 style="color: #191037; font-size: 32px; margin-bottom: 10px;">Booking Confirmed!</h1>
    <p style="color: #6d6b78; font-size: 16px; margin-bottom: 30px;">Thank you for your booking. Your partner has been notified.</p>

    <div style="background: #F8FAFC; border-radius: 12px; padding: 25px; text-align: left; margin-bottom: 30px;">
        <h3 style="margin-top: 0; color: #191037; font-size: 18px; border-bottom: 1px solid #eadfea; padding-bottom: 15px; margin-bottom: 15px;">Booking Details</h3>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div>
                <span style="color: #6d6b78; font-size: 13px; display: block; margin-bottom: 4px;">Partner</span>
                <strong style="color: #191037; font-size: 16px;">{{ $booking->partner->name }}</strong>
            </div>
            <div>
                <span style="color: #6d6b78; font-size: 13px; display: block; margin-bottom: 4px;">Service</span>
                <strong style="color: #191037; font-size: 16px;">{{ $booking->category->name ?? 'Service' }}</strong>
            </div>
            <div>
                <span style="color: #6d6b78; font-size: 13px; display: block; margin-bottom: 4px;">Date</span>
                <strong style="color: #191037; font-size: 16px;">{{ date('d M Y', strtotime($booking->booking_date)) }}</strong>
            </div>
            <div>
                <span style="color: #6d6b78; font-size: 13px; display: block; margin-bottom: 4px;">Time</span>
                <strong style="color: #191037; font-size: 16px;">
                    {{ date('h:i A', strtotime($booking->booking_time)) }} 
                    @if($booking->end_time)
                        - {{ date('h:i A', strtotime($booking->end_time)) }}
                    @endif
                </strong>
            </div>
            <div>
                <span style="color: #6d6b78; font-size: 13px; display: block; margin-bottom: 4px;">Total Paid</span>
                <strong style="color: #d80b76; font-size: 18px;">₹{{ number_format($booking->amount, 0) }}</strong>
            </div>
            <div>
                <span style="color: #6d6b78; font-size: 13px; display: block; margin-bottom: 4px;">Status</span>
                <span style="background: #e8f5e9; color: #2e7d32; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600;">Confirmed</span>
            </div>
        </div>
    </div>

    <div style="display: flex; gap: 15px; justify-content: center;">
        <a href="{{ route('dashboard.bookings') }}" style="background: #d80b76; color: #fff; text-decoration: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; font-size: 15px; transition: 0.3s;">View My Bookings</a>
        <a href="{{ url('/') }}" style="background: #fff; color: #191037; text-decoration: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; font-size: 15px; border: 1px solid #eadfea; transition: 0.3s;">Back to Home</a>
    </div>
</div>
@endsection
