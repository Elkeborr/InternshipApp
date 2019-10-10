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
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" height="30">
    </a>
  <div class="navbar-nav navbar-center">
      <a class="nav-item nav-link active" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="{{ url('/') }}">Internships</a>
      <a class="nav-item nav-link" href="{{ url('/companies') }}">Companies</a> 
    </div>
</nav>
</div>
        <main class="container">
            @yield('content')
        </main>
    </div>
</body>
</html>
