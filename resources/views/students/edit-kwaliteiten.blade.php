@extends('layouts/detail')

@section('title')
            Wijzig profiel
@endsection

@section('link')
    javascript:history.go(-1)
@endsection 

@section('content')
        <form action="/students/updateKwaliteiten/{{$user->id}}" method="post">
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
                   
                    <label for="skill">Kwaliteiten</label>
                    
                    @foreach ($user->skills as $skill)
                        <input type="hidden" class="form-control" name="skillid[]" id="skillid" value="{{$skill->id}}">
                        <input type="text" class="form-control" name="skill[]" id="skill" value="{{$skill->skill}}">
                    @endforeach 
                
            </div>
          
            <button type="submit" class="btn btn-success">Opslaan</button>
            <br><br><br><br>
            
            </form>

            
            
@endsection  