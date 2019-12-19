@extends('layouts/detail')

@section('title')
Wijzig profiel
@endsection

@section('link')
/companies/profile/{$company }
@endsection

@section('content')

<div class="editpart">

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Oei!</strong> Er is iets misgelopen!
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
    <br>
    <h2>Wijzig uw logo</h2>


    <div class="panel panel-primary">

        <div class="profielfoto">

            @if($company->logo !=null)
                <img src="{{asset('../company-images').'/'.$company->logo}}" alt="profile picture" class="profilepic">
             @endif

            @if($company->logo ==null)
                <img src="{{asset('../img/defaultProfile.png')}}" alt="profile picture" class="profilepic">
            @endif
        </div>


       


        <form action="/companies/imageUpload/{{$company->id}}" method="POST" enctype="multipart/form-data">
            {{method_field('put')}}
            @csrf
            <input type="file" name="image" class="form-control">
            <br>
            <button type="submit" class="btn btn-success">Opslaan</button>
        </form>

        <br><br><br><br><br>

        <!-- persoonlijke gegevens --->
        <form action="/companies/{{$company->id}}/save" method="post">
            {{method_field('put')}}
            {{csrf_field()}}

            <h2>Bedrijfsgegevens</h2>
            <br>


            <label for="companyname">Bedrijfsnaam</label>
            <input type="text" class="form-control" name="companyname" id="companyname" value="{{$company->name}}">
            <br>
            <label for="email">E-mailadres</label>
            <input type="text" class="form-control" name="email" id="email" value="{{$company->email}}">
            <br>

            <div class="form-row">
                <div class="col">
                    <label for="tel">Telefoonnummer</label>
                    <input type="text" class="form-control" name="tel" id="tel" value="{{$company->phoneNumber}}">
                </div>

                <div class="col">
                    <label for="employees">Aantal werknemers</label>
                    <input type="number" class="form-control" name="employees" id="employees" value="{{$company->employees}}">
                </div>

            </div>
            <br>
            <label for="biography">Bio</label>
            <textarea class="form-control" name="biography" id="biography">{{$company->bio}}</textarea>
            <br>
            <br>
            <br>
            <h2>Adresgegevens</h2>
            <br>
            <div class="form-row">
                <div class="col">
                    <label for="street">Straat</label>
                    <input type="text" class="form-control" name="street" id="street" value="{{$company->street}}">
                    <br>
                </div>

                <div class="col-sm-">
                    <label for="nr">huisnummer</label>
                    <input type="text" class="form-control" name="nr" id="nr" value="{{$company->streetNumber}}">
                    <br>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="gemeente">Gemeente</label>
                    <input type="text" class="form-control" name="gemeente" id="gemeente" value="{{$company->city}}">
                    <br>
                </div>

                <div class="col-sm-">
                    <label for="postcode">Postcode</label>
                    <input type="text" class="form-control" name="postcode" id="postcode" value="{{$company->postalCode}}">
                    <br>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Opslaan</button>
            <br>
        </form>


        
            {{method_field('put')}}
            {{csrf_field()}}
            <br><br><br><br>
            <h2>Vakgebieden</h2>
            <br>

          

            @foreach ($company->tags as $tag)
                <form action="/companies/editTags/{{$company->id}}" method="post">
                    {{method_field('put')}}
                    {{csrf_field()}}
                    
                    <input type="hidden" class="form-control" name="TagId" id="TagId" value="{{$tag->tags->id}}">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="tag" id="tag" value="{{$tag->tags->name}}">
                        </div>

                        <div class="col">
                            <button type="submit" class="btn btn-success" formaction="/companies/editTags/{{$company->id}}">Opslaan</button>
                            <button type="submit" class="btn btn-danger" formaction="/companies/deleteTags/{{$company->id}}">Verwijder</button>
                        </div>
                    </div>

                </form>
                <br>
            @endforeach
            <hr>
            <form action="/companies/saveTags/{{$company->id}}" method="post">
                {{method_field('put')}}
                {{csrf_field()}}
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="tag" id="tag" placeholder="Nieuw vakgebied">
                        </div>

                        <div class="col">
                            <button type="submit" class="btn btn-success" formaction="/companies/addTags/{{$company->id}}">Nieuwe toevoegen</button>
                        </div>
                    </div>
            </form>
           
                

    <br>







</div>


@endsection