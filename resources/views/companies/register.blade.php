@extends('layouts/form')
@section('title')
   Register
@endsection
@section('content')
    <div class="row align-items-start">
        <div class="col left">
        <div class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="Logo">
        </div>
            <h2>Looking for<br>an <span>intern?</span></h2>
        </div>

        <!---from--->
        <div class="col wrap-form">
        <div class="form-container">
        <form method="post" class="form-body">
                <div class="form-title">{{ __('Signup for companies') }}</div>
                <div class="form-body">
                    <form method="POST" action="">
                    {{csrf_field()}}
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-7">
                           
                                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-7">
                           
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-7">
                   
                                <input id="password-confirm" placeholder="Password verification" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>



                        <div class="form-group row ">
                            <div class="col-md-5 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Signup') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
