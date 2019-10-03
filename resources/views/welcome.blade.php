<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    </head>
    <body>
        <div class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="Logo">
        </div>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <h1>Welcome to sprintern</h1>
                    <p>Are you a company or a student?</p>
                </div>
                <div class="links">
                    <a href="{{ url('/register') }}" class="company">Company</a>
                    <a href="{{ url('/redirect') }}" class="student">Student</a>
                </div>      
            </div>
        </div>
    </body>
</html>
