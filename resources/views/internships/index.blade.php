<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Internships</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
            }

            .companies{
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                grid-gap: 10%;
           
            }
            .companies__detail{
                padding :10%;
                background-color: #F6F7FB;
            }
            .companies__detail a{
                text-decoration: none;
                color:black;
            }
            .companies__detail a:hover{
                text-decoration: underline #FD4A29;
                color:#4640DE;
            }
            .companies__detail p{
                color:#848484;
                font-size: 0.7em;
            }

            .companies__line{
                border-top: 1.2px solid ;
                color:#4640DE;
            }

            .btn-apply {
                background-color: dodgerblue;
                padding: 10px;
                border-radius: 5px;
            }
        </style>
    </head>


<nav class="nav">
    <div class="nav__logo"> </div>
</nav>
<h2>Internships</h2>
<div class="companies">
    @foreach($internships as $internship)
    <div class="companies__detail" >
        <a href ="/internships/{{ $internship->id }}">{{ $internship->internship_function }}</a>
        <p>{{ $internship->internship_discription }}</p>
        <hr class="companies__line">
        <p>{{ $internship->company_city}}</p>
        <p>{{ $internship->available_spots }} available</p>
        @if ($internship->available_spots != 0)
            <a href="/internships/{{ $internship->id }}/apply" class="btn-apply">Apply</a>
        @endif
    </div>
    @endforeach
</div>
