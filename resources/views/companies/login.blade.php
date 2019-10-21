@extends('layouts/form')

@section('title')
    Login
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
        {{csrf_field()}}
        @if ($flash = session('message'))
                    <div class="alert alert-sucess">{{$flash}}</div>
                    @endif
                    <div class="form-title">{{ __('Login for companies') }}</div>
                    <div class="form-group ">
    <input type="email" class="form-control"  aria-describedby="emailHelp" placeholder="Enter email" name="email">
  
  </div>
  <div class="form-group">
    <input type="password" class="form-control"  placeholder="Password" name="password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Remember me</label>
  </div>
  <button type="submit" class="btn ">  {{ __('Login') }}</button>

</form>

@if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
        <div class="form-group ">
                            <div class="">
                                <a href="{{url('/companies/register')}}" class="btn btn-primary">No account yet? Signup here</a>
                            </div>
                        </div>




                        </div>
                </div>
@endsection
