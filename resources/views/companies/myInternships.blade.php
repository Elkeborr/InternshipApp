@extends('layouts/app')

@section('content')
    <h2>My Internships</h2>
    <div>
    <a href="/companies/myinternships/create" class="btn btn-outline-primary btn-lg" role="button" aria-pressed="true">Add new internship</a>
    </div>
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
    
@endsection