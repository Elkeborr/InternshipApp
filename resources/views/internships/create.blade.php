@extends('layouts/app')

@section('title')
Nieuwe stageplaats
@endsection

@section('h2')
Nieuwe stageplaats
@endsection

@section('link')
{{ url('/home') }}
@endsection
@section('content')
<div class="container">
    <div class="form-body">
        <form method="post" action="">
            {{csrf_field()}}
            <div class="row no-gutters">
            <div class="col-6">
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="internshipFunction">Stageplaats functie</label>
                        <input id="internshipFunction" placeholder="Stageplaats functie" type="text" class="form-control @error('internshipFunction') is-invalid @enderror" name="internshipFunction" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="discription">Beschrijving</label>
                        <textarea class="form-control" id="discription" placeholder="Beschrijving" name='discription' rows="5" required></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="profile">Profile</label>
                        <textarea class="form-control" id="profile" placeholder="Profiel van u stagair" name='profile' rows="5" required></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="spots">Beschikbare plaatsen</label>
                        <input class="form-control spots" id="spots" placeholder="Beschikbare plaatsen (bijvoorbeeld: 1, 2, 3,...)" name="spots" type="number" required>
                    </div>
                </div>
            </div>
            <div class="col-6">
            <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="education">Onderwijs niveau</label>
                        <input class="form-control education" id="education" placeholder="" name="education"  required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="drivers_license">Rijbewijs nodig</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Ja
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="0" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                Neen
                            </label>
                        </div>
                    </div>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="spots">Opmerkingen</label>
                        <textarea class="form-control remarks" id="remarks" placeholder="Hebt u enige opmerkinge voor de stage zoals de epriode of de andere" name="remarks" rows="5" required></textarea>
                    </div>


                </div>
                <div class="form-group row ">
                    <div class="col-md-5 ">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Opslaan') }}
                        </button>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </div>
</div>
@endsection