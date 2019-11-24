@extends('layouts/detail')

@section('title')
            Wijzig profiel
@endsection

@section('link')
/students/{{$user->id }}
@endsection 

@section('content')
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

            <br><br>


            <br>
            <div class="editpart">
                    <br><h2>Profiel gegevens</h2><br>
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
                

            </div>
            <!--
            <div class="form-group editpart">
                <br><h2>Profiel</h2><br>
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
                        <input type="hidden" class="form-control" name="skillid" id="skillid" value="{{$skill->id}}">
                        <input type="text" class="form-control" name="skill" id="skillEdit" value="{{$skill->skill}}">
                    @endforeach 
                    
                        <input type="text" class="form-control" name="skill" id="skill" placeholder="Vul hier uw skill in bv 'PHP'"value="">
                    


                    <br>
                    <label for="type">Sociale Media</label>
                  
                                @foreach ($user->socials as $social)
                                <select name="sociallink" value="{{$social->name}}">
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
                                    <input type="text" class="form-control" name="sociallink" id="sociallink" value="{{$social->link}}">
                                    <br>
                                    @endforeach
                                <br>

                            
                                <select name="socialname">
                                    <option selected="true" disabled="disabled" value="Facebook">Kies een social media kanaal</option>
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
                                <input type="text" class="form-control" name="sociallink" id="sociallink" placeholder="Plak hier de link naar uw social media kanaal" value="">
                      
                    
                </div>

            
                
               

         
-->
            <br>
            <button type="submit" class="btn btn-success">Opslaan</button>
            <br><br><br><br>
            
            </form>

            
            
@endsection  