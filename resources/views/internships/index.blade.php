@extends('layouts/app')

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
@endsection