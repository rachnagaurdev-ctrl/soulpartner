<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f7f6; margin: 0; padding: 20px; }
        .container { background-color: #ffffff; max-width: 600px; margin: 0 auto; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { color: #E91E63; font-size: 24px; margin-top: 0; }
        p { color: #4a4a4a; font-size: 16px; line-height: 1.5; }
        .details { background-color: #f9f9f9; padding: 15px; border-radius: 5px; margin: 20px 0; text-align: center; }
        .amount { font-size: 28px; color: #059669; font-weight: bold; }
        .footer { margin-top: 30px; font-size: 12px; color: #888; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Congratulations, {{ $partner->name }}! 🎉</h1>
        <p>A new bonus has been credited to your Soulmate India wallet.</p>

        <div class="details">
            <p><strong>Bonus Amount</strong></p>
            <p class="amount">₹{{ number_format($amount) }}</p>
            <p><em>Reason: {{ $reason }}</em></p>
        </div>

        <p>Keep up the great work! You can view your updated balance and transaction history in your dashboard.</p>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} Soulmate India. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
