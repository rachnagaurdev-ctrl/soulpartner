<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Victura | Home </title>
    <link rel="stylesheet" href="assets/css/custom-style.css">
</head>
<body>
    <!-- Header Start -->
    @include('static.partial.header')
    <!-- Header End -->

    <!-- Scroll Smoother Start -->
    <div id="smooth-wrapper">
    <div id="smooth-content">

        <main>

            @yield('content')
            

        </main>

    <!-- Footer Start -->
    @include('static.partial.footer')
    <!-- Footer End -->

    <!-- Scroll Smoother End -->
    </div>
    </div>

</body>

<script src="assets/js/component.js"></script>
<script src="assets/js/custom-script.js"></script>
</html>