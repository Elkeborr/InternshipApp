@extends('layouts/form')

@section('content')
<div class="row align-items-start">
        <div class="col left">
        <div class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="Logo">
        </div>
            <h2>Looking for<br>an <span>intern?</span></h2>
        </div>
        <div class="col">
            <div class="form">
                <div class="form-title">{{ __('Login for companies') }}</div>
                <div class="form-body">
                <form method="post" action="">
               
        {{csrf_field()}}
        @if ($flash = session('message'))
<div class="alert alert-sucess">{{$flash}}</div>
@endif
            <div class="form-row">
                <div class="form-group col-md-5">
                    <input name= "email"type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
            <input name= "password" type="password" class="form-control" id="password" placeholder="Password">
        </div>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>
              <div class="form-group row ">
                            <div class="col-md-5 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-offset-4">
                                <a href="{{url('/redirect')}}" class="btn btn-primary">Login with Facebook</a>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-offset-4">
                                <a href="{{url('/companies/register')}}" class="btn btn-primary">No account yet? Signup here</a>
                            </div>
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
