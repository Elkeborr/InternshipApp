@extends('layouts/detail')

@section('title')
Pas internship aan
@endsection

@section('link')
{{ url('/internships/$myinternship->id')}}
@endsection

@section('content')
<div class="container">
    <div class="form-body">
        <form method="post" action="/internships/editMyInternship/{{$internship->id}}">
        {{method_field('put')}}
        {{csrf_field()}}
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="internshipFunction">Stageplaats functie</label>
                            <input id="internshipFunction"  value='{{$internship->internship_function}}' type="text" class="form-control @error('internshipFunction') is-invalid @enderror" name="internshipFunction" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="discription">Beschrijving</label>
                            <textarea class="form-control" id="discription"  value='{{$internship->internship_discription}}'name='discription' rows="5" required>{{$internship->internship_discription}}</textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="profile">Profiel</label>
                            <textarea class="form-control" id="profile"  value='{{$internship->internship_profile}}' name='profile' rows="5" required>{{$internship->internship_profile}}</textarea>
                        </div>
                    </div>
               

                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="spots">Beschikbare plaatsen</label>
                            <input class="form-control spots" id="spots"  value='{{$internship->available_spots}}' name="spots" type="number" min="0" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="languages">Talen</label>
                            <input class="form-control languages" id="languages"  value='{{$internship->languages}}' name="languages" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="education">Onderwijs niveau</label>
                            <input class="form-control education" id="education"  value='{{$internship->education_level}}' name="education" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="education">Zoektermen toevoegen</label>
                            <input class="form-control tag" id="tag" placeholder="Vb.: HTML, PHP, PhotoShop,...">
                        </div>
                        <div class="form-group col-md-5">
                            <br>
                            <input class="form-control tag" id="tags-hidden" type='hidden' name="tags" value="{{$internship->tags}}">
                            <button type="" class="btn btn-primary" id="add_search_tag" name="add" style="margin-top:6px;">Zoekterm toevoegen</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <ul class="tag-list">
                                @foreach($tags as $tag)
                                    @if( $tag != '')
                                        <li class="tag-item">{{$tag}}</li>
                                    @endif
                                @endforeach
                        </ul>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="driver_license">Rijbewijs nodig</label>
                            @if($internship->drivers_license == 1)
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="1" name="driver_license" checked>
                                <span class="form-check-label">Ja</span>
                                <span class="checkmark"></span>
                            </label>

                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="0" name="driver_license">
                                <span class="form-check-label">Neen</span>
                                <span class="checkmark"></span>
                            </label>
                            @else
                            <label class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="1" name="driver_license">
                                <span class="form-check-label">Ja</span>
                                <span class="checkmark"></span>
                            </label>

                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="0" name="driver_license" checked>
                                <span class="form-check-label">Neen
                                </span>
                                <span class="checkmark"></span>
                            </label>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="paid">Betaald</label>
                            @if($internship->paid== 1)
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="1" name="paid" checked>
                                <span class="form-check-label">Ja</span>
                                <span class="checkmark"></span>
                            </label>

                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="0" name="paid">
                                <span class="form-check-label">Neen</span>
                                <span class="checkmark"></span>
                                </label>

                                @else
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="1" name="paid">
                                <span class="form-check-label">Ja</span>
                                <span class="checkmark"></span>
                            </label>

                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="0" name="paid"checked>
                                <span class="form-check-label">Neen</span>
                                <span class="checkmark"></span>
                                </label>
                                @endif
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="spots">Opmerkingen</label>
                        <textarea class="form-control remarks" id="remarks" value="{{$internship->remarks}}" name="remarks" rows="5">{{$internship->remarks}}</textarea>
                    </div>
                    </div>
                    <div class="form-group row ">
                    <div class="col-md-6 ">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Opslaan') }}
                        </button>
                    </div>
                </div>
                </div>
               
            </div>
    </div>
    </form>
</div>
</div>

<script src="{{ asset('js/add_tag.js') }}" defer></script>
<script src="{{ asset('js/ajax_setup.js') }}" defer></script>
@endsection