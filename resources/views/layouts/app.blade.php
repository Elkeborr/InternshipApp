<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}">

    <title>Sprintern - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="{{ asset('js/checkbox.js') }}" defer></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <!-- Styles -->
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

                    <a class="nav-item nav-link {{ Request::is('internships/myinternships*') ? 'active' : '' }}" href="{{ url('/internships/myinternships') }}">Mijn stageplaatsen</a>
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
                        @if($user->type == 'student')
                            <a class="dropdown-item" href="/students/{{$user->id }}">Profiel bekijken</a>
                        @endif

                        @if($user->type == 'company')
                            <a class="dropdown-item" href="/companies/profile/{{$user->company_id }}">Profiel bekijken</a>
                        @endif
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Afmelden') }}</a>
                    </div>
                </span>
                @endif
            </nav>
            <div class="container-nav container">
                <div class="container-nav_h2">
                    <h2>
                        @yield('h2')
                    </h2>
                </div>
                <div class="container-nav_form">
                    @if($user->type == 'student')
                    <form method="post">
                        <!-- {{csrf_field()}}     -->
                        <div class="form-group mx-sm-3 mb-2 search">
                            <input type="search" name="search" class="form-control mb-2 search-bar" id="searchBar" placeholder="Zoeken" aria-label="Search">
                            <div class="search-results">
                                <ul class="search-result_list">

                                </ul>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        @yield('hero-image')
        <main>
            @yield('content')
        </main>
        <!-- <footer>
            <p>&copy; 2019 Sprintern<p>
        </footer>-->
    </div>

    @if($user->type == 'student')
    <script src="{{ asset('js/search.js') }}" defer></script>
    <script src="{{ asset('js/ajax_setup.js') }}" defer></script>
    @endif

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</body>

</html>
