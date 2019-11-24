@extends('layouts/detail')

@section('title')
    Profiel
@endsection

@section('link')
{{ url('/home') }}
@endsection 
@section('content')
<div class="row container-profile align-items-start">
    
    
        <div class="col-md profile text-center bg-light p-40">
       
            <img src="../img/edit-grey.png" class="editicon" width="15" alt="edit" onclick="window.location.href='/students/{{$user->id }}/edit'">
            
                <img src="{{ asset('img/profile-standard.jpg') }}" alt="profile picture" class="profilepic">
           
                <h4>{{$user->name}} {{$user->lastname}}</h4>

                <br>
                <h5>Contact:</h5>
                <p>{{$user->email}}</p>
                
        </div>
          
        <div class="col-md profile">
                
                <div class="card-body bg-light profileCard">
                    
                    <h5 class="card-title">Intro</h5>
                
                    <div class="card-text">
                    <img src="../img/edit-grey.png" class="editicon" width="15" alt="edit" onclick="window.location.href='/students/{{$user->id }}/edit-intro'">

                        <p>{{$user->biography}}</p>
                        
                    </div>
                </div>

                <br>


     
                <div class="card-body bg-light profileCard">
                    <h5 class="card-title">Kwaliteiten</h5>
                    <div class="card-text">
                    <img src="../img/add-grey.png" class="editicon addicon" width="15" alt="add" onclick="window.location.href='/students/{{$user->id }}/add-skills'">
                    <img src="../img/edit-grey.png" class="editicon" width="15" alt="edit" onclick="window.location.href='/students/{{$user->id }}/edit-skills'">
                    <div class="skillsGrid">
                        @foreach ($user->skills as $skill)
                            
                                <div class="pSkills">{{$skill->skill}}</div>
                          
                        @endforeach
                        </div>
                    </div>
                </div>
                <br>

                
                <div class="card-body bg-light profileCard">
                    <h5 class="card-title">Sociale media</h5>
                    <br>
                    <div class="card-text">
                    <img src="../img/add-grey.png" class="editicon addicon" width="15" alt="add" onclick="window.location.href='/students/{{$user->id }}/add-social'">
                    <img src="../img/edit-grey.png" class="editicon" width="15" alt="edit" onclick="window.location.href='/students/{{$user->id }}/edit-social'">
                    <div class="socialGrid">
                        @foreach ($user->socials as $social)
                            
                            
                                <a href="{{$social->link}}">
                                    <img src="../img/{{$social->name}}.png" alt="{{$social->name}}" class="socialicon">
                                </a>
                                
                            
                        @endforeach
                        </div>
                    </div>
                </div>
         
        </div>
                     
</div>          
@endsection
