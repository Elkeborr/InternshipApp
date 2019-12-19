@extends('layouts/detail')

@section('title')
Wijzig profiel
@endsection

@section('link')
/students/{{$user->id }}
@endsection

@section('content')

<div class="editpart">

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
    <h2>Profielfoto</h2>
    <br>

    <div class="panel panel-primary">
        <div class="profielfoto">

            @if($user->profile_picture != null)
            <img src="{{asset('../profileImages').'/'.$user->profile_picture}}" alt="profile picture" class="profilepic">
            @endif

            @if($user->profile_picture == null)
            <img src="{{asset('../img/defaultProfile.png')}}" alt="profile picture" class="profilepic">
            @endif
        </div>
        <br>
        <form action="/students/imageUpload/{student}" method="POST" enctype="multipart/form-data">
            {{method_field('put')}}
            @csrf
            <input type="file" name="image" class="form-control">
            <br>
            <button type="submit" class="btn btn-success">Opslaan</button>
        </form>

        <br><br><br><br><br>

        <!-- persoonlijke gegevens --->
        <form action="/students/update/{{$user->id}}" method="post">
            {{method_field('put')}}
            {{csrf_field()}}

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
    <br><br><br>
    <h2>Bio</h2>
    <br>
    <form action="/students/updateIntro/{{$user->id}}" method="post">
        {{method_field('put')}}
        {{csrf_field()}}

            
            <textarea class="form-control" name="biography" id="biography">{{$user->biography}}</textarea>

            <br>
            <button type="submit" class="btn btn-success">Opslaan</button>
            <br><br><br><br>
    </form>
    <br><br>
    <h2>Kwaliteiten</h2>
    <br><br>
    @foreach ($user->skills as $skill)
    <form method="post">
        {{method_field('put')}}
        {{csrf_field()}}

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
        <br>

    </form>
    @endforeach
    <hr>
    <form method="post">
                {{method_field('put')}}
                {{csrf_field()}}
            <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="skill" id="skill" placeholder="Nieuwe skill">
                        </div>

                        <div class="col">
                            <button type="submit" class="btn btn-success" formaction="/students/addSkills/{student}">Nieuwe toevoegen</button>
                        </div>
            </div>
            
    </form>
    <br><br><br><br><br><br>


    <h2>Social Media links</h2>
    @foreach ($user->socials as $social)

    <form method="post">
        {{method_field('put')}}
        {{csrf_field()}}

        <br><br>

        <select name="socialName">
            <option selected="selected" value="{{$social->name}}">{{$social->name}}</option>
            <option value="Website">Website</option>
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
    <br>
    <hr>
    


    
    <form action="/students/addSocial/{student}" method="post">
            {{method_field('put')}}
            {{csrf_field()}}

                                <select name="socialname">
                                    <option selected="selected" disabled="disabled">Nieuw social media kanaal</option>
                                    <option value="Facebook" {{ old('socialname') == "Facebook" ? 'selected' : '' }}>Facebook</option>
                                    <option value="Instagram" {{ old('socialname') == "Instagram" ? 'selected' : '' }}>Instagram</option>
                                    <option value="Linkedin" {{ old('socialname') == "Linkedin" ? 'selected' : '' }}>Linkedin</option>
                                    <option value="Behance" {{ old('socialname') == "Behance" ? 'selected' : '' }}>Behance</option>
                                    <option value="Github" {{ old('socialname') == "Github" ? 'selected' : '' }}>Github</option>
                                    <option value="Dribbble" {{ old('socialname') == "Dribbble" ? 'selected' : '' }}>Dribbble</option>
                                    <option value="Pinterest" {{ old('socialname') == "Pinterest" ? 'selected' : '' }}>Pinterest</option>
                                    <option value="Vimeo" {{ old('socialname') == "Vimeo" ? 'selected' : '' }}>Vimeo</option>
                                    <option value="Twitter" {{ old('socialname') == "Twitter" ? 'selected' : '' }}>Twitter</option>
                                    <option value="Youtube" {{ old('socialname') == "Youtube" ? 'selected' : '' }}>Youtube</option>
                                </select>
                                <br><br>

                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" name="sociallink" id="sociallink" placeholder="Nieuwe link, beginnent met 'http://'" value="{{ old('sociallink') }}">
                                    </div>

                                    <div class="col">
                                        <button type="submit" class="btn btn-success">Nieuwe toevoegen</button>
                                    </div>
                                </div>
            <br><br><br><br>

            </form>
    










    @endsection