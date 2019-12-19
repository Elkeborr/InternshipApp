@extends('layouts/detail')

@section('title')
{{$company->name}}
@endsection


@section('link')
{{ url('/home') }}
@endsection

@section('content')

<div class="company-show container">
    
    @if (\Auth::user()->company_id === $company->id)
    <div class="edit_btn">
        <a class="btn" onclick="window.location.href='/companies/{{$company->id }}/edit'" >   <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Wijzigen</a>
        </div>
        @endif
    
    <section class="company-show_info">
        <div class="company-show_info_photo">
        @if(!$company->logo == null)
            <img src="{{asset('../company-images').'/'.$company->logo}}" class="profilepic" alt='logo'>
         @else
                <img src="{{asset('../img/defaultProfile.png')}}" alt="profile picture" class="profilepic">
            @endif
        </div>
    
        <div class="company-show_info_text">
        
            <h1>{{$company->name}}</h1>
            <p>{{$company->bio}}</p>
            <p>Website: {{$company->website}}</p>
            <p>Werknemers: {{$company->employees}}</p>
            <h3>Vakgebied(en)</h3>
            <ul>
                @foreach($company->tags as $tag)
                <li>{{$tag->tags->name}}</li>
                @endforeach
            </ul>
        </div>

         
    </section>

    <section class="company-show_contact">
        <h2>Contact</h2>
        <div>
            <p><span>Gegevens: </span><br>
                {{$company->email}}<br>
                {{$company->phoneNumber}}</p>
        </div>
        <div>
            <p> <span>Adres: </span><br>
                {{$company->street}} {{$company->streetNumber}}<br>
                {{$company->postalCode}} {{$company->city}}</p>
        </div>
    </section>


</div>
@endsection


<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>