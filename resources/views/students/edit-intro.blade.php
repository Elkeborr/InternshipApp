@extends('layouts/detail')

@section('title')
            Wijzig profiel!!!!!!!!
@endsection

@section('link')
    javascript:history.go(-1)
@endsection 

@section('content')
        <form action="/students/{{$user->id}}" method="post">
            {{method_field('put')}}
            {{csrf_field()}}

            @if( $errors->any() )
                @component('components/alert')
                    @slot('type','danger')
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endcomponent
            @endif

            <div class="editpart">
            <label for="biography">Intro</label>
            <textarea class="form-control" name="biography" id="biography">{{$user->biography}}</textarea>
                    
            <br>
            <button type="submit" class="btn btn-success">Opslaan</button>
            <br><br><br><br>
            
            </div>
            </form>

            
            
@endsection  