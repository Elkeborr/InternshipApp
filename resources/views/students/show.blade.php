@extends('layouts/detail')

@section('title')
            Profile
@endsection


@section('link')
{{ url('/home') }}
@endsection 
@section('content')
<div class="row container-profile align-items-start">
    
        <div class="col-md-12 profile text-center bg-light p-40">

                <img src="{{ asset('img/defaultProfile.png') }}" width="300" alt="profile picture">
           
                <h4>{{$user->name}}</h4>

                <br>
                <h5>Contact:</h5>
                <p>{{$user->email}}</p>
                
        </div>
               
        <div class="col-md-12 profile">
                
        <div class="card-body button">       
        <button type="button" class="btn btn-dark text-right" onclick="window.location.href='/students/{{$user->id }}/edit'">Edit</button>
        </div>    
        <br>
        <br>
        
                <div class="card-body bg-light">
                    <h5 class="card-title">Biography:</h5>
                    <div class="card-text">
                        <p>Dit is een voorbeeld van een biografie</p>
                    </div>
                </div>

                <br>

                <div class="card-body bg-light">
                    <h5 class="card-title">Talents:</h5>
                    <div class="card-text">
                        <p>Dit is een voorbeeld van talent</p>
                    </div>
                </div>
                <br>

                <div class="card-body bg-light">
                    <h5 class="card-title">Experience</h5>
                    <div class="card-text">
                        <p>Dit is een voorbeeld voor ervaring</p>
                    </div>
                </div>
                
                
        </div>
                     
</div>          
@endsection
