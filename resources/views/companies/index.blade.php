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
    @foreach($companies as $company)
    <div class="companies__detail" >
        <img >
<br>
        <a href ="/companies/{{$company->id}}">{{ $company-> name}}</a>
        <p>{{Str::limit( $company-> bio, $limit = 120, $end = ' ...')}}</p>
        <hr class="companies__line">
        <p>{{ $company-> city}}</p>
    </div>
    @endforeach
</div>


</div>
@endsection




