@extends('layouts/detail')

@section('title')
Wijzig profiel
@endsection

@section('link')
/students/{{$user->id }}
@endsection

@section('content')

<div class="editpart">
    <h2>Wijzig uw Social Media links</h2>
    @foreach ($user->socials as $social)

    <form method="post">
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

        <select name="socialName">
            <option selected="selected" value="{{$social->name}}">{{$social->name}}</option>
            <option value="Facebook">Facebook</option>
            <option value="Instagram">Instagram</option>
            <option value="Linkedin">Linkedin</option>
            <option value="Behance">Behance</option>
            <option value="Github">Github</option>
            <option value="Dribbble">Dribbble</option>
            <option value="Pinterest">Pinterest</option>
            <option value="Vimeo">Vimeo</option>
            <option value="Twitter">Twitter</option>
            <option value="Youtube">Youtube</option>
        </select>
        <br><br>
        <div class="row">
            <div class="col">
                <input type="hidden" class="form-control" name="socialId" id="socialId" value="{{$social->id}}">
                <input type="text" class="form-control" name="socialLink" id="socialLink" value="{{$social->link}}">
            </div>

            <div class="col">
                <button type="submit" class="btn btn-success" formaction="/students/updateSocial/{student}">Opslaan</button>
                <button type="submit" class="btn btn-danger" formaction="/students/deleteSocial/{student}">Verwijder</button>
            </div>
        </div>
    </form>

    @endforeach
</div>

@endsection