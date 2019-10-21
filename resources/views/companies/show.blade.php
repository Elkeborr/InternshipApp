@extends('layouts/detail')

@section('title')
{{$company->name}}
@endsection

@section('content')
<h1>{{$company->name}}</h1>
<p>{{$company->bio}}</p>
<h3>Info</h3>
<p>Employees: {{$company->employees}}</p>

<h2>Contact</h2>
<p>{{$company->email}}</p>
<p>{{$company->phoneNumber}}</p>
<br>
<p>{{$company->street}} {{$company->streetNumber}}</p>
<p>{{$company->postalCode}} {{$company->city}}</p>

<h2>Reviews</h2>
@foreach($company->reviews as $review)
<p>{{$review->review}}</p>
@endforeach
@endsection