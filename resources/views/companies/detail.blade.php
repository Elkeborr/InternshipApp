@extends('layouts/form')

@section('title')
Bedrijven
@endsection

@section('h2')
Bedrijfsgegevens
@endsection

@section('content')
<div class="container">
  <!-- content -->
  <h2>Bedrijfsgegevens</h2>
  <p>Voordat u opzoek gaat naar stagiair(e)s, dient u eerst uw gegevens te vervolledigen.<br>
    We hebben al enkele gegevens gevonden voor uw bedrijf en hebben deze al ingevuld. U bent vrij deze te veranderen.
  </p>
  <form method="post" action="">
    <div class="row no-gutters">
      <div class="col-6">

        {{csrf_field()}}

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputName">Bedrijfsnaam</label>
            @if (isset($company['name']))
            <input type="name" class="form-control @error('name') is-invalid @enderror" id="inputName" value="{{ $company['name']}}" name="name" autocomplete="name" autofocus>
            @else
            <input type="name" id="inputName" class="form-control @error('name') is-invalid @enderror" placeholder="Bedrijfsnaam" name="name" value="{{ old('name') }}">
            @endif
            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail">E-mailadres</label>
            <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputWebsite">Website</label>
            <input type="link" id="inputWebsite" class="form-control @error('website') is-invalid @enderror" placeholder="Website" name="website" value="{{ old('website') }}" autocomplete="website" autofocus>
            @error('website')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputPhonenumber">Telefoonnummer</label>
            <input type="phoneNumber" id="inputPhonenumber" class="form-control @error('phoneNumber') is-invalid @enderror" placeholder="Telefoonnummer" name="phoneNumber" value="{{ old('phoneNumber') }}" autocomplete="phoneNumber" autofocus>
            @error('phoneNumber')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputStreet">Straat </label>
            @if (isset($company['location']['address']))
            <input type="text" id="inputStreet" value="{{$company['location']['address']}}" name="street" class="form-control @error('street') is-invalid @enderror">
            @else
            <input type="text" id="inputStreet" placeholder="straat" name="street" class="form-control @error('street') is-invalid @enderror" autocomplete="street" autofocus value="{{ old('street') }}">
            @endif

            @error('street')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group col-md-2">
            <label for="inputStreetNumber">Huisnummer</label>
            <input type="text" id="inputStreetNumber" placeholder="nummer" name="streetNumber" class="form-control @error('streetNumber') is-invalid @enderror" autocomplete="streetNumber" autofocus value="{{ old('streetNumber') }}">
            @error('streetNumber')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Gemeente</label>
            @if (isset($company['location']['city']))
            <input type="text" id="inputStreet" value="{{$company['location']['city']}}" name="city" class="form-control @error('city') is-invalid @enderror">
            @else
            <input type="text" id="inputStreet" placeholder="Gemeente" name="city" class="form-control @error('city') is-invalid @enderror" autocomplete="city" autofocus value="{{ old('city') }}">
            @endif
            @error('city')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="inputZip">Postcode</label>
            <input type="text" id="inputZip" placeholder="Postcode" name="postalCode" class="form-control @error('postalCode') is-invalid @enderror" autocomplete="postalCode" autofocus value="{{ old('postalCode') }}">
            @error('postalCode')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group col-md-3">
            <label for="inputState">Provincie</label>
            @if (isset($company['location']['state']))
            <input type="text" id="inputState" value="{{$company['location']['state']}}" name="state" class="form-control @error('state') is-invalid @enderror">
            @else
            <input type="text" id="inputState" placeholder="provincie" name="state" class="form-control @error('state') is-invalid @enderror" autocomplete="state" autofocus value="{{ old('state') }}">
            @endif
            @error('state')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
      </div>

      <div class="col-6">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmployees">Hoeveel werknemers werken in uw bedrijf</label>
            <input type="number" id="inputEmployees" placeholder="Werknemers" name="employees" class="form-control @error('employees') is-invalid @enderror" autocomplete="employees" autofocus value="{{ old('employees') }}">
            @error('employees')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputBio">Intro</label>
            <textarea rows="4" cols="50" type="text" id="inputBio" placeholder="@if( old('bio')) {{ old('bio') }} @else Stel uw bedrijf voor @endif" name="bio" class="form-control @error('bio') is-invalid @enderror" autocomplete="bio" autofocus value="{{ old('bio') }}">
      </textarea>
            @error('bio')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6 tags">
            <label for="inputTags">Categorieën</label> <br>
           
              @foreach($tags as $tag)
            <input type="checkbox" name="tag[]" value="{{ $tag->id}}">
            <span class="form-check-label">
              {{ $tag-> name}}
            </span><br>
              @endforeach
           
       
    
          </div>
        </div>

        <button type="submit" class="btn"> {{ __('Opslaan') }}</button>
      </div>
  </form>


</div>
</div>

</div>

</div>

@endsection