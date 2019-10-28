@extends('layouts/app')

@section('title')
    Companies
@endsection

@section('h2')
Companies
@endsection

@section('content')

<div class="container_companies">
    <div class="companies_filters">
		<div class="companies_form">
		<h5>Filters</h5>
		<hr class="companies__line">
        <div>
		<div class="panel-heading " >
						<h6 class="panel-title">
							<a data-toggle="collapse" href="#collapse0">
							 Place
							</a>
						</h6>
					</div>
					<div id="collapse0" class="panel-collapse collapse in" >
            <form method="post">
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
                  All regions
				  </span>
                </label>
                
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				   Antwerpen
				  </span>
                </label> 
                
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				  Oost-Vlaanderen
				  </span>
                </label>  
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				  West-Vlaanderen
				  </span>
                </label>  
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				 Limburg
				  </span>
                </label> 

                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				 Vlaams-Brabant
				  </span>
                </label> 
      
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				 Brussel
				  </span>
                </label> 
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				  Waals-Brabant
				  </span>
                </label> 
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				 Luik
				  </span>
                </label> 
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				 Henegouwen
				  </span>
                </label> 
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				 Namen
				  </span>
                </label>
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				Luxemburg
				  </span>
                </label>


</div>
        
<div class="panel-heading " >
						<h6 class="panel-title">
							<a data-toggle="collapse" href="#collapse1">
								Specialty
							</a>
						</h6>
					</div>
					<div id="collapse1" class="panel-collapse collapse in" >
  
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				    All
				  </span>
                </label>
                
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				   graphic design
				  </span>
                </label> 
                
				<label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				  development
				  </span>
                </label>  
                
                <label class="form-check">
				  <input class="form-check-input" type="checkbox" value="">
				  <span class="form-check-label">
				  communication
				  </span>
                </label>  
				</div>
               
                <button type="submit" class="btn btn-primary">Submit</button> 
			</form>

		</div>
		</div>
</div>
<div class="companies">
    @foreach($companies ?? '' as $company)
    <div class="companies__detail" >
        <img >
<br>
        <a href ="/companies/{{$company->id}}">{{ $company-> name}}</a>
        <p >{{ $company-> bio}}</p>
        <hr class="companies__line">
        <p>{{ $company-> city}}</p>
    </div>
    @endforeach
</div>
</div>

@endsection




