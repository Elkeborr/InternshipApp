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
					<a data-toggle="collapse">
						Regio
					</a>
				</h6>
			</div>
			<form action="" method="post">
				{{csrf_field()}}
				@foreach($states as $state)
				<label class="form-check">
					@if(old('state'))
					@foreach(old('state') as $check)
					@if($check === $state->state)
					<input class="form-check-input" type="checkbox" value="{{$state->state}}" name="state[]" checked>
					<span class="checkmark"></span>
					@endif
					@endforeach
					<input class="form-check-input" type="checkbox" value="{{$state->state}}" name="state[]" class="check">
					<span class="form-check-label">
						{{$state->state}}
					</span>
					<span class="checkmark"></span>
					@else
					<input class="form-check-input" type="checkbox" value="{{$state->state}}" name="state[]">
					<span class="form-check-label">
						{{$state->state}}
					</span>
					<span class="checkmark"></span>
					@endif
					
				</label>
				@endforeach
				<div class="panel-heading">
					<h6 class="panel-title">
						<a data-toggle="collapse">
							Vakgebied
						</a>
					</h6>
				</div>
				@foreach($tags as $tag)
				<label class="form-check">
					@if(old('tag'))
					@foreach(old('tag') as $checktag)
					@if($checktag == $tag->id)
					<input class="form-check-input" type="checkbox" value="{{$tag->id}}" name="tag[]" checked>
					<span class="checkmark"></span>
					@endif
					@endforeach
					<input class="form-check-input" type="checkbox" value="{{$tag->id}}" name="tag[]" class="check">
					<span class="form-check-label">
						{{$tag->name}}
					</span>
					<span class="checkmark"></span>
					@else
					<input class="form-check-input" type="checkbox" value="{{$tag->id}}" name="tag[]" class="check">
					<span class="form-check-label">
						{{$tag->name}}
					</span>
					<span class="checkmark"></span>
					@endif
				</label>
				@endforeach
				<button type="submit" class="btn" id="btncheck">Bekijken</button>
			</form>


		</div>
	</div>


	@if (\Auth::user()->type == 'student')
	<div class="companies">
		@foreach($internships as $internship)
		<div class="companies__detail">
		@if($internship->company->profile_picture!=null)
            <a href="/companies/{{$internship->company->id}}"><img src="../company-images/{{$internship->company->profile_picture}}"></a>
        @endif
			<br>
			<div class="name">
				<a href="/internships/{{ $internship->id }}">{{ $internship->internship_function }}</a>
			</div>
			<p>{{Str::limit( $internship->internship_discription, $limit = 120, $end = ' ...')}}</p>
			<hr class="companies__line">
			<div class="small-info clearfix">
				<p>{{ $internship->company->city }}</p>
				<p>{{ $internship->available_spots }} beschikbaar</p>
			</div>
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