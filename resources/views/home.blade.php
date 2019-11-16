@extends('layouts/app')
@section('title')
    Overzicht
@endsection

@section('h2')
Overzicht
@endsection



@section('content')
<div class="container">


@if ($flash = session('message'))
@component('components/alert')
@slot('type','success')
        {{$flash}}
@endcomponent
@endif

    <h3>Belangrijke mededelingen</h3>
    <h3>Recente activiteiten</h3>


</div>




    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">	
        {{ __('Afmelden') }}	
    </a>	

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">	
      @csrf	
    </form>

@endsection
