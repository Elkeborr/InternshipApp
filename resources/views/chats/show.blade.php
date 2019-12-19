@extends('layouts/detail')

@section('title')
Chat
@endsection

@section('link')
{{ url('/chats') }}
@endsection

@section('content')
<div class="container">


@if (\Auth::user()->type == 'company')
<div class="chat row">
        <div class="messenger col-6">
            @foreach($messagesUser as $message)

            @if($message->sender == 'user')
            <div class="left_chat clearfix">
            <p>{{$message->user->name}}</p>
                <p>{{$message->message}}</p>
                <p class="date">{{$message->created_at->diffForHumans()}}</p>
            </div>
            @elseif($message->sender == 'company')
            <div class="right_chat clearfix">
            <p>{{\Auth::user()->name}}</p>
                <p>{{$message->message}}</p>
                <p class="date">{{$message->created_at->diffForHumans()}}</p>
            </div>
            @endif
            @endforeach
        </div>
        <div class="col-6 chat_form">
            <form method='post'>
                {{csrf_field()}}
                <textarea rows="4" cols="10" type="text" placeholder="Bericht" name="message" class="form-control message_textarea"></textarea>
                <input type="submit" value="Verzenden" class="btn" name="companySave">
            </form>
        </div>
    </div>
@endif

@if (\Auth::user()->type == 'student')

<div class="chat row">
        <div class="messenger col-6">
            @foreach($messagesCompany as $message)
            @if($message->sender == 'user')
            <div class="right_chat clearfix">
            <p>{{\Auth::user()->name}}</p>
                <p>{{$message->message}}</p>
                <p class="date">{{$message->created_at->diffForHumans()}}</p>
            </div>
            @elseif($message->sender == 'company')
            <div class="left_chat clearfix">
      
            <p>{{$message->user->name}}</p>
                <p>{{$message->message}}</p>
                <p class="date">{{$message->created_at->diffForHumans()}}</p>
            </div>
            @endif
            @endforeach
        </div>
        <div class="col-6 chat_form">
            <form method='post'>
                {{csrf_field()}}
                <textarea rows="4" cols="10" type="text" placeholder="Bericht" name="message" class="form-control message_textarea"></textarea>
                <input type="submit" value="Verzenden" class="btn" name="userSave">
            </form>
        </div>
    </div>
@endif






   
</div>
@endsection