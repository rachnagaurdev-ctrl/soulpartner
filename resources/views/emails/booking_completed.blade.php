<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f7f6; margin: 0; padding: 20px; }
        .container { background-color: #ffffff; max-width: 600px; margin: 0 auto; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { color: #059669; font-size: 24px; margin-top: 0; }
        p { color: #4a4a4a; font-size: 16px; line-height: 1.5; }
        .details { background-color: #f9f9f9; padding: 15px; border-radius: 5px; margin: 20px 0; }
        .details strong { color: #333; }
        .amount { font-size: 20px; color: #E91E63; font-weight: bold; }
        .footer { margin-top: 30px; font-size: 12px; color: #888; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Booking Completed Successfully!</h1>
        <p>Hello {{ $booking->partner->name }},</p>
        <p>Your booking (#{{ $booking->id }}) with {{ $booking->user->name }} has been marked as completed.</p>

        <div class="details">
            <p><strong>Earnings Added to Wallet:</strong> <span class="amount">₹{{ number_format($amountEarned) }}</span></p>
            @if($isSalaryPartner)
                <p><em>This is your flat salary payout for the booking.</em></p>
            @else
                <p><em>This is your booking earnings after commission deduction.</em></p>
            @endif
        </div>

        <p>You can check your updated wallet balance in your dashboard.</p>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} Soulmate India. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
