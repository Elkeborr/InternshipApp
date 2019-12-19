@extends('layouts/app')

@section('title')
Mijn stageplaatsen
@endsection

@section('h2')
Mijn stageplaatsen
@endsection

@section('content')
<div class="container">

    <a href="/internships/myinternships/create" class="btn btn-outline-primary btn-lg" role="button" aria-pressed="true">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        Voeg nieuwe stageplaats toe</a>

    @if($myinternships->isEmpty())
    @component('components/alert')
    @slot('type','info')
    Je hebt nog geen stageplaatsen toegevoegd.
    @endcomponent
    @else

    <div class="companies">
        @foreach($myinternships as $myinternship)
        <div class="companies__detail">
            <a href="/internships/{{$myinternship->id}}">{{ $myinternship->internship_function }}</a>

            <p>{{ $myinternship->internship_discription }}</p>
            <hr class="companies__line">
            <div class="small-info clearfix">
                <p>{{$myinternship->company->city}}</p>
                <p>{{ $myinternship->available_spots }} beschikbaar</p>
            </div>
            <p>{{$myinternship->jobApplications->count()}} @if($myinternship->jobApplications->count() == 1) heeft @else hebben @endif er gesoliciteerd</p>

            <a href="/companies/myinternships/{{$myinternship->id}}/applications" class="btn btn-secondary">Bekijk sollicitaties</a>
        </div>
        @endforeach

    </div>
    @endif
</div>
@endsection