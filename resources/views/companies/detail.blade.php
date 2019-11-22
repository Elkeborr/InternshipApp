@extends('layouts/form')

@section('title')
  Companies
@endsection

@section('h2')
  Company details
@endsection

@section('content')
<div class="container"> 
  <!-- content -->


<h2>Bedrijf details</h2>
<p>Voor je verder kan gaan moet je nog een paar details invullen over je bedrijf. We hebben al enkele 
  gegevens gevonden voor jou. 
</p>
          <form method="post" action="">
          <div class="row no-gutters">
  <div class="col-6"> 
            @csrf

            @if ($flash = session('message'))
            @component('components/alert')
            @slot('type','succes')
              {{$flash}}  
            @endcomponent
            @endif
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputName">Naam</label>
                @if (isset($company['name']))
                <input type="name" class="form-control" id="inputName" value="{{ $company['name']}}" name="name" required>
                @else
                <input type="name" class="form-control" id="inputName"placeholder="naam" name="name" required>
                @endif
              </div>
            </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail">Email</label>
      <input type="email" class="form-control" id="inputEmail" value="{{$user->email}}" name="email" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPhonenumber">Telefoon</label>
      <input type="phoneNumber" class="form-control" id="inputPhonenumber" placeholder="telefoon" name="phoneNumber" required>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputStreet">Straat</label>
      @if (isset($company['location']['address']))
      <input type="text" class="form-control" id="inputStreet"  value="{{$company['location']['address']}}" name="street" required>
      @else
      <input type="text" class="form-control" id="inputStreet" placeholder="straat" name="street" required>
     @endif
    </div>
    <div class="form-group col-md-3">
      <label for="inputStreetNumber">Huisnummer</label>
      <input type="text" class="form-control" id="inputStreetNumber" placeholder="huisnummer"name="streetNumber" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Stad</label>
      @if (isset($company['location']['city']))
      <input type="text" class="form-control" id="inputStreet"  value="{{$company['location']['city']}}" name="city" required>
      @else
      <input type="text" class="form-control" id="inputStreet" placeholder="stad" name="city" required>
     @endif
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-3">
      <label for="inputZip">Postcode</label>
      <input type="text" class="form-control" id="inputZip" placeholder="postcode" name="postalCode" required>
    </div>
    <div class="form-group col-md-3">
      <label for="inputState">Provincie</label>
      @if (isset($company['location']['state']))
      <input type="text" class="form-control" id="inputState"  value="{{$company['location']['state']}}" name="state" required>
      @else
      <input type="text" class="form-control" id="inputState" placeholder="provincie"  name="state" required>
     @endif
    </div>
    </div>
</div>

<div class="col-6"> 
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmployees">Werknemers</label>
      <input type="number" class="form-control" id="inputEmployees" placeholder="werknemers"  name="employees" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputBio">Bio</label>
      <textarea rows="4" cols="50" type="text" class="form-control" id="inputBio" placeholder="Vertel ons meer over je bedrijf"  name="bio" required>
      </textarea>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6 tags" >
      <label for="inputTags">Categorie</label> <br>
      @foreach($tags?? '' as $tag)
      <input type="checkbox" name="tag[]" value="{{ $tag-> id}}"> {{ $tag-> name}}<br>
      @endforeach
    </div>
  </div>

  <button type="submit" class="btn">   {{ __('Save') }}</button>
  </div>
</form>


                </div>
            </div>
       
        </div>

        </div>

@endsection