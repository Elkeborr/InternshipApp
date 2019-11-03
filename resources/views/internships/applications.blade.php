@extends('layouts/app')

@section('title')
    Internship
@endsection

@section('content')
    @foreach($internship->jobApplications as $jobApplication)
        <?php $applicationUser = \App\User::where('id', $jobApplication->user_id)->first() ?>
        <div class="card" style="width: 18rem; float: left; margin: 10px;">
            <div class="card-body">
                <h5 class="card-title">{{$applicationUser->name}}</h5>
                @if($jobApplication->status == 'new')
                    <span class="badge badge-pill badge-primary" style="padding: 5px 10px;">New</span>
                @elseif($jobApplication->status == 'starred')
                    <span class="badge badge-pill badge-warning" style="padding: 5px 10px;">Starred</span>
                @elseif($jobApplication->status == 'approved')
                    <span class="badge badge-pill badge-success" style="padding: 5px 10px;">Approved</span>
                @elseif($jobApplication->status == 'declined')
                    <span class="badge badge-pill badge-danger" style="padding: 5px 10px;">Declined</span>
                @endif
                <br>
                <form action="/{{$jobApplication->id}}/save" method="post" style="margin-top: 30px;">
                    @csrf
                    <div class="form-group">
                        <select class="form-control" name="status" id="status">
                            <option value="new">New</option>
                            <option value="starred">Starred</option>
                            <option value="approved">Approved</option>
                            <option value="declined">Declined</option>
                        </select>
                    </div>
                    <button class="btn btn-secondary" type="submit">Save</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection