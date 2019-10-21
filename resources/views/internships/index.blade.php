@extends('layouts/app')

<<<<<<< HEAD
@section('title')
Internships
@endsection

@section('h2')
Internships
@endsection

@section('content')
<nav class="nav">
    <div class="nav__logo"> </div>
</nav>
=======
@section('hero-image')
<div class="hero-image" style="background-image: url(https://freerangestock.com/sample/120923/overhead-background-of-a-vintage-typewriter-and-desk-items.jpg); background-size: cover; background-position: center; width: 100%; height: 400px; filter: brightness(.5);"></div>
@endsection

@section('content')
>>>>>>> origin/master
<h2>Internships</h2>
@if ($flash = session('message'))
    <div class="alert alert-success">{{ $flash }}</div>
@endif
<div class="companies">
    @foreach($internships as $internship)
        <div class="companies__detail" >
            <a href ="/internships/{{ $internship->id }}">{{ $internship->internship_function }}</a>
            <p>{{ $internship->internship_discription }}</p>
            <hr class="companies__line">
            <p>{{ $internship->available_spots }} available</p>
            @if ($internship->jobApplications->count() == 0)
                <a href="/internships/{{ $internship->id }}/apply" class="btn btn-secondary">Apply</a>
            @else
                @foreach($internship->jobApplications as $jobApplication)
                    @if ($internship->available_spots != 0)
                        <a href="/internships/{{ $internship->id }}/apply" class="btn btn-secondary">Apply</a>
                    @endif
                    @if ($jobApplication->user_id == \Auth::user()->id)
                        <div class="alert alert-primary" role="alert">
                            You already applied for this internship.
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    @endforeach
</div>
@endsection