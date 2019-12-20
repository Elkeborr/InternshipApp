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
    <div class="internship">
        <h3><a href="/internships/{{$internship['id']}}">{{$internship['internship_function']}}</a></h3>
        @if (!$internship['jobApplications']->isEmpty())
        @foreach ($internship['jobApplications'] as $jobApplication)
        <div class="intern">
            <a class="job-applicant-name-link" href="/students/{{\Auth::user()::where('id', $jobApplication['user_id'])->first()->id}}">
                @if(\Auth::user()::where('id', $jobApplication['user_id'])->first()->profile_picture!=null)
                <img src="../profileImages/{{\Auth::user()::where('id', $jobApplication['user_id'])->first()->profile_picture}}" alt="profile picture" class="profilepic_small">
                @else
                <img src="../img/defaultProfile.png" alt="profile picture" class="profilepic">
                @endif
                {{\Auth::user()::where('id', $jobApplication['user_id'])->first()->name}}
            </a>
            <a href="MAILTO:{{\Auth::user()::where('id', $jobApplication['user_id'])->first()->email}}"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email</a>
           
            <div class="messages_btns">
            @if(!$messagesCompany == null)
                @if($messagesCompany->company_id !== $company->id)
        <a href="/chats/{{\Auth::user()::where('id', $jobApplication['user_id'])->first()->id}}/newMessage" class="btn" >Stuur bericht</a>
        @else
        <a href="/chats/{{$messagesCompany->chat_id}}" class="btn">Berichten</a>
        @endif
        @else
        <a href="/chats/{{\Auth::user()::where('id', $jobApplication['user_id'])->first()->id}}/newMessage" class="btn">Stuur bericht</a>
        @endif
        </div>
        </div>
        @endforeach
        @else

        <div class="empty-state-container">
            <img src="https://image.flaticon.com/icons/png/512/21/21534.png" alt="empty state">
            <h4>Nog geen sollicitanten</h4>
        </div>

        @endif
    </div>

    @endforeach
    @else
    <div class=" splash">
        <img src="https://www.yara.com/siteassets/careers/internship/internship-norway/internship-icons-knowledge-and-experience.png" alt="empty state">
        <h2>Nog geen vacatures</h2>
        <a href="/internships/myinternships/create" class="btn">Maak er nu een</a>
    </div>
    @endif

    @endif

    @if (\Auth::user()->type == 'student')

    <h2>Jouw sollicitaties</h2>
 @if (!$jobApplications->isEmpty() || !$likes->isEmpty() )

    @foreach ($jobApplications as $jobApplication)
    <?php
    $internship = \App\Internship::where('id', $jobApplication->internship_id)->first();
    $company = \App\Company::where('id', $internship->company_id)->first();
   $message = \App\Message::where('user_id', \Auth::user()->id)->where('company_id', $company->id)->first();
    ?>
    <div class="internships">
        <img>
        <h3><a href="/internships/{{$jobApplication['internship_id']}}">{{\App\Internship::where('id', $jobApplication['internship_id'])->first()['internship_function']}} bij {{$company->name}}</a></h3>
        @if( $jobApplication->status == 'new' )
        <span class="badge badge-pill badge-primary">Nieuw</span>
        @elseif($jobApplication->status == 'starred')
        <span class="badge badge-pill badge-warning">In behandeling</span>
        @elseif($jobApplication->status == 'approved')
        <span class="badge badge-pill badge-success">Aangenomen</span>
        @elseif($jobApplication->status == 'declined')
        <span class="badge badge-pill badge-danger ">Geweigerd</span>
        @endif<br><br>
        <p>{{Str::limit( $internship->internship_discription, $limit = 100, $end = ' ...')}}</p>
        <strong>{{$company->city}}</strong><br><br>
        <a href="/companies/{{$company->id}}" class="btn">Ga naar bedrijf</a>
        
        @if(!$messagesStudent == null)
                @if( $message)        
                <a href="/chats/{{$message->chat_id}}" class="btn message_btn" >Berichten</a> 
                @else
                <a href="/chats/{{$company->id}}/newMessage" class="btn message_btn" >Stuur bericht</a>
                @endif
        @endif


    </div>
    @endforeach


    <h2><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Opgeslagen</h2>
    @foreach ($likes as $like)
    <div class="likes">
        <img>
        <h3><a href="/internships/{{$like['internship_id']}}">{{\App\Internship::where('id', $like['internship_id'])->first()['internship_function']}} bij {{$like->internship->company->name}}</a></h3>
        <p>
            {{Str::limit( $like->internship->internship_discription, $limit = 100, $end = ' ...')}}
        </p>
        <strong>{{$like->internship->company->city}}</strong><br><br>
        <a href="/companies/{{$like->internship->company->id}}" class="btn btn-like">Ga naar bedrijf</a>

        <form action="" method="POST">
            {{method_field('put')}}
            {{csrf_field()}}
            <button class="btn btn-secondary orange" name="delete" value="delete" type="submit">
                Verwijder</button>
            <input type="hidden" type="id" name="id" value="{{$like->internship->id}}">
        </form>

    </div>
    @endforeach


    @else
    <div class="splash">
        <img src="https://www.yara.com/siteassets/careers/internship/internship-norway/internship-icons-knowledge-and-experience.png" alt="empty state" style="opacity: .5;">
        <h2>Nog geen sollicitaties</h2>
        <a href="/internships" class="btn">Zoek er nu een</a>
    </div>
    @endif
    @endif

</div>

@endsection