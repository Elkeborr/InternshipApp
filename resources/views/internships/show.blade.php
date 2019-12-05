@extends('layouts/detail')

@section('title')
    {{$internship->company->name}}
@endsection

@section('content')
<div class="company-show container">

    <section class="company-show_info">
        <div class="company-show_info_photo">
            <img>
        </div>
        <div class="company-show_info_text">
            <h1>{{ $internship->internship_function }} bij {{$internship->company->name}}</h1>
            <h3>Info</h3>
            <p>{{ $internship->internship_discription }}</p>
            <p>Stad: {{ $internship->company->city }}</p>
            <h4>{{ $internship->available_spots }} beschikbaar</h4>
        </div>
    </section>

    <section class="company-show_contact">
        @if ($internship->available_spots != 0 && $internship->jobApplications->count() == 0)
            <a href="/internships/{{ $internship->id }}/apply" class="btn btn-secondary">Solliciteer</a>
        @else
            @foreach ($internship->jobApplications as $jobApplication)
                @if ($internship->available_spots != 0)
                    <a href="/internships/{{ $internship->id }}/apply" class="btn btn-secondary disabled" >Solliciteer</a>
                @endif
                @if ($jobApplication->user_id == \Auth::user()->id)
                    <div class="alert alert-primary" role="alert">
                        U heeft al gesolliciteerd voor deze stageplaats.
                    </div>
                @endif
            @endforeach
        @endif
    </section>

@endsection