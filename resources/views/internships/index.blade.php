@extends('layouts/app')

@section('title')
Stageplaatsen
@endsection

@section('h2')
    Stageplaatsen
@endsection

@section('content')

@if ($flash = session('message'))
    <div class="alert alert-success">{{ $flash }}</div>
@endif


<div class="container_companies">
    <div class="companies_filters">
		<div class="companies_form">
			<h5>Filters</h5>
		<hr class="companies__line">

		<div class="panel-heading">
			<h6 class="panel-title">
			<a data-toggle="collapse" href="#collapse0">
				Regio
				<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
			</a>
			</h6>
		</div>

		<div id="collapse0" class="panel-collapse collapse in" >
            <form method="post">
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
                  Alle regios
				  </span>
				  <span class="checkmark"></span>
                </label>
                
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				   Antwerpen
				  </span>
				  <span class="checkmark"></span>
                </label> 
                
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				  Oost-Vlaanderen
				  </span>
				  <span class="checkmark"></span>
                </label>  
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				  West-Vlaanderen
				  </span>
				  <span class="checkmark"></span>
                </label>  
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				 Limburg
				  </span>
				  <span class="checkmark"></span>
                </label> 

                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				 Vlaams-Brabant
				  </span>
				  <span class="checkmark"></span>
                </label> 
      
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				 Brussel
				  </span>
				  <span class="checkmark"></span>
                </label> 
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				  Waals-Brabant
				  </span>
				  <span class="checkmark"></span>
                </label> 
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				 Luik
				  </span>
				  <span class="checkmark"></span>
                </label> 
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				 Henegouwen
				  </span>
				  <span class="checkmark"></span>
                </label> 
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				 Namen
				  </span>
				  <span class="checkmark"></span>
                </label>
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				Luxemburg
				  </span>
				  <span class="checkmark"></span>
                </label>
		</div>
        
			<div class="panel-heading">
				<h6 class="panel-title">
					<a data-toggle="collapse" href="#collapse1">
						Vakgebied
						<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
					</a>
				</h6>
			</div>
			<div id="collapse1" class="panel-collapse collapse in" >
  
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				    Alle vakgebieden
				  </span>
				  <span class="checkmark"></span>
                </label>
                
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				   Grafisch ontwerp
				  </span>
				  <span class="checkmark"></span>
                </label> 
                
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				  Front-end developer
				  </span>
				  <span class="checkmark"></span>
                </label>  
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				  Back-end developer
				  </span>
				  <span class="checkmark"></span>
				</label>  
				
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				  UI/UX designer
				  </span>
				  <span class="checkmark"></span>
                </label>  
				</div>
               
                <button type="submit" class="btn btn-primary">Bekijken</button> 
			</form>

		</div>

	</div>

<div class="companies">

@if (\Auth::user()->type == 'student')
        @foreach($internships as $internship)
            <div class="companies__detail" >
                <h3>{{ $internship->internship_function }}</h3>
                <p>{{ $internship->internship_discription }}</p>
                <hr class="companies__line">
                <p>{{ $internship->available_spots }} beschikbaar</p>
				<a href="/internships/{{ $internship->id }}" class="btn btn-secondary">Bekijk vacature</a>
                
            </div>
        @endforeach
    
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
</div>
    

@endsection