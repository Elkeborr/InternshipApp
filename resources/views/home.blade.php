@extends('layouts/app')
@section('title')
Overzicht
@endsection

@section('h2')
Overzicht
@endsection



@section('content')
<div class="container">


    @if ($flash = session('message'))
    @component('components/alert')
    @slot('type','success')
    {{$flash}}
    @endcomponent
    @endif

    @if (\Auth::user()->type == 'company')

    <h2 style="margin-bottom: 50px;">Sollicitanten voor uw stageplaatsen</h2>

    @if (!$internships->isEmpty())
    @foreach ($internships as $internship)
    <div class="internship" style="margin-bottom: 30px;">
        <h3 style="margin-bottom: 10px;"><a href="/internships/{{$internship['id']}}">{{$internship['internship_function']}} bij {{$company->name}} - {{$internship['available_spots']}} available spots</a></h3>

        @if (!$internship['jobApplications']->isEmpty())
        @foreach ($internship['jobApplications'] as $jobApplication)
        <div class="intern" style="background: #EFEFEF; padding: 10px; box-sizing: border-box; border-radius: 10px; margin-bottom: 10px; display: inline-block;">
            <a style="display: inline-block;" class="job-applicant-name-link" href="/students/{{\Auth::user()::where('id', $jobApplication['user_id'])->first()->id}}"><img src="https://icons-for-free.com/iconfiles/png/512/profile+user+icon-1320166082804563970.png" alt="profile icon" style="width: 20px; margin-right: 10px;">{{\Auth::user()::where('id', $jobApplication['user_id'])->first()->name}}</a>
        </div>
        @endforeach
        @else

        @component('components/alert')
        @slot('type','info')
        Er zijn nog geen sollicitanten
        @endcomponent

        @endif

    </div>

    @endforeach
    @else
    <p>Er zijn nog geen sollicitanten</p>
    @endif

    @endif

    @if (\Auth::user()->type == 'student')

    <h2>Jouw sollicitaties</h2>

    @if (!$jobApplications->isEmpty())
    <div class="companies">
    @foreach ($jobApplications as $jobApplication)
       
        <div class="companies__detail">
                  <img>
                  <br>
                <a href="/internships/{{$jobApplication['internship_id']}}">{{\App\Internship::where('id', $jobApplication['internship_id'])->first()['internship_function']}}</a>
                <p> {{Str::limit( \App\Internship::where('id', $jobApplication['internship_id'])->first()['internship_discription'], $limit = 100, $end = ' ...')}}</p>
                <hr class="companies__line">
                @if ( $jobApplication->status == 'new' )
                <span class="badge badge-pill badge-primary">{{ $jobApplication->status  }}</span>
                @elseif ( $jobApplication->status == 'starred' )
                <span class="badge badge-pill badge-warning">{{ $jobApplication->status  }}</span>
                @elseif ( $jobApplication->status == 'approved' )
                <span class="badge badge-pill badge-success">{{ $jobApplication->status  }}</span>
                @elseif ( $jobApplication->status == 'declined' )
                <span class="badge badge-pill badge-danger">{{ $jobApplication->status  }}</span>
                @endif
            </div>
   
    @endforeach
    </div>
    @else
    <p>Er zijn nog geen Sollicitaties</p>
    @endif
    @endif


</div>
@endsection