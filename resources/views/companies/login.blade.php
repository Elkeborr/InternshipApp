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
                    <form method="POST" action="">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-5">
                            <label for="email">Email</label>
                                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-5">
                            <label for="password">Password</label>
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
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
