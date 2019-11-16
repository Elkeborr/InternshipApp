@extends('layouts/detail')

@section('title')
            Wijzig profiel
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

            <br><br>


            <br>
            <div class="editpart">
                    <h2>Login gegevens</h2><br>
                    <label for="email">E-mailadres</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
                    <br>
                    <label for="password">Wachtwoord</label>
                    <input type="password" class="form-control" name="password" id="password" value="">
                    <br>
                

            </div>
                <div class="form-group editpart">
                <br><br><h2>Profiel</h2><br>
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
                    <label for="biography">Intro</label>
                    <textarea class="form-control" name="biography" id="biography">{{$user->biography}}</textarea>
                    
                    <br>
                    
               
                    <label for="skill">Kwaliteiten</label>
                    @foreach ($user->skills as $skill)
                        <input type="text" class="form-control" name="skill" id="skill" value="{{$skill->skill}}">
                    @endforeach 
                        <input type="text" class="form-control" name="skill" id="skill" value="">
                    


                    <br>
                    <label for="type">Sociale Media</label>
                     <br>
                                @foreach ($user->socials as $social)
                                    <input type="text" class="form-control" name="socialname" id="socialname" value="{{$social->name}}">
                                @endforeach
                                <select>
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
                                @foreach ($user->socials as $social)
                                    <input type="text" class="form-control" name="sociallink" id="sociallink" value="{{$social->link}}">
                                @endforeach
                                <input type="text" class="form-control" name="sociallink" id="sociallink" value="Link">
                      
                    
                </div>

            
                
                <!--
                <div class="form-group">
                    <label for="exampleFormControlFile1">CV</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
                -->

         

            <br>
            <button type="submit" class="btn btn-success">Opslaan</button>
            <br><br><br><br>
            </form>

            
            
@endsection  