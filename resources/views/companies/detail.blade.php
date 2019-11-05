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


<h2>Company details</h2>
<p>Before you start your search for interns you have to complete this form so that your account is complete.</p>
          <form method="post" action="">
          <div class="row no-gutters">
  <div class="col-6"> 
            @csrf

            @if ($flash = session('message'))
            <div class="alert alert-sucess">{{$flash}}</div>
            @endif
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputName">Name</label>
                @if (isset($company['name']))
                <input type="name" class="form-control" id="inputName" value="{{ $company['name']}}" name="name" required>
                @else
                <input type="name" class="form-control" id="inputName"placeholder="name" name="name" required>
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
      <label for="inputPhonenumber">Phonenumber</label>
      <input type="phoneNumber" class="form-control" id="inputPhonenumber" placeholder="phonenumber" name="phoneNumber" required>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputStreet">Street </label>
      @if (isset($company['location']['address']))
      <input type="text" class="form-control" id="inputStreet"  value="{{$company['location']['address']}}" name="street" required>
      @else
      <input type="text" class="form-control" id="inputStreet" placeholder="street" name="street" required>
     @endif
    </div>
    <div class="form-group col-md-3">
      <label for="inputStreetNumber">Street number</label>
      <input type="text" class="form-control" id="inputStreetNumber" placeholder="street number"name="streetNumber" required>
    </div>
  </div>

</div>

<div class="col-6"> 
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      @if (isset($company['location']['city']))
      <input type="text" class="form-control" id="inputStreet"  value="{{$company['location']['city']}}" name="city" required>
      @else
      <input type="text" class="form-control" id="inputStreet" placeholder="city" name="city" required>
     @endif
    </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-3">
      <label for="inputZip">Postal code</label>
      <input type="text" class="form-control" id="inputZip" placeholder="postal code" name="postalCode" required>
    </div>
    <div class="form-group col-md-3">
      <label for="inputState">State</label>
      @if (isset($company['location']['state']))
      <input type="text" class="form-control" id="inputState"  value="{{$company['location']['state']}}" name="state" required>
      @else
      <input type="text" class="form-control" id="inputState" placeholder="state"  name="state" required>
     @endif
    </div>
    </div>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmployees">Employees</label>
      <input type="number" class="form-control" id="inputEmployees" placeholder="Employees"  name="employees" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputBio">Bio</label>
      <textarea rows="4" cols="50" type="text" class="form-control" id="inputBio" placeholder="Tell us about your company"  name="bio" required>
      </textarea>
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