@extends('layouts/detail')

@section('title')
Nieuw bericht
@endsection

@section('link')
{{ url('/chats') }}
@endsection

@section('content')
<div class="container">
@if (\Auth::user()->type == 'company')
<div class="chat row">
        <div class="col-6 chat_form">
            <p>Stuur je eerste bericht naar {{$user->name}}</p>
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
        <div class="col-6 chat_form">
        <p>Stuur je eerste bericht naar {{$company->name}}</p>
            <form method='post'>
                {{csrf_field()}}
                <textarea rows="4" cols="10" type="text" placeholder="Bericht" name="message" class="form-control message_textarea"></textarea>
                <input type="submit" value="Verzenden" class="btn" name="userSave">
            </form>
        </div>
    </div>
@endif
@endsection