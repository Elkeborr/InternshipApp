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
      <p> {{dd($company->users)}} </p>
    @if($company->users->profile_picture!=null)
    <div class="company-show_info_photo">
            <img href="../profileImages/{{$company->profile_picture}}">
        </div>
        @endif
        <div class="company-show_info_text">
            <h1>{{$company->name}}</h1>
            @if($company->website!=null)
            <div class="contact_website">
            <a href='{{$company->website}}' alt='website' target="_blank"> {{$company->name}} website </a> 
</div>
@endif
<br>
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

            <div class="companies__detail">
                <div class="internships_detail-padding">
                    <a>{{ $internship->internship_function }}</a>
                    <p>{{ $internship->internship_discription }}</p>
                    <hr class="companies__line">
                    <p>{{ $internship->available_spots }}beschikbaar</p>
                </div>
                <a href="/internships/{{ $internship->id }}" class="btn btn-secondary">Bekijk vacature</a>
            </div>
            @endforeach
        </div>
        @endif
    </section>
    <section class="company-show_reviews">
        <h2>Beoordelingen</h2>
        <button class="btn myBtn"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
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
                        <input type="hidden" type="score" name="score" class="rating-value" value="0">
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
                @if($reviews->users->profile_picture==null)
                <img src="../img/defaultProfile.png" alt="profile picture" class="profilepic_small-review" width="20px">
                @endif
                @if($reviews->users->profile_picture!=null)
                <img src="../profileImages/{{$reviews->users->profile_picture}}" alt="profile picture" class="profilepic_small-review">
                @endif
                <p>{{$reviews->users->name}}</p>

            </div>
            <div>
                <p>{{$reviews->review}}</p>
            </div>
            <div>
                <p> <span>Beoordeling:</span><br></p>
                <div id="stars">
                    @for ($i = 0; $i < $reviews->score; $i++)
                    <span class="glyphicon glyphicon-star star star1 checked" aria-hidden="true"></span>
                    @endfor
                    @for($i = 5; $i - $reviews->score; $i--)
                    <span class="glyphicon glyphicon-star star star1" aria-hidden="true"></span>
                    @endfor
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