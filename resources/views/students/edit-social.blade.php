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
            <br>
            <button type="submit" class="btn btn-success">Opslaan</button>
            <br><br><br><br>
            
            </form>

            
            
@endsection  