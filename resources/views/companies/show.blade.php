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
       

        @if($internships->isEmpty())
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
        @if($company->reviews->isEmpty())
    
        @component('components/alert')
            @slot('type','info')
            Er zijn nog geen beoordelingen bij dit bedrijf
        @endcomponent
        @else 
        @foreach($company->reviews as $reviews )
        <div class="company-show_reviews-one">
           <div>
                <img>
                    <p>{{$reviews->users->name}}</p>
  
           </div>
           <div>
                <p>{{$reviews->review}}</p>
            </div>
            <div>
                <p> <span>Beoordeling:</span><br></p>
                <div id="stars">
                    <span class="glyphicon glyphicon-star star star1" aria-hidden="true"></span> 
                    <span class="glyphicon glyphicon-star star star2" aria-hidden="true"></span> 
                    <span class="glyphicon glyphicon-star star star3" aria-hidden="true"></span> 
                    <span class="glyphicon glyphicon-star star star4" aria-hidden="true"></span> 
                    <span class="glyphicon glyphicon-star star star5" aria-hidden="true"></span> 
                    <input type="hidden" type="score" name="score" class="star-value" value="{{$reviews->score}}">
                </div>

            </div>
        </div>
        @endforeach
       @endif
    </section>
</div>
@endsection

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

