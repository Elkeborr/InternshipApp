@extends('layouts/app')

@section('title')
Internships
@endsection

@section('h2')
    Interns
@endsection

@section('content')
<nav class="nav">
    <div class="nav__logo"> </div>
</nav>

@if ($flash = session('message'))
    <div class="alert alert-success">{{ $flash }}</div>
@endif

<div class="companies">
    @if (\Auth::user()->type == 'student')
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
                        @if ($internship->available_spots != 0 && $jobApplication->user_id != \Auth::user()->id)
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
@else
    @foreach ($internships as $internship)
        {{--@foreach($internship->jobApplications as $jobApplication)
        @endforeach--}}
        <div class="companies__detail" >
            <a href ="/internships/{{ $internship->id }}">{{ $internship->internship_function }}</a>
            <p>{{ $internship->internship_discription }}</p>
            <hr class="companies__line">
            <p>{{ $internship->available_spots }} available</p>
        </div>
    @endforeach
@endif

@endsection