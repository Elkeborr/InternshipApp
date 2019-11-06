@extends('layouts/detail')

@section('title')
            Edit profile
@endsection

@section('link')
{{ url('/home')}}
@endsection 

@section('content')
        <form action="/students/{{$user->id}}" method="post">
            {{method_field('put')}}
            {{csrf_field()}}

            @if( $errors->any() )
                @component('components/alert')
                    @slot('type','danger')
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endcomponent
            @endif

            <br><br>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col">
                            <label for="firstname">Firstname</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" value="{{$user->name}}">
                        </div>
                        <!--
                        <div class="col">
                            <label for="lastname">Lastname</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" value="{{$user->name}}">
                        </div>
                        -->
                    </div>
                    <br>
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
                
                <br>
                <label for="type">Type</label>
                    <input type="text" class="form-control" name="type" id="type" value="{{$user->type}}" readonly>
                
                
                </div>
                <!--
                <div class="form-group">
                    <label for="exampleFormControlFile1">CV</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
                -->

                <br><br>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" value="">
                </div>

                <input type="hidden" name="id" id="id" value="{{$user->id}}">
               

            <br><br>
            <button type="submit" class="btn btn-success">Submit</button>
            </form>

            
            
@endsection  