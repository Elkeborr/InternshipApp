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

        <button href="" class="btn">  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Schrijf een beoordeling</button>
        @foreach($company->reviews as $review)
        <div class="company-show_reviews-one">
           <div>
                <img>
                <p>naam van de user</p>
           </div>
           <div>
                <p>{{$review->review}}</p>
            </div>
            <div>
                <p> <span>Beoordeling:</span><br></p>
                <div id="stars">
                    <span class="glyphicon glyphicon-star" aria-hidden="true" id="star1"></span> 
                    <span class="glyphicon glyphicon-star" aria-hidden="true" id="star2"></span> 
                    <span class="glyphicon glyphicon-star" aria-hidden="true" id="star3"></span> 
                    <span class="glyphicon glyphicon-star" aria-hidden="true" id="star4"></span> 
                    <span class="glyphicon glyphicon-star" aria-hidden="true" id="star5"></span> 
                </div>
            </div>
        </div>
        @endforeach
    </section>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    
    if( {{$review->score}} )
        let score= {{$review->score}};
        $( document ).ready(function() {
        switch(score) {
        case 0:
        break;
        case 1:
            $("#star1").addClass("checked");
        break;
        case 2:
            $("#star1").addClass("checked");
            $("#star2").addClass("checked");
        break;
        case 3:
            $("#star1").addClass("checked");
            $("#star2").addClass("checked");
            $("#star3").addClass("checked");
        break;
        case 4:
            $("#star1").addClass("checked");
            $("#star2").addClass("checked");
            $("#star3").addClass("checked");
            $("#star4").addClass("checked");
        break;
        case 5:
            $("#star1").addClass("checked");
            $("#star2").addClass("checked");
            $("#star3").addClass("checked");
            $("#star4").addClass("checked");
            $("#star5").addClass("checked");
        break;
    }
    })


    </script>