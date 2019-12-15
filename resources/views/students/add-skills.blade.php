@extends('layouts/detail')

@section('title')
Wijzig profiel
@endsection

@section('link')
javascript:history.go(-1)
@endsection

@section('content')
<form action="/students/addSkills/{student}" method="post">
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

    <br><br>


    <br>
    <div class="editpart">
        @if($user->type == 'student')
        <label for="skill">Voeg een nieuwe kwaliteit toe</label>
        <input type="text" class="form-control" name="skill" id="skill" placeholder="Vul hier uw skill in bv 'PHP'" value="">
        @endif

        @if($user->type == 'company')
        <label for="skill">Voeg een nieuwe dienst toe</label>
        <input type="text" class="form-control" name="skill" id="skill" placeholder="Vul hier uw dienst in bv 'Webdesign'" value="">
        @endif



    </div>

    <button type="submit" class="btn btn-success">Opslaan</button>
    <br><br><br><br>

</form>



@endsection