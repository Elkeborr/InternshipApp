@extends('layouts/detail')

@section('title')
Wijzig profiel
@endsection

@section('link')
/students/{{$user->id}}
@endsection

@section('content')
<form action="/students/updateIntro/{{$user->id}}" method="post">
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

    <div class="editpart">
        <label for="biography">Stel jezelf voor in een kleine intro</label>
        <textarea class="form-control" name="biography" id="biography">{{$user->biography}}</textarea>

        <br>
        <button type="submit" class="btn btn-success">Opslaan</button>
        <br><br><br><br>

    </div>
</form>



@endsection