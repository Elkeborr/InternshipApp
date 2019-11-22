@extends('layouts/detail')

@section('title')
            Wijzig profiel
@endsection

@section('link')
    javascript:history.go(-1)
@endsection 

@section('content')
        <form action="/students/updateSocial/{student}" method="post">
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
                    
                    <label for="type">Wijzig uw Social Media links</label>
                                <br><br>
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
                                <br><br>
                                    <input type="text" class="form-control" name="sociallink" id="sociallink" value="{{$social->link}}">
                                    <br><br><br>
                                    @endforeach
                                <br>

                            
                    
                </div>
            <br>
            <button type="submit" class="btn btn-success">Opslaan</button>
            <br><br><br><br>
            
            </form>

            
            
@endsection  