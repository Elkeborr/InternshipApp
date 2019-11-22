@extends('layouts/detail')

@section('title')
{{$internship->name}}
@endsection

@section('content')
<h1>{{ $internship->internship_function }} at {{$internship->company->name}}</h1>
<h3>Info</h3>
<h3>{{ $internship->internship_discription }}</h3>
<p>City: {{ $internship->company_city }}</p>
<h4>{{ $internship->available_spots }} beschikbaar</h4>

@if ($internship->available_spots != 0 && $internship->jobApplications->count() == 0)
    <a href="/internships/{{ $internship->id }}/apply" class="btn-apply">Solliciteer</a>
@else
    @foreach ($internship->jobApplications as $jobApplication)
        @if ($internship->available_spots != 0)
            <a href="/internships/{{ $internship->id }}/apply" >Solliciteer</a>
        @endif
        @if ($jobApplication->user_id == \Auth::user()->id)
            <div class="alert alert-primary" role="alert">
                U heeft al gesolliciteerd voor deze stageplaats.
            </div>
        @endif
    @endforeach
@endif
@endsection