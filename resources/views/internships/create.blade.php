@extends('layouts/app')

@section('title')
Nieuwe stageplaats
@endsection

@section('h2')
Nieuwe stageplaats
@endsection

@section('link')
{{ url('/myInternships') }}
@endsection
@section('content')
<div class="container">
    <div class="form-body">
        <form method="post" action="">
            {{csrf_field()}}
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="internshipFunction">Stageplaats functie</label>
                            <input id="internshipFunction" placeholder="Functie" type="text" class="form-control @error('internshipFunction') is-invalid @enderror" name="internshipFunction" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="discription">Beschrijving</label>
                            <textarea class="form-control" id="discription" placeholder="Beschrijving" name='discription' rows="5" required></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="profile">Profiel</label>
                            <textarea class="form-control" id="profile" placeholder="Profiel van u stagair" name='profile' rows="5" required></textarea>
                        </div>
                    </div>
               

                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="spots">Beschikbare plaatsen</label>
                            <input class="form-control spots" id="spots" placeholder="Beschikbare plaatsen (bijvoorbeeld: 1, 2, 3,...)" name="spots" type="number" min="0" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="languages">Talen</label>
                            <input class="form-control languages" id="languages" placeholder="Nederlands,Frans,Engels,.." name="languages" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="education">Onderwijs niveau</label>
                            <input class="form-control education" id="education" placeholder="Niveau" name="education" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="education">Zoektermen toevoegen</label>
                            <input class="form-control tag" id="tag" placeholder="Vb.: HTML, PHP, PhotoShop,..." name="education">
                        </div>
                        <div class="form-group col-md-5">
                            <br>
                            <button type="submit" class="btn btn-primary" id="add_search_tag" name="add" style="margin-top:6px;">Zoekterm toevoegen</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <ul class="tag-list">
                            <li class="tag-item">Test</li>
                            <li class="tag-item">Test</li>
                            <li class="tag-item">Tester in de breedte</li>
                            <li class="tag-item">Test</li>
                            <li class="tag-item">Test</li>
                            <li class="tag-item">Tester in de breedte</li>
                            <li class="tag-item">Test</li>
                            <li class="tag-item">Test</li>
                            <li class="tag-item">Tester in de breedte</li>
                            <li class="tag-item">Test</li>
                            <li class="tag-item">Test</li>
                            <li class="tag-item">Tester in de breedte</li>
                        </ul>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="driver_license">Rijbewijs nodig</label>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="1" name="driver_license">
                                <span class="form-check-label">
                                    Ja
                                </span>
                                <span class="checkmark"></span>
                            </label>

                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="0" name="driver_license">
                                <span class="form-check-label">
                                    Neen
                                </span>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="paid">Betaald</label>

                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="1" name="paid">
                                <span class="form-check-label">Ja</span>
                                <span class="checkmark"></span>
                            </label>

                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="0" name="paid">
                                <span class="form-check-label">Neen</span>
                                <span class="checkmark"></span>
                                </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="spots">Opmerkingen</label>
                            <textarea class="form-control remarks" id="remarks" placeholder="Hebt u enige opmerkingen zoals de periode of de andere" name="remarks" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-md-6 ">
                            <button type="submit" class="btn btn-primary" name="save">
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