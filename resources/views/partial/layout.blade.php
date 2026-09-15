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
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

  @include('partial.header')

  <main id="home">
    @yield('content')
   
  </main>


 @include('partial.footer')

  <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>