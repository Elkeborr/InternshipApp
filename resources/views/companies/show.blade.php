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

    <section class="company-show_internships">
        <h2>Stageplaatsen</h2>
        @if(empty($internships))

        @component('components/alert')
            @slot('type','info')
            Er zijn nog geen stageplaatsen bij dit bedrijf
        @endcomponent
        @else 
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
       @endif
    </section>

    <section class="company-show_reviews">
        <h2>Beoordelingen</h2>
        <button class="btn myBtn" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        Schrijf een beoordeling</button>
    
        
        <div id="myModal" class="modal is-hidden is-visuallyHidden">
            <div class="modal-content">
            <span id="closeModal" class="close">&times;</span>
            <form action="" method="post">
            {{csrf_field()}}
                <p>We horen graag jouw mening voor {{$company->name}}</p>
                <label for="review">Recensie</label>
                <textarea type="review" class="form-control" type="textarea" name="review" id="review" placeholder="Beoordeling" maxlength="600" rows="4" required></textarea>
                <label for="stars">Beoordeling</label>
                <div id="stars_review">
                    <span class="glyphicon glyphicon-star star fa-star-o" data-rating="5" aria-hidden="true" id="star1_review"></span> 
                    <span class="glyphicon glyphicon-star star fa-star-o" data-rating="4" aria-hidden="true" id="star2_review"></span> 
                    <span class="glyphicon glyphicon-star star fa-star-o" data-rating="3" aria-hidden="true" id="star3_review"></span> 
                    <span class="glyphicon glyphicon-star star fa-star-o" data-rating="2" aria-hidden="true" id="star4_review"></span> 
                    <span class="glyphicon glyphicon-star star fa-star-o" data-rating="1" aria-hidden="true" id="star5_review"></span> 
                    <input type="hidden" type="score" name="score"class="rating-value" value="0">
                </div>
                <button class="btn">Verstuur</button>
            </form>
            </div>
        </div>
        @if(empty($company->reviews))
       
        @component('components/alert')
            @slot('type','info')
            Er zijn nog geen beoordelingen bij dit bedrijf
        @endcomponent
        @else 
        @foreach($company->reviews as $review )
        <div class="company-show_reviews-one">
           <div>
                <img>
                    <p>{{$review->users->name}}</p>
  
           </div>
           <div>
                <p>{{$review->review}}</p>
            </div>
            <div>
                <p> <span>Beoordeling:</span><br></p>
                <div id="stars">
                    <span class="glyphicon glyphicon-star star" aria-hidden="true" id="star1"></span> 
                    <span class="glyphicon glyphicon-star star" aria-hidden="true" id="star2"></span> 
                    <span class="glyphicon glyphicon-star star" aria-hidden="true" id="star3"></span> 
                    <span class="glyphicon glyphicon-star star" aria-hidden="true" id="star4"></span> 
                    <span class="glyphicon glyphicon-star star" aria-hidden="true" id="star5"></span> 
                    <input type="hidden" type="score" name="score" class="star-value" value="{{$review->score}}">
                </div>
            </div>
        </div>
        @endforeach
       @endif
    </section>
</div>
@endsection

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

<script>
/*
$( document ).ready(function() {
    $( ".company-show_reviews .company-show_reviews-one" ).each(function( index ) {

        var rating = $("#stars .star-value");
    console.log(rating)
    switch(rating) {
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


});
});


/*
var $star_rating = $("#stars .star");
var $review = $(".company-show_reviews .company-show_reviews-one");

var rating = function() {
    $review.each(function() {
   $star_rating.each(function() {
        var rating = $("#stars .star-value");
    
        switch(rating) {
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
    });

})};


*/
</script>


