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
            <h2>Opzoek naar een<br><span>stagiair(e)?</span></h2>
        </div>
<!---from--->
        <div class="col wrap-form">

<div class="form-container">
        <form method="post" class="form-body">
        {{csrf_field()}}
                    <div class="form-title">{{ __('Bedrijfslogin') }}</div>
                    @if ($flash = session('message'))
           <div class="alert alert-danger">{{$flash}}</div>
        @endif
                    <div class="form-group ">
    <input type="email" class="form-control"  aria-describedby="emailHelp" placeholder="E-mailadres" name="email">
  
  </div>
  <div class="form-group">
    <input type="password" class="form-control"  placeholder="Wachtwoord" name="password">
  </div>

  <button type="submit" class="btn ">  {{ __('Login') }}</button>

</form>

@if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Wachtwoord vergeten?') }}
            </a>
        @endif
        <div class="form-group ">
                            <div class="">
                                <a href="{{url('/companies/register')}}" class="btn btn-primary">Nog geen account? Registreer hier</a>
                            </div>
                        </div>
                        </div>
                </div>
@endsection
