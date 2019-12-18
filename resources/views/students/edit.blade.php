@extends('layouts/detail')

@section('title')
Wijzig profiel
@endsection

@section('link')
/students/{{$user->id }}
@endsection

@section('content')

<div class="editpart">
    <br>
    <h2>Profiel foto</h2>
    <br>

    <div class="panel panel-primary">
        <div class="profielfoto">

            @if($user->profile_picture!=null)
            <img src="{{asset('../profileImages').'/'.$user->profile_picture}}" alt="profile picture" class="profilepic">
            @endif

            @if($user->profile_picture==null)
            <img src="{{asset('../img/defaultProfile.png')}}" alt="profile picture" class="profilepic">

            @endif
        </div>
        <br>
        Wijzig je profielfoto
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>

        @endif

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





        <form action="/students/imageUpload/{student}" method="POST" enctype="multipart/form-data">
            {{method_field('put')}}
            @csrf
            <input type="file" name="image" class="form-control">
            <br>
            <button type="submit" class="btn btn-success">Upload</button>
        </form>

        <br><br><br><br><br>

        <!-- persoonlijke gegevens --->
        <form action="/students/update/{{$user->id}}" method="post">
            {{method_field('put')}}
            {{csrf_field()}}

            @if( $errors->any() )
            @component('components/alert')
            @slot('type','danger')
            Niet alle velden zijn ingevuld
            <ul>
                @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
                @endforeach
            </ul>
            @endcomponent
            @endif


            <br>
            <h2>Profiel gegevens</h2>
            <br>
            <br>
            <label for="email">E-mailadres</label>
            <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
            <br>
            <label for="password">Wachtwoord *</label>
            <input type="password" class="form-control" name="password" id="password" value="">
            <p class="required">* verplichte velden</p>
            <div class="form-row">
                <div class="col">
                    <label for="firstname">Voornaam</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" value="{{$user->name}}">
                </div>

                <div class="col">
                    <label for="lastname">Achternaam</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" value="{{$user->lastname}}">
                </div>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Opslaan</button>
            <br>
            <br>
            <br>
            <br>

        </form>
    </div>


    @endsection