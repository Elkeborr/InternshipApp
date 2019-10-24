@extends('layouts/app')

@section('title')
    Internship applies
@endsection

@section('content')
    <h1>{{$internship->internship_function}}</h1>
    <p>{{$internship->internship_discription}}</p>

    @foreach($internship->jobApplications as $jobApplication)
        <div class="card" style="width: 18rem; margin-bottom: 10px">
            <div class="card-body">
                <h5 class="card-title">
                    {{\App\User::where('id', $jobApplication->user_id)->first()->name}}
                    @if ($jobApplication->status == 'new')
                        <span class="badge badge-pill badge-primary">New</span>
                    @elseif ($jobApplication->status == 'starred')
                        <span class="badge badge-pill badge-warning">Starred</span>
                    @elseif ($jobApplication->status == 'approved')
                        <span class="badge badge-pill badge-success">Approved</span>
                    @elseif ($jobApplication->status == 'declined')
                        <span class="badge badge-pill badge-danger">Declined</span>
                    @endif
                </h5>
                <br>
                <form action="#" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Set status</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>New</option>
                            <option>Starred</option>
                            <option>Approved</option>
                            <option>Declined</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-dark">Sumbit</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection