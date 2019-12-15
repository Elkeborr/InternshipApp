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


    <script src="{{ asset('js/review.js') }}" defer></script>
    <!-- Styles -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
</head>

<body>

    <div id="app">
        <div class="top">
            <nav class="navbar navbar-expand-md navbar-light">
                @if($user = session('user'))
                <div class="d-flex order">
                    <a class="navbar-brand navbar-brand mr-1" href="{{ url('/home') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" height="30">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">

                    @if($user->type == 'company')
                    <!-- <p>{{$user->name}}</p> -->
                    <a class="nav-link nav-item {{ Request::is('home*') ? 'active' : '' }}" href="{{ url('/home') }}">Overzicht <span class="sr-only">(current)</span></a>

                    <a class="nav-item  nav-link {{ Request::is('internships/myinternships*') ? 'active' : '' }}" href="{{ url('/internships/myinternships') }}">Mijn stageplaatsen</a>
                    @endif
                    @if($user->type == 'student')
                    <!-- <p>{{$user->name}}</p> -->
                    <a class="nav-link nav-item {{ Request::is('home*') ? 'active' : '' }}" href="{{ url('/home') }}">Overzicht <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link {{ Request::is('internships*') ? 'active' : '' }}" href="{{ url('/internships') }}">Stageplaatsen</a>
                    <a class="nav-item nav-link {{ Request::is('companies*') ? 'active' : '' }}" href="{{ url('/companies') }}">Stagebedrijven</a>
                    @endif

                </div>

                <span class="navbar-text  text-right order-md-last username dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class=" username"> {{$user->name}} </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/students/{{$user->id }}">Profiel bekijken</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Afmelden') }}</a>
                    </div>
                </span>

                @endif
            </nav>

        </div>

        <main>

            <div class="back">

                <a href="@yield('link')"> <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Ga terug</a>
            </div>


            @yield('content')

        </main>

        <!-- <footer>
            <p>&copy; 2019 Sprintern<p>
        </footer>-->


    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>

</html>