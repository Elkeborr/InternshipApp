@extends('layouts/form')
@section('title')
Registeren
@endsection
@section('content')
<div class="row align-items-start">
    <div class="col left">
        <div class="logo">
            <a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="Logo"></a>
        </div>
        <h2>Op zoek naar <br><span>een stageplaats?</span></h2>
    </div>

    <!---from--->
    <div class="col wrap-form">
        <div class="form-container">
            <form method="post" class="form-body">
                <div class="form-title">{{ __('Studentregistratie') }}</div>
                <div class="form-body">
                    <form method="POST" action="">
                        {{csrf_field()}}
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <input id="name" placeholder="Voornaam" type="text" class="form-control @error('name') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-7">

                                <input id="email" placeholder="E-mailadres" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-7">

                                <input id="password" placeholder="Wachtwoord" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <input id="password-confirm" placeholder="Wachtwoord verificatie" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>



                        <div class="form-group row ">
                            <div class="col-md-5 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registreer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    Al een account? Inloggen kan <a href="{{url('/students/login')}}" class="">hier</a>.

                </div>
        </div>
    </div>
</div>
</div>
@endsection