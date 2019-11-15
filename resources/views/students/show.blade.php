@extends('layouts/detail')

@section('title')
            Profile
@endsection


@section('link')
{{ url('/home') }}
@endsection 
@section('content')
<div class="row container-profile align-items-start">
    
        <div class="col-md profile text-center bg-light p-40">

                <img src="{{ asset('img/profile-standard.jpg') }}" alt="profile picture" class="profilepic">
           
                <h4>{{$user->name}} {{$user->lastname}}</h4>

                <br>
                <h5>Contact:</h5>
                <p>{{$user->email}}</p>
                
        </div>
               
        <div class="col-md profile">
                
        <div class="card-body button">       
        
        </div>    
        <br>
        <br>
        
                <div class="card-body bg-light">
            
                    <h5 class="card-title">Biography:</h5>
                    <div class="card-text">
                        <p>{{$user->biography}}</p>
                        <button type="button" class="btn btn-dark text-right" onclick="window.location.href='/students/{{$user->id }}/edit'">Edit</button>
        
                    </div>
                </div>

                <br>


     
                <div class="card-body bg-light">
                    <h5 class="card-title">Skills:</h5>
                    <div class="card-text">
                        @foreach ($user->skills as $skill)
                            <div>{{ $skill->skill}}</div>
                        @endforeach
                        <button type="button" class="btn btn-dark text-right" onclick="window.location.href='/students/{{$user->id }}/edit'">Edit</button>
        
                    </div>
                </div>
                <br>

                
                <div class="card-body bg-light">
                    <h5 class="card-title">Social media</h5>
                    <div class="card-text">
                        @foreach ($user->socials as $social)
                            <div><a href="{{$social->link}}">{{$social->name}}</a></div>
                        @endforeach
                        <button type="button" class="btn btn-dark text-right" onclick="window.location.href='/students/{{$user->id }}/edit'">Edit</button>
        
                    </div>
                </div>
         
        </div>
                     
</div>          
@endsection
