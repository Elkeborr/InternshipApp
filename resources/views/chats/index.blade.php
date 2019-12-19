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
    <a href="/chats/{{$message->chat_id}}">{{$message->user->name}}</a>
    <hr>
    <p>{{$message->created_at->diffForHumans()}}</p>

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
    <a href="/chats/{{$message->chat_id}}">{{$message->company->name}}</a>
    <hr>
    <p>{{$message}}</p>
    <p>{{$message->created_at->diffForHumans()}}</p>

</div>
@endforeach
@endif
@endif



</div>
@endsection