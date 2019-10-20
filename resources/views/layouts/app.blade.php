<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sprintern - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
<div class="top">
<nav class="navbar navbar-expand-md navbar-light">
    <div class="d-flex w-50 order-">
    <a class="navbar-brand navbar-brand mr-1" href="#">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" height="30">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</div>
    <div class="collapse navbar-collapse justify-content-center order-2" id="collapsibleNavbar">
        <a class="nav-link active nav-item " href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item  nav-link" href="{{ url('/internships') }}">Internships</a>
        <a class="nav-item  nav-link" href="{{ url('/companies') }}">Companies</a> 
    </div>
    <span class="navbar-text mt-1 w-50 text-right order-md-last"><a href="">username</a></span>
</nav>
</div>
    @yield('hero-image')
        <main class="container">
            @yield('content')
        </main>
    </div>
</body>
</html>
