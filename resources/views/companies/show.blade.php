@extends('layouts/detail')

@section('title')
{{$company->name}}
@endsection


@section('link')
{{ url('/companies') }}
@endsection

@section('content')
<div class="company-show container">

    <section class="company-show_info">
        <div class="company-show_info_photo">
            <img>
        </div>
        <div class="company-show_info_text">
            <h1>{{$company->name}}</h1>
            <p>{{$company->bio}}</p>
            <p>Werknemers: {{$company->employees}}</p>
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

    <section class="company-show_internships">
        <h2>Stageplaatsen</h2>
        <div class="companies">
        @foreach($internships as $internship)
            <div class="companies__detail" >
                <div class="internships_detail-padding">
                <a>{{ $internship->internship_function }}</a>
                <p>{{ $internship->internship_discription }}</p>
                <hr class="companies__line">
                <p>{{ $internship->available_spots }} available</p>
                </div>
                <button href="/internships/{{ $internship->id }}/apply" class="btn">Solliciteer</button>
            </div>
        @endforeach
        </div>
    </section>

    <section class="company-show_reviews">
        <h2>Beoordelingen</h2>
        @foreach($company->reviews as $review)
        <div class="company-show_reviews-one">
           <div>
                <img>
                <p>naam vn de user</p>
           </div>
           <div>
                <p>{{$review->review}}</p>
            </div>
            <div>
                <p> <span>Beoordeling:  </span><br>
                Sterretjes??</p>
            </div>
        </div>
        @endforeach
    </section>
</div>
@endsection
