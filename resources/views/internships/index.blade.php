@extends('layouts/app')

@section('title')
Stageplaatsen
@endsection

@section('h2')
    Stageplaatsen
@endsection

@section('content')

@if ($flash = session('message'))
@component('components/alert')
@slot('type','info')
	{{$flash}}
@endcomponent
@endif


<div class="container_companies">
    <div class="companies_filters">
		<div class="companies_form">
		<h5>Filters</h5>
		<hr class="companies__line">
		<div class="panel-heading " >
						<h6 class="panel-title">
							<a data-toggle="collapse" href="#collapse0">
							 Regio
							 <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
							</a>
						
						</h6>
					</div>
            <form action=""method="post">
			{{csrf_field()}}
			<div id="collapse0" class="panel-collapse collapse in" >
			@foreach($states as $state)
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="{{$state->state}}" name="state[]">
				  <span class="form-check-label">
				    {{$state->state}}
				  </span>
				  <span class="checkmark"></span>
                </label>
                    @endforeach
</div>
        
<div class="panel-heading" >
						<h6 class="panel-title">
							<a data-toggle="collapse" href="#collapse1">
								Vakgebied
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
							</a>
						</h6>
					</div>
					<div id="collapse1" class="panel-collapse collapse in">
					@foreach($tags as $tag)
					<label class="form-check">
				  		<input class="form-check-input" type="checkbox" value="{{$tag->id}}" name="tag[]">
				  		<span class="form-check-label">
				    	{{$tag->name}}
				  		</span>
				  <span class="checkmark"></span>
                </label>
                    @endforeach
				</div>
                <button type="submit" class="btn ">Bekijken</button> 
			</form>
	

</div>
</div>

<div class="companies row">
    @if (\Auth::user()->type == 'student')
        @foreach($internships as $internship)
            <div class="companies__detail" >
                <a href ="/internships/{{ $internship->id }}">{{ $internship->internship_function }}</a>
                <p>{{Str::limit( $internship->internship_discription, $limit = 120, $end = ' ...')}}</p>
                <hr class="companies__line">
                <p>{{ $internship->available_spots }} beschikbaar</p>
                @if ($internship->jobApplications->count() == 0)
				<button href="/internships/{{ $internship->id }}/apply" class="btn">Solliciteer</button>
                @else
                    @foreach($internship->jobApplications as $jobApplication)
                        @if ($internship->available_spots != 0 && $jobApplication->user_id != \Auth::user()->id)
                            <button href="/internships/{{ $internship->id }}/apply" class="btn">Solliciteer</button>
                        @endif
                        @if ($jobApplication->user_id == \Auth::user()->id)
                            <div class="alert alert-primary" role="alert">
                                U heeft reeds gesolliciteerd voor deze stageplaats.
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        @endforeach
    </div>
@else
    @foreach ($internships as $internship)
        {{--@foreach($internship->jobApplications as $jobApplication)
        @endforeach--}}
        <div class="companies__detail" >
            <a href ="/internships/{{ $internship->id }}">{{ $internship->internship_function }}</a>
            <p>{{ $internship->internship_discription }}</p>
            <hr class="companies__line">
            <p>{{ $internship->available_spots }} beschikbaar</p>
        </div>
    @endforeach
@endif

@endsection