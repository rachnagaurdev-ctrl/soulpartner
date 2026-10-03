<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f7f6; margin: 0; padding: 20px; }
        .container { background-color: #ffffff; max-width: 600px; margin: 0 auto; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { color: #3B82F6; font-size: 24px; margin-top: 0; }
        p { color: #4a4a4a; font-size: 16px; line-height: 1.5; }
        .details { background-color: #f9f9f9; padding: 15px; border-radius: 5px; margin: 20px 0; }
        .details strong { color: #333; }
        .footer { margin-top: 30px; font-size: 12px; color: #888; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Booking Started!</h1>
        @if($recipientType === 'customer')
            <p>Hello {{ $booking->user->name }},</p>
            <p>Your booking with <strong>{{ $booking->partner->name }}</strong> has officially started.</p>
        @else
            <p>Hello {{ $booking->partner->name }},</p>
            <p>Your booking with <strong>{{ $booking->user->name }}</strong> has officially started.</p>
        @endif

        <div class="details">
            <p><strong>Booking ID:</strong> #{{ $booking->id }}</p>
            <p><strong>Start Time:</strong> {{ \Carbon\Carbon::parse($booking->started_at)->format('d M, Y h:i A') }}</p>
        </div>

        <p>Enjoy your time together!</p>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} Soulmate India. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
