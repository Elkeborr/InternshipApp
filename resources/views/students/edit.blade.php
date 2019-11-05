@extends('layouts/detail')

@section('title')
            Student
@endsection

@section('link')
{{ url('/home')}}
@endsection 

@section('content')
        <form method="POST">
            @method('PUT')
            @csrf
            
            <h3>Firstname</h3>
            <input type="text" name="firstname" id="firstname" value="{{$user->name}}">
            
            <br><br>
            <h3>E-mail:</h3>
            <input type="text" name="email" id="email" value="{{$user->email}}">
            
            <br><br>
            <h3>Password:</h3>
            <input type="password" name="password" id="password" value="">
  
            <br><br>
            <button type="submit" class="btn btn-success">Submit</button>
            </form>
            
@endsection  