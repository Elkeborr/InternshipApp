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
        @if (\Auth::user()->id === $user->id)
        <img src="../img/edit-grey.png" class="editicon" width="15" alt="edit" onclick="window.location.href='/students/{{$user->id }}/edit'">
        @endif

        @if($user->profile_picture!=null)
        <img src="../profileImages/{{$user->profile_picture}}" alt="profile picture" class="profilepic">
        @endif

        @if($user->profile_picture==null)
        <img src="../img/defaultProfile.png" alt="profile picture" class="profilepic">
        @endif
        <h4>{{$user->name}} {{$user->lastname}}</h4>

        <br>
        <h5>Contact:</h5>
        <p>{{$user->email}}</p>

    </div>

    <div class="col-md profile">

        <div class="card-body bg-light profileCard">

            <h5 class="card-title">Intro</h5>

            <div class="card-text">
              
                <p>{{$user->biography}}</p>

            </div>
        </div>

        <br>
        <div class="card-body bg-light profileCard">
         
            <h5 class="card-title">Kwaliteiten</h5>
         

          
            <div class="card-text">
              
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
            <div class="card-text">
               

                <div class="socialGrid">
                    @foreach ($user->socials as $social)

                    <a href="{{$social->link}}" class="pSkills">
                        <img src="../img/{{$social->name}}.png" alt="{{$social->name}}" class="socialicon">
                    </a>

                        <div>
                            <a href="{{$social->link}}" target="_blank">
                                <img src="../img/{{$social->name}}.png" alt="{{$social->name}}" class="socialicon">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <br>

        @if (\Auth::user()->id === $user->id)
        <div class="card-body bg-light job-applications">
            <h5 class="card-title">Stage aanvragen</h5>
            <div class="job-applications-list">
                @foreach ($jobApplications as $jobApplication)
                <div class="job-application">
                    @if ( $jobApplication->status == 'new' )
                    <h6><a href="/internships/{{$jobApplication->internship_id}}">{{ \App\Internship::where('id', $jobApplication->internship_id)->first()->internship_function }}</a> | <span class="badge badge-pill badge-primary" style="padding: 5px 10px;">{{ $jobApplication->status  }}</span></h6>
                    @elseif ( $jobApplication->status == 'starred' )
                    <h6><a href="/internships/{{$jobApplication->internship_id}}">{{ \App\Internship::where('id', $jobApplication->internship_id)->first()->internship_function }}</a> | <span class="badge badge-pill badge-warning" style="padding: 5px 10px;">{{ $jobApplication->status  }}</span></h6>
                    @elseif ( $jobApplication->status == 'approved' )
                    <h6 style="font-weight: bold;"><a href="/internships/{{$jobApplication->internship_id}}">{{ \App\Internship::where('id', $jobApplication->internship_id)->first()->internship_function }}</a> | <span class="badge badge-pill badge-success" style="padding: 5px 10px;">{{ $jobApplication->status  }}</span></h6>
                    @elseif ( $jobApplication->status == 'declined' )
                    <h6><a href="/internships/{{$jobApplication->internship_id}}">{{ \App\Internship::where('id', $jobApplication->internship_id)->first()->internship_function }}</a> | <span class="badge badge-pill badge-danger" style="padding: 5px 10px;">{{ $jobApplication->status  }}</span></h6>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>

</div>
@endsection
