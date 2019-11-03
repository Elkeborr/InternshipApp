@extends('layouts/app')

@section('title')
    Companies
@endsection

@section('h2')
Company details
@endsection

@section('content')
<div class="container"> 
    <!-- content -->
    <div class="col">
            <div class="form">
                <div class="form-body">
                <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Phonenumber</label>
      <input type="phonenumber" class="form-control" id="inputEmail4" placeholder="Phonenumber">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Street</label>
      <input type="text" class="form-control" id="inputCity" placeholder="Street">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Street number</label>
      <input type="text" class="form-control" id="inputZip" placeholder="Street Number">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" placeholder="City">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip" placeholder="Zip">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Employees</label>
      <input type="phonenumber" class="form-control" id="inputEmail4" placeholder="Employees">
    </div>
  </div>

  <button type="submit" class="btn">Save details</button>
</form>
                </div>
            </div>
        </div>
        </div>

@endsection