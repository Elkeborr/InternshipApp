@extends('layouts/app')

@section('title')
Bedrijven
@endsection

@section('h2')
Bedrijven
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
					<input class="form-check-input" type="checkbox" value="{{$state->state}}" name="state[]">
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
					<input class="form-check-input" type="checkbox" value="{{$tag->id}}" name="tag[]">
					<span class="form-check-label">
						{{$tag->name}}
					</span>
					<span class="checkmark"></span>
					@else
					<input class="form-check-input" type="checkbox" value="{{$tag->id}}" name="tag[]">
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
	<div class="companies row">
		@foreach($companies as $company)
		<div class="companies__detail">

			@if(!$company->users->profile_picture == null)
			<img src="../profileImages/{{$company->users->profile_picture}}" alt='logo'>
			@endif
			<br>
			<div class="name">
				<a href="/companies/{{$company->id}}">{{ $company-> name}}</a>
			</div>
			<p>{{Str::limit( $company-> bio, $limit = 120, $end = ' ...')}}</p>
			<hr class="companies__line">
			<div class="small-info clearfix">
				<p>{{$company-> city}}</p>
			</div>
		</div>
		@endforeach
	</div>


</div>
@endsection