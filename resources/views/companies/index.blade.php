@extends('layouts/app')

@section('title')
    Bedrijven
@endsection

@section('h2')
Bedrijven
@endsection

@section('content')

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
					<div id="collapse0" class="panel-collapse collapse in" >
            <form method="post">
				<label class="form-check">
				  <input class="form-check-input styled-checkbox" type="checkbox" value="">
				  <span class="form-check-label">
				  Alle regios</span>
				  <span class="checkmark"></span></label>
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
        
<div class="panel-heading " >
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
				  Development
				  </span>
				  <span class="checkmark"></span>
                </label>  
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				  Communicatie
				  </span>  
				  <span class="checkmark"></span>
                </label>  
				</div>
               
                <button type="submit" class="btn ">Bekijken</button> 
			</form>

		</div>
		</div>
		
<div class="companies">
    @foreach($companies ?? '' as $company)
    <div class="companies__detail" >
        <img >
<br>
        <a href ="/companies/{{$company->id}}">{{ $company-> name}}</a>
        <p>{{Str::limit( $company-> bio, $limit = 200, $end = ' ...')}}</p>
        <hr class="companies__line">
        <p>{{ $company-> city}}</p>
    </div>
    @endforeach
</div>
</div>

@endsection




