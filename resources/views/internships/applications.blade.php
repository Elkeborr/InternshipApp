@extends('layouts/app')

@section('title')
Stageplaats
@endsection

@section('content')

@if ($new ?? '' == 'new')
    @component('components/alert')
        @slot('type','info')
        Er zijn nieuwe sollicitaties. <a href="/seen">Markeer ze als gezien</a>
    @endcomponent
@endif

@foreach($internship->jobApplications as $jobApplication)

<?php $applicationUser = \App\User::where('id', $jobApplication->user_id)->first(); ?>
<div class="card" style="width: 18rem; float: left; margin: 10px;">
    <div class="card-body">
        <h5 class="card-title">{{$applicationUser->name}}</h5>
        @if($jobApplication->status == 'new')
        <span class="badge badge-pill badge-primary" style="padding: 5px 10px;">Nieuw</span>
        @elseif($jobApplication->status == 'starred')
        <span class="badge badge-pill badge-warning" style="padding: 5px 10px;">In behandeling</span>
        @elseif($jobApplication->status == 'approved')
        <span class="badge badge-pill badge-success" style="padding: 5px 10px;">Aangenomen</span>
        @elseif($jobApplication->status == 'declined')
        <span class="badge badge-pill badge-danger" style="padding: 5px 10px;">Geweigerd</span>
        @endif
        <br>
        <form action="/{{$jobApplication->id}}/save" method="post" style="margin-top: 30px;">
            @csrf
            <div class="form-group">
                <select class="form-control" name="status" id="status">
                    @if($jobApplication->status == 'new')
                    <option value="new" selected>Nieuw</option>
                    @else
                    <option value="new">Nieuw</option>
                    @endif

                    @if($jobApplication->status == 'starred')
                    <option value="starred" selected>In behandeling</option>
                    @else
                    <option value="starred">In behandeling</option>
                    @endif

                    @if($jobApplication->status == 'approved')
                    <option value="approved" selected>Aangenomen</option>
                    @else
                    <option value="approved">Aangenomen</option>
                    @endif

                    @if($jobApplication->status == 'declined')
                    <option value="declined" selected>Geweigerd</option>
                    @else
                    <option value="declined">Geweigerd</option>
                    @endif
                </select>
            </div>
            @if($jobApplication->status == 'approved' || $jobApplication->status == 'declined')
            <button class="btn btn-secondary" type="submit" disabled>Opslaan</button>
            @else
            <button class="btn btn-secondary" type="submit">Opslaan</button>
            @endif
        </form>
    </div>
</div>
@endforeach
@endsection
