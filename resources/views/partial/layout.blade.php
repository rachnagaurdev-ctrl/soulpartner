<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description"
    content="Soulmate India - Find a trusted companion for movies, shopping, travel, dining and special moments.">
  <title>Soulmate India | Partner on Rent</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

  @include('partial.header')

  <main id="home">
    @if(session('success'))
      <div style="background: #e6ffed; border: 1px solid #b7ebc5; color: #1e7e34; padding: 12px; border-radius: 8px; margin: 20px auto; max-width: 800px; text-align: center; font-size: 15px;">
          {{ session('success') }}
      </div>
    @endif
    @yield('content')
   
  </main>


 @include('partial.footer')

  <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>