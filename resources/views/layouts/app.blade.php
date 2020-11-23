<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mesa Orbital | New Eden's Premier Industry Corporation</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('additional_styles')
</head>
<body>
@include('partials.navigation.navbar')
<main>
    @auth
    @endauth
    @yield('content')
</main>
<footer class="footer">
    <div class="container">
        <span class="text-muted">Copyright © {{ date('Y') }} Allsides Neutral Logistics. All Rights Reserved</span>
    </div>
</footer>
<script src="{{ asset('js/app.js') }}"></script>
@yield('additional_scripts')
</body>
</html>
