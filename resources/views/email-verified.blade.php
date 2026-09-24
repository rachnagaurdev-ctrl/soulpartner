<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>{{ $success ? 'Email Verified' : 'Verification Failed' }} – Soulmate India</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Inter', sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #fdf2f8 0%, #f5f3ff 50%, #eff6ff 100%);
      padding: 24px;
    }
    .card {
      background: #ffffff;
      border-radius: 24px;
      box-shadow: 0 20px 60px rgba(0,0,0,0.12);
      padding: 60px 48px;
      max-width: 520px;
      width: 100%;
      text-align: center;
      animation: slideUp 0.5s ease;
    }
    @keyframes slideUp {
      from { opacity: 0; transform: translateY(30px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .icon-circle {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 48px;
      margin-bottom: 28px;
    }
    .icon-circle.success {
      background: linear-gradient(135deg, #E91E63, #9c27b0);
      box-shadow: 0 12px 36px rgba(233,30,99,0.35);
    }
    .icon-circle.error {
      background: linear-gradient(135deg, #ef4444, #f97316);
      box-shadow: 0 12px 36px rgba(239,68,68,0.3);
    }
    h1 {
      font-size: 28px;
      font-weight: 800;
      color: #1f2937;
      margin-bottom: 14px;
      letter-spacing: -0.5px;
    }
    p {
      font-size: 16px;
      color: #6b7280;
      line-height: 1.65;
      margin-bottom: 36px;
    }
    .btn {
      display: inline-block;
      padding: 16px 44px;
      border-radius: 50px;
      font-size: 16px;
      font-weight: 700;
      text-decoration: none;
      letter-spacing: 0.3px;
      transition: transform 0.2s, box-shadow 0.2s;
    }
    .btn:hover { transform: translateY(-2px); }
    .btn-primary {
      background: linear-gradient(135deg, #E91E63, #9c27b0);
      color: #fff;
      box-shadow: 0 8px 24px rgba(233,30,99,0.35);
    }
    .btn-secondary {
      background: linear-gradient(135deg, #ef4444, #f97316);
      color: #fff;
      box-shadow: 0 8px 24px rgba(239,68,68,0.3);
    }
    .brand {
      margin-top: 36px;
      font-size: 14px;
      color: #E91E63;
      font-weight: 700;
    }
  </style>
</head>
<body>
  <div class="card">
    @if($success)
      <div class="icon-circle success">✅</div>
      <h1>Email Verified!</h1>
      <p>
        @if(!empty($userName)) Hi <strong>{{ $userName }}</strong>! @endif
        {{ $message }}
      </p>
      <a href="{{ url('/dashboard') }}" class="btn btn-primary">Go to Dashboard →</a>
    @else
      <div class="icon-circle error">❌</div>
      <h1>Verification Failed</h1>
      <p>{{ $message }}</p>
      <a href="{{ url('/dashboard') }}" class="btn btn-secondary">Back to Dashboard →</a>
    @endif

    <div class="brand">💞 Soulmate India</div>
  </div>
</body>
</html>
