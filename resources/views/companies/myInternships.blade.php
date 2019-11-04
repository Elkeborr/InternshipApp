@extends('layouts/app')

@section('title')
    My internships
@endsection

@section('h2')
    My internships
@endsection

@section('content')
<div class="container">

        <a href="/companies/myinternships/create" class="btn btn-outline-primary btn-lg" role="button" aria-pressed="true">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        Add new internship</a>
    </div>
    <div class="companies">
        @foreach($myinternships as $myinternship)
        <div class="companies__detail" >
            <a href ="/internships/">{{ $myinternship->internship_function }}</a>
            <p>{{ $myinternship->internship_discription }}</p>
            <hr class="companies__line">
            <p>Company city</p>
            <p>{{ $myinternship->available_spots }} available</p>
            <a href="/companies/myinternships/{{$myinternship->id}}/applications" class="btn btn-secondary">View applications</a>
        </div>
        @endforeach

    </div>

   
    
@endsection