@extends('layouts/detail')

@section('title')
{{$company->name}}
@endsection


@section('link')
{{ url('/companies') }}
@endsection

@section('content')

<div class="company-profile">
 <section class="company-show_info">
    <div class="company-show container">

    

        <div class="company-show_info_photo">
            @if (\Auth::user()->company_id === $company->id)
            <img src="{{asset('../img/edit-grey.png')}}" class="editProfile" width="15" alt="edit" onclick="window.location.href='/companies/{{$company->id }}/edit'">
            @endif
        
            @if($company->logo !=null)
                <img src="{{asset('../company-images').'/'.$company->logo}}" alt="profile picture" class="profilepic">
             @endif

            @if($company->logo ==null)
                <img src="{{asset('../img/defaultProfile.png')}}" alt="profile picture" class="profilepic">
            @endif
        </div>
        <div class="company-show_info_text">
        


        
            <h1>{{$company->name}}</h1>
            <p>{{$company->bio}}</p>
            <p>Werknemers: {{$company->employees}}</p>
            <h3>Vakgebied(en)</h3>
            <ul>
                @foreach($company->tags as $tag)
                <li>{{$tag->tags->name}}</li>
                @endforeach
            </ul>


         
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
</div>
@endsection


<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>