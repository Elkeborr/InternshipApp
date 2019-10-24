@extends('layouts/app')

@section('title')
    Internship
@endsection

@section('content')
    @foreach($internships as $internship)
        <div class="companies__detail">
            <a href="/company/internships/{{$internship->id}}/applies/"><h1>{{$internship->internship_function}}</h1></a>
            <p>{{$internship->internship_discription}}</p>
        </div>
    @endforeach
@endsection