@extends('layouts/detail')

@section('title')
{{$internship->name}}
@endsection


@section('content')
<h1>{{ $internship->internship_function }}</h1>

<h3>Info</h3>

<h3>{{ $internship->internship_discription }}</h3>
<p>City: {{ $internship->company_city }}</p>

<h4>{{ $internship->available_spots }} available</h4>

@if ($internship->available_spots != 0)
    <a href="/internships/{{ $internship->id }}/apply" class="btn-apply">Apply</a>
@endif
@endsection