<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>404 Page Not Found | Soulmate India</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <style>
      .error-page-wrapper {
          text-align: center;
          padding: 100px 20px;
          min-height: 70vh;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          background: #fffafa;
      }
      .error-page-wrapper h1 {
          font-size: 120px;
          color: #ff1493;
          margin-bottom: 20px;
          font-family: 'Playfair Display', serif;
          line-height: 1;
      }
      .error-page-wrapper h2 {
          font-size: 32px;
          color: #333;
          margin-bottom: 20px;
          font-family: 'DM Sans', sans-serif;
      }
      .error-page-wrapper p {
          font-size: 18px;
          color: #666;
          max-width: 600px;
          margin-bottom: 40px;
          line-height: 1.6;
      }
      .btn-primary-custom {
          background-color: #ff1493;
          color: white;
          padding: 15px 30px;
          border-radius: 50px;
          text-decoration: none;
          font-size: 16px;
          font-weight: 600;
          transition: all 0.3s ease;
          display: inline-block;
          border: 2px solid #ff1493;
      }
      .btn-primary-custom:hover {
          background-color: transparent;
          color: #ff1493;
      }
      .broken-heart {
          font-size: 80px;
          color: #ff1493;
          margin-bottom: 20px;
          display: block;
      }
  </style>
</head>

<body>
  @include('partial.header')

  <main>
      <div class="error-page-wrapper">
          <span class="broken-heart">💔</span>
          <h1>404</h1>
          <h2>Oops! We couldn't find your match.</h2>
          <p>It looks like the page or profile you are looking for doesn't exist, has been removed, or you might have mistyped the URL. Don't worry, there are plenty of other amazing partners waiting for you!</p>
          <a href="{{ url('/partners') }}" class="btn-primary-custom">Browse Partners</a>
      </div>
  </main>

  @include('partial.footer')
  
  <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
