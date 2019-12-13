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
			<div class="panel-heading ">
				<h6 class="panel-title">
					<a data-toggle="collapse" href="#collapse0">
						Regio
						<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
					</a>

				</h6>
			</div>
			<form action="" method="post">
				{{csrf_field()}}
				<div id="collapse0" class="panel-collapse collapse in">
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

				<div class="panel-heading">
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


	@if (\Auth::user()->type == 'student')
	<div class="companies">
		@foreach($internships as $internship)
		<div class="companies__detail">
			<h3>{{ $internship->internship_function }}</h3>
			<p>{{Str::limit( $internship->internship_discription, $limit = 120, $end = ' ...')}}</p>
			<hr class="companies__line">
			<p>{{ $internship->available_spots }} beschikbaar</p>
			<a href="/internships/{{ $internship->id }}" class="btn btn-secondary">Bekijk vacature</a>

		</div>
		@endforeach
	</div>

	@else
	<div class="companies">
		@foreach ($internships as $internship)
		{{--@foreach($internship->jobApplications as $jobApplication)
        @endforeach--}}
		<div class="companies__detail">
			<a href="/internships/{{ $internship->id }}">{{ $internship->internship_function}}</a>
			<p>{{ $internship->internship_discription }}</p>
			<hr class="companies__line">
			<p>{{ $internship->available_spots }} beschikbaar</p>
		</div>
		@endforeach
	</div>
	@endif


</div>
@endsection