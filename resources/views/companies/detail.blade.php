@extends('layouts/app')

@section('title')
    Companies
@endsection

@section('h2')
Detail
@endsection

@section('content')
<div class="form-body">
                    <form method="post" action="">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="internshipFunction">Internship Function</label>
                                <input id="internshipFunction" placeholder="Internship Function" type="text" class="form-control @error('internshipFunction') is-invalid @enderror" name="internshipFunction" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="discription">Discription</label>
                                <textarea class="form-control" id="discription" placeholder="Discription" name='discription' rows="5" required></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="spots">Open spots</label>
                                <input class="form-control spots" id="spots" placeholder="Open internship spots (example: 1, 2, 3,...)" name="spots" type="number"  required>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-md-5 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


@endsection