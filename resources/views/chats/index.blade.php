@extends('layouts/app')

@section('title')
Berichten
@endsection

@section('h2')
Berichten
@endsection

@section('content')

<div class="container chat">
    @if (\Auth::user()->type == 'company')

    @if($messagesUser->isEmpty())
    @component('components/alert')
    @slot('type','info')
    Geen nieuwe berichten binnen
    @endcomponent
    @else

    @foreach($messagesUser as $message)
    <div class="message">

        @if(!$message->user->profile_picture == null)
        <div class="chat-photo clearfix">
            <img src="../profileImages/{{$message->user->profile_picture}}" class="profilepic_small-chat clearfix" alt='logo'>
            <a href="/chats/{{$message->chat_id}}" class="">{{$message->user->name}}</a>
        </div>
        @else
        <a href="/chats/{{$message->chat_id}}">{{$message->user->name}}</a>
        @endif

        <hr>
        <p class="date">{{$message->created_at->diffForHumans()}}</p>

    </div>
    @endforeach
    @endif
    @endif

    @if (\Auth::user()->type == 'student')

    @if($messagesCompany->isEmpty())
    @component('components/alert')
    @slot('type','info')
    Geen nieuwe berichten binnen
    @endcomponent
    @else

    @foreach($messagesCompany as $message)
    <div class="message">
        <p>{{$message->user->profile_picture }}</p>
        @if(!$message->user->profile_picture == null)
        <div class="chat-photo clearfix">
            <img src="../profileImages/{{$message->user->profile_picture}}" class="profilepic_small-chat" alt='logo'>
            <a href="/chats/{{$message->chat_id}}" class="clearfix">{{$message->company->name}}</a>
        </div>
        @else
        <a href="/chats/{{$message->chat_id}}">{{$message->company->name}}</a>
        @endif
        <hr>
        <p class="date">Laatste bericht {{$message->created_at->diffForHumans()}}</p>
    </div>
    @endforeach
    @endif
    @endif
</div>
@endsection