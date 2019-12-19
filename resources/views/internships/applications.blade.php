@extends('layouts/detail')

@section('title')
Stageplaats
@endsection

@section('link')
{{ url('/internships/myinternships') }}
@endsection
@section('content')

@section('content')
<div class="container">
@if($internship->jobApplications->isEmpty())
<h1>{{$internship->internship_function}}</h1>
<div class="splash-application">
<img src="https://image.flaticon.com/icons/png/512/21/21534.png" alt="empty state">
        <h2 >Nog geen solicitanten</h2>
    </div>
@else
@if ($new ?? '' == 'new')
    @component('components/alert')
        @slot('type','info')
        Er zijn nieuwe sollicitaties. <a href="/seen">Markeer ze als gezien</a>
    @endcomponent
@endif

@foreach($internship->jobApplications as $jobApplication)
<h1>{{$internship->internship_function}}</h1>
<?php $applicationUser = \App\User::where('id', $jobApplication->user_id)->first(); ?>
<div class="card" >
    <div class="card-body">
     

       



        <a class="clearfix"href="/students/{{\Auth::user()::where('id', $jobApplication['user_id'])->first()->id}}">{{$applicationUser->name}}</a>
        @if($jobApplication->status == 'new')
        <span class="badge badge-pill badge-primary">Nieuw</span>
        @elseif($jobApplication->status == 'starred')
        <span class="badge badge-pill badge-warning">In behandeling</span>
        @elseif($jobApplication->status == 'approved')
        <span class="badge badge-pill badge-success">Aangenomen</span>
        @elseif($jobApplication->status == 'declined')
        <span class="badge badge-pill badge-danger">Geweigerd</span>
        @endif
        <br>
        <form action="/{{$jobApplication->id}}/save" method="post">
            @csrf
            <div class="form-group">
                <select class="form-control" name="status" id="status">
                    @if($jobApplication->status == 'new')
                    <option value="new" selected>Nieuw</option>
                    @else
                    <option value="new">Nieuw</option>
                    @endif

                    @if($jobApplication->status == 'starred')
                    <option value="starred" selected>In behandeling</option>
                    @else
                    <option value="starred">In behandeling</option>
                    @endif

                    @if($jobApplication->status == 'approved')
                    <option value="approved" selected>Aangenomen</option>
                    @else
                    <option value="approved">Aangenomen</option>
                    @endif

                    @if($jobApplication->status == 'declined')
                    <option value="declined" selected>Geweigerd</option>
                    @else
                    <option value="declined">Geweigerd</option>
                    @endif
                </select>
            </div>
            @if($jobApplication->status == 'approved' || $jobApplication->status == 'declined')
            <button class="btn btn-secondary" type="submit" disabled>Opslaan</button>
            @else
            <button class="btn btn-secondary" type="submit">Opslaan</button>
            @endif
        </form>
        <hr>m
        <div class='message_chat'>
            @if($messagesCompany->user_id ==! \App\User::where('id', $jobApplication->user_id)->first()->id)
            <a href="/chats/{{\App\User::where('id', $jobApplication->user_id)->first()->id}}/newMessage" class="btn">Stuur bericht</a>
            @else
            <a href="/chats/{{$messagesCompany->chat_id}}" class="btn ">Berichten</a>
            @endif
            </div>
    </div>
</div>
@endforeach
@endif
</div>
@endsection
