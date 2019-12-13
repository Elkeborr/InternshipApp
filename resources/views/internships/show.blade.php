@extends('layouts/detail')

@section('title')
{{$internship->company->name}}
@endsection

@section('link')
{{ url('/internships') }}
@endsection

@section('content')
<div class="internship-show container">
    <section class="internship-show_info">
            <h1>{{ $internship->internship_function }} bij <a href="/companies/{{$internship->company->id}}">{{$internship->company->name}}</a></h1>
            <h3>Beschrijving</h3>
            <p>{{ $internship->internship_discription }}</p>
            <p>Stad: {{ $internship->company->city }}</p>
            <p>Beschikbaarheden: {{ $internship->available_spots }}</p>
            <h3>Profiel</h3>
            <p>{{ $internship->profile}}</p>
    </section>

    <section class="internship-show_apply">
        @if($internship->available_spots > 0)
        @if(!$jobApplications->isEmpty())
        <div class="alert alert-primary" role="alert">
            U heeft al gesolliciteerd voor deze stageplaats.
        </div>
        <a href="/internships/{{ $internship->id }}/apply" class="btn btn-secondary disabled">Solliciteer</a>
        @else
        <a href="/internships/{{ $internship->id }}/apply" class="btn btn-secondary">Solliciteer</a>
        @endif
        @else
        <a href="/internships/{{ $internship->id }}/apply" class="btn btn-secondary disabled">Solliciteer</a>
        <div class="alert alert-primary" role="alert">
            Er zijn geen vrije plekken meer.
        </div>
        @endif

        @if(!$like->isEmpty())
        <a onclick="window.location.href='/internships/{{$internship->id }}/like'" class="btn btn-secondary disabled">Vind leuk</a>
        @else
        <a onclick="window.location.href='/internships/{{$internship->id }}/like'" class="btn btn-secondary ">Vind leuk</a>
        @endif

    </section>

    @endsection