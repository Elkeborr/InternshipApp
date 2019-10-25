@extends('layouts/app')

@section('title')
    My internships
@endsection

@section('h2')
    My internships
@endsection

@section('content')
   
    <div class="companies">
        @foreach($myinternships as $myinternship)
        <div class="companies__detail" >
            <a href ="/internships/">{{ $myinternship->internship_function }}</a>
            <p>{{ $myinternship->internship_discription }}</p>
            <hr class="companies__line">
            <p>company_city comes here</p>
            <p>{{ $myinternship->available_spots }} available</p>
        </div>
        @endforeach

    </div>

    <div>
    <a href="/companies/myinternships/create" class="btn btn-outline-primary btn-lg" role="button" aria-pressed="true">Add new internship</a>
    </div>
    
@endsection