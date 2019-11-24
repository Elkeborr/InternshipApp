<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sprintern - @yield('title')</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
   


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="top">
            <nav class="navbar navbar-expand-md navbar-light">
                @if($user = session('user'))
                    <div class="d-flex w-50 order-">
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
                            <a class="nav-link active nav-item " href="{{ url('/home') }}">Overzicht <span class="sr-only">(current)</span></a>
                            <a class="nav-item  nav-link" href="{{ url('/internships') }}">Stagiair(e)s</a>
                            <a class="nav-item  nav-link" href="{{ url('/internships/myinternships') }}">Mijn stageplaatsen</a> 
                        @endif
                        @if($user->type == 'student')
                            <!-- <p>{{$user->name}}</p> -->
                            <a class="nav-link active nav-item " href="{{ url('/home') }}">Overzicht <span class="sr-only">(current)</span></a>
                            <a class="nav-item  nav-link" href="{{ url('/internships') }}">Stageplaatsen</a>
                            <a class="nav-item  nav-link" href="{{ url('/companies') }}">Stagebedrijven</a>  
                        @endif
        
                    </div>

                    <span class="navbar-text mt-1 w-50 text-right order-md-last username">
                    
                    <!-- @if ($flash = session('username')) -->
                        <a href="{{ url('/users/detail') }}">{{$flash}}</a>
                    <!-- @endif -->
                    <span class="navbar-text mt-1 w-50 text-right order-md-last"><a href="/students/{{$user->id }}">{{$user->name}}</a></span>
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
                    <form>
                    <input class="form-control" type="search" placeholder="Zoeken" aria-label="Search">
                    </form>
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


</body>


</html>
