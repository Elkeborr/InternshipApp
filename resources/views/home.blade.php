@extends('layouts/app')
@section('title')
    Dashboard
@endsection

@section('h2')
    Dashboard
@endsection



@section('content')
<div class="container">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($flash = session('message'))
                        <div class="alert alert-sucess" role="alert">{{$flash}}</div>
                    @endif


    <h3>Highlights for you</h3>
    <h3>Recent Activity</h3>


</div>




    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">	
        {{ __('Logout') }}	
    </a>	

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">	
      @csrf	
    </form>

@endsection
