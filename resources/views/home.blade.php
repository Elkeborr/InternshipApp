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

    <!--
    <h3>Belangrijke mededelingen</h3>
    <h3>Recente activiteiten</h3>
    -->

    @if (\Auth::user()->type == 'company')

        <h2 style="margin-bottom: 50px;">Sollicitanten voor uw stageplaatsen</h2>

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
                    <p>Er zijn nog geen sollicitanten</p>
                @endif

            </div>

        @endforeach

    @endif


</div>


    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        {{ __('Afmelden') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>

@endsection
