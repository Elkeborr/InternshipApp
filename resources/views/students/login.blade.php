@extends('layouts/form')

@section('title')
Inloggen
@endsection

@section('content')
<div class="row align-items-start">
    <div class="col left">
        <div class="logo">
            <a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="Logo"></a>
        </div>
        <h2>Opzoek naar een<br><span>stageplaats?</span></h2>
    </div>

    <div class="col wrap-form">

        <div class="form-container">
            <form method="post" class="form-body">

                {{csrf_field()}}

                <div class="form-title">{{ __('Studentlogin') }}</div>

                @if ($flash = session('message'))
                <div class="alert alert-danger">{{$flash}}</div>
                @endif

                <div class="form-group ">
                    <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="E-mailadres" name="email">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Wachtwoord" name="password">
                </div>

                <div class="grid-buttons">
                    <div class="grid-button">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>

                    <div class="grid-button">
                        <a href="{{ url('/redirect') }}" style="background-color:#4267B2" class="btn btn-primary facebookLogin">Login met Facebook</a>
                    </div>
                </div>

            </form>
            <br>
            Nog geen account? Registreer <a href="{{url('/students/register')}}" class="">hier</a>.

            @if (Route::has('password.request'))
            <br>
            <a class="" href="{{ route('password.request') }}">
                {{ __('Wachtwoord vergeten?') }}
            </a>
            @endif

        </div>


        @endsection