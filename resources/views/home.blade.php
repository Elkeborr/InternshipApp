@extends('layouts/app')
@section('title')
    Overzicht
@endsection

@section('h2')
Overzicht
@endsection



@section('content')
<div class="container">

    @if (\Auth::user()->type == 'company')
        @if (!$internships->isEmpty())
            <h2 style="margin-bottom: 50px;">Sollicitanten voor uw stageplaatsen</h2>
            @foreach ($internships as $internship)
                <div class="internship" style="margin-bottom: 30px;">
                    <h3 style="margin-bottom: 10px;"><a href="/internships/{{$internship['id']}}">{{$internship['internship_function']}}</a></h3>

                    @if (!$internship['jobApplications']->isEmpty())
                        @foreach ($internship['jobApplications'] as $jobApplication)
                            <div class="intern" style="background: #EFEFEF; padding: 10px; box-sizing: border-box; border-radius: 10px; margin-bottom: 10px; display: inline-block;">
                                <a style="display: inline-block; margin-right: 10px;" class="job-applicant-name-link" href="/students/{{\Auth::user()::where('id', $jobApplication['user_id'])->first()->id}}">
                                    @if(\Auth::user()::where('id', $jobApplication['user_id'])->first()->profile_picture!=null)
                                        <img src="../profileImages/{{\Auth::user()::where('id', $jobApplication['user_id'])->first()->profile_picture}}" alt="profile picture" class="profilepic" style="width: 50px; height: auto; padding: 0;">
                                    @else
                                        <img src="../img/defaultProfile.png" alt="profile picture" class="profilepic" style="width: 50px; height: auto; padding: 0">
                                    @endif
                                    {{\Auth::user()::where('id', $jobApplication['user_id'])->first()->name}}
                                </a>
                                <a href="MAILTO:{{\Auth::user()::where('id', $jobApplication['user_id'])->first()->email}}"><img src="https://www.pngfind.com/pngs/m/42-421842_mail-black-envelope-symbol-svg-png-icon-free.png" alt="mail icon" style="opacity: .5; width: 20px; margin-right: 10px;">Email</a>
                            </div>
                        @endforeach
                    @else

                        <div class="empty-state-container" style="display: flex; flex-flow: column wrap; align-items: center; justify-content: center; height: 200px;">
                            <img src="https://image.flaticon.com/icons/png/512/21/21534.png" alt="empty state" style="opacity: .5; width: 70px; height: auto;">
                            <h2 style="font-size: 2em; margin-bottom: 40px;">Nog geen sollicitanten</h2>
                        </div>

                    @endif

                    <hr>
                </div>

            @endforeach
        @else
            <div class="empty-state-container" style="align-self: center; display: flex; flex-flow: column wrap; align-items: center; justify-content: center; height: calc(100vh - 280px)">
                <img src="https://www.yara.com/siteassets/careers/internship/internship-norway/internship-icons-knowledge-and-experience.png" alt="empty state" style="opacity: .5;">
                <h2 style="font-size: 3em; margin-bottom: 40px;">Nog geen vacatures</h2>
                <a href="/internships/myinternships/create" class="btn">Maak er nu een</a>
            </div>
        @endif

    @endif

    @if (\Auth::user()->type == 'student')

        <h2 style="margin-bottom: 50px;">Jouw sollicitaties</h2>

        @if (!$jobApplications->isEmpty())
            @foreach ($jobApplications as $jobApplication)

                <div class="internship" style="margin-bottom: 30px; margin-right: 10px; background: #F3F3F3; padding: 10px; box-sizing: border-box; border-radius: 10px; display: inline;">
                    <h3 style="margin-bottom: 10px; display: inline;"><a href="/internships/{{$jobApplication['internship_id']}}">{{\App\Internship::where('id', $jobApplication['internship_id'])->first()['internship_function']}}</a></h3>

                    @if( $jobApplication->status == 'new' )
                        <span class="badge badge-pill badge-primary" style="padding: 5px 10px;">Nieuw</span>
                    @elseif($jobApplication->status == 'starred')
                        <span class="badge badge-pill badge-warning" style="padding: 5px 10px;">In behandeling</span>
                    @elseif($jobApplication->status == 'approved')
                        <span class="badge badge-pill badge-success" style="padding: 5px 10px;">Aangenomen</span>
                    @elseif($jobApplication->status == 'declined')
                        <span class="badge badge-pill badge-danger" style="padding: 5px 10px;">Geweigerd</span>
                    @endif

                </div>

            @endforeach
        @else
            <div class="empty-state-container" style="align-self: center; display: flex; flex-flow: column wrap; align-items: center; justify-content: center;">
                <img src="https://www.yara.com/siteassets/careers/internship/internship-norway/internship-icons-knowledge-and-experience.png" alt="empty state" style="opacity: .5;">
                <h2 style="font-size: 3em; margin-bottom: 40px;">Nog geen sollicitaties</h2>
                <a href="/internships" class="btn">Zoek er nu een</a>
            </div>
        @endif

    @endif


</div>





@endsection
