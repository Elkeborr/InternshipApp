@extends('layouts/detail')

@section('title')
            Student
@endsection


@section('link')
{{ url('/home') }}
@endsection 
@section('content')

            
            <h3>Firstname</h3>
            <p>{{$user->name}}</p>

            <br>
            <h3>E-mail:</h3>
            <p>{{$user->email}}</p>

            <br>
            <h3>student or company?:</h3>
            <p>{{$user->type}}</p>

            <br>
            <h3>Connected since:</h3>
            <p>{{$user->created_at}}</p>
            
            <button type="button" class="btn btn-dark" onclick="window.location.href='/students/{{$user->id }}/edit'">Edit</button>
            
            
@endsection