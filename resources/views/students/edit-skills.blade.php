@extends('layouts/detail')

@section('title')
            Wijzig profiel
@endsection

@section('link')
/students/{{$user->id }}
    
@endsection 

@section('content')

<br><br>
<div class="editpart">
@if($user->type == 'student')
<h2>Kwaliteiten</h2>
@endif

@if($user->type == 'company')
<h2>Diensten</h2>
@endif

@foreach ($user->skills as $skill)
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

            
                   
                    
                   
                            <input type="hidden" class="form-control" name="skillid" id="skillid" value="{{$skill->id}}">
                            <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="skill" id="skill" value="{{$skill->skill}}">
                        </div>
                
                        <div class="col">
                            
                        <button type="submit" class="btn btn-success" formaction="/students/updateSkills/{{$user->id}}">Opslaan</button>
                        <button type="submit" class="btn btn-danger" formaction="/students/deleteSkills/{student}">Verwijder</button>
                        </div>
                    </div>
            
            </form>
            <br>

            @endforeach     

           

</div>
@endsection  
