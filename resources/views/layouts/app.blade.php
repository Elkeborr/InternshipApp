<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}">

    <title>Sprintern - @yield('title')</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                    <form method="post">
                        <!-- {{csrf_field()}}     -->
                        <div class="form-group mx-sm-3 mb-2 search" >
                            <input type="search" name="search" class="form-control mb-2 search-bar" id="searchBar" placeholder="Zoeken" aria-label="Search">
                            <div class="search-results">
                                <ul class="search-result_list">
                                    
                                </ul>
                            </div>
                        </div>
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

    <script type="text/javascript">
        $(function(){ // this will be called when the DOM is ready
            $('#searchBar').keyup(function() {

                $value = $(this).val();

                $.ajax({
                    beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
                    type : 'post',                    
                    url : '{{URL::to('search')}}',
                    data:{'search': $value},
                    dataType: 'json',
                    success:function(res){

                        if($value == ""){
                            //if value is empty then remove all links and list items
                            $(".search-result_list-link").remove();
                            $(".search-result_list-item").remove();
                            $(".search-results").hide();
                        }else{
                            //else check the response message
                            if (res.status == "fail"){
                                //if message is fail, show dropdown with empty state
                                
                                $(".search-result_list-link").remove();
                                $(".search-result_list-item").remove();
                                $(".search-results").show();

                                let listLink = $("<a />", {
                                    class: "search-result_list-link",
                                    text: res.message
                                });
                                let listItem = $("<li />", {
                                    class: "search-result_list-item"
                                });

                                listLink.appendTo(listItem);
                                listItem.appendTo(".search-result_list");

                            }else if (res.status == "success"){
                                //if message is success, show the dropdown

                                let results = res.data.internships;

                                $(".search-result_list-link").remove();
                                    $(".search-result_list-item").remove();
                                    $(".search-results").show();
                                for (let i = 0; i< results.length;i++){
                                    
                                    let listLink = $("<a />", {
                                        class: "search-result_list-link",
                                        text: results[i].internship_function,
                                        href : "#"
                                    });
                                    let listItem = $("<li />", {
                                        class: "search-result_list-item"
                                    });

                                    listLink.appendTo(listItem);
                                    listItem.appendTo(".search-result_list");
                                }
                                
                            }else{
                                $(".search-result_list-link").remove();
                                $(".search-result_list-item").remove();
                                $(".search-results").hide();
                                
                            }
                        }
                        
                        // $('tbody').html(data);
                    }
                    
                })
                // .done(function(res){
                //     if (res.status == "success"){
                //         console.log(data);
                //     }
                // });
            });
        });
    </script>
    <script type="text/javascript">
        $(function(){ // this will be called when the DOM is ready
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
</body>

</html>
