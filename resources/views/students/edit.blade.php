@extends('layouts/detail')

@section('title')
            Student
@endsection

@section('link')
{{ url('/home')}}
@endsection 

@section('content')
        <form>
            <h3>Firstname</h3>
            <input type="text" name="firstname" value="{{$user->name}}">
            <!--<p>{{$user->name}}</p>-->

            <br><br>
            <h3>E-mail:</h3>
            <input type="text" name="firstname" value="{{$user->email}}">
            <!--<p>{{$user->email}}</p>-->

            </form>
@endsection  