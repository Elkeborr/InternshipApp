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
                <div class="form-title">{{ __('Signup for companies') }}</div>
                <div class="form-body">
                    <form method="POST" action="">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="name">Name</label>
                                <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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

                        <div class="form-row">
                            <div class="form-group col-md-5">
                            <label for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" placeholder="Password verification" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-7">
                            <label for="inputStreet">Street</label>
                                <input type="text" class="form-control" id="inputStreet" placeholder="Street" name="street">
                            </div>
                            <div class="form-group col-md-3">
    <label for="postalCode">Street Number</label>
      <input type="text" class="form-control" id="streetNumber" placeholder="street Number"  name="streetNumber">
    </div>
                        </div>
 
  <div class="form-row">
    <div class="form-group col-md-5">
    <label for="City">City</label>
      <input type="text" class="form-control" id="City" placeholder="City" name="city">
    </div>
    <div class="form-group col-md-5">
    <label for="postalCode">Postalcode</label>
      <input type="text" class="form-control" id="postalCode" placeholder="Postalcode"  name="postalCode">
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
@endsection
