<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Companies</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
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
        </style>
    </head>


<nav class="nav">
    <div class="nav__logo"> </div>
</nav>
<h2>Companies</h2>
<div class="companies">
    @foreach($companies as $company)
    <div class="companies__detail" >
        <a href ="/companies/{{$company->id}}">{{ $company-> name}}</a>
        <p>{{ $company-> bio}}</p>
        <hr class="companies__line">
        <p>{{ $company-> city}}</p>
    </div>
    @endforeach

</div>
