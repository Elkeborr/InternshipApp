@extends('layouts/detail')

@section('title')
            Companies
@endsection



@section('content')
            <p>Firstname</p>
            <p>{{$user->name}}</p>

            <br>
            <p>Connected since:</p>
            <p>{{$user->email}}</p>

            <br>
            <p>student or company?:</p>
            <p>{{$user->type}}</p>

            <br>
            <p>Connected since:</p>
            <p>{{$user->email}}</p>
@endsection   