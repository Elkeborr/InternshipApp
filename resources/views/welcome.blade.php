    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Sprintern - Welcome</title>
            
            <!-- Styles -->
            <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
            
        </head>
        <body>
<!--- Navigatie --->
            <nav class="navbar navbar-expand-md navbar-light sticky-top">
                <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand ">
                            <img src="{{ asset('img/logo.png') }}" alt="Logo" height="30">
                    </a>
                </div>
                <div class="nav navbar-nav mt-2 mt-md-0" id="collapsibleNavbar">
                <li class="nav-item cta mr-md-2"><a class="nav-link active nav-item " >About</a></li>
                    <li class="nav-item mr-md-2"> <a class="nav-item  nav-link" >Services</a></li>
                    <li class="nav-item mr-md-2 "id="student"><a href="" class="nav-link">Student</a></li>
                    <li class="nav-item mr-md-2" id="company"><a href="" class="nav-link">Bedrijf</a></li>
                </div>
                </div>
    </nav>

    <!---Top--->
    <div class="hero">
                <div class="top">
                    <h1>Your next
                    <span>intern/intership </span>
                            is here</h1>
                    <p>Looking for an intern or an internship then signup on sprintern.<span> New opportunities everyday!</span></p>
                    <p class="top_question">Are you a company or a student?</p>
                    <div class="links">
                        <a href="{{ url('/companies/login') }}" class="company">Company</a>
                        <a href="{{ url('/redirect') }}" class="student">Student</a>
                    </div>      
                </div>
    </div>
    <div class="container">

    <!---Internships--->
    <div class="internships"> 
    <h2>Nieuwste Stageplaatsen</h2>
    <form action="#" method="post" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="text" class="form-control search-slt" placeholder="Vakgebied">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="text" class="form-control search-slt" placeholder="Plaats">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <button type="button" class="btn btn-danger wrn-btn">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    <div class="internships_count">
    @foreach($internships as $internship)
            <div class="internships__detail" >
                <div class="internships_detail-padding">
                <a>{{ $internship->internship_function }}</a>
                <p>{{ $internship->internship_discription }}</p>
                <hr class="internships__line">
                <p>{{ $internship->available_spots }} available</p>
                </div>
                <button>details & solliciteer </button>
</div>
        @endforeach
        </div>
        <button>Meer</button>
</div>
    <!---About--->
    </div>

<div class="balk">
    <div></div>
    <div class="title"><h2>About <br> Sprintern<hr class="title_hr"></h2>
</div>


</div>

    <div class="about">

        <div class="image"> </div>
        <div class="about_text"> 
        <p>Searching for an intern or internship doesn’t have to be hard. With the sprintern app it’s peanuts! Just fill in your personal skills and contact info for a fast result.
Or you could just wait untill all the cool internships are taken. It’s up to you! </p>
                    </div>   
 </div>
   <div class="container">
    <!---Services--->

    <div class="services">
                    <h2>Services<hr class="title_hr-services"></h2>
                    <div class="services_content">
                        <div class="service_1"> 
                            <h3>For Companies</h3>
                            <p>Companies can search for students who apply for their internships. ...</p>
                        </div>
                        <div class="service_2">
                            <h3>For Students</h3>
                            <p>Companies can search for students who apply for their internships. ...</p>
                        </div>
                    </div>           
    </div>
    <footer>
        <p>&copy; 2019 Sprintern<p>
    </footer>
    </div>
    </div>
        </body>
    </html>
