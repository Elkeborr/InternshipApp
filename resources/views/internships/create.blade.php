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
                    <label for="spots">Beschikbare plaatsen</label>
                    <input class="form-control spots" id="spots" placeholder="Beschikbare plaatsen (bijvoorbeeld: 1, 2, 3,...)" name="spots" type="number" required>
                </div>
            </div>

            <div class="form-group row ">
                <div class="col-md-5 ">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Opslaan') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection