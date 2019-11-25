    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Sprintern - Welkom</title>
             <!-- Scripts -->
            <script src="{{ asset('js/app.js') }}" defer></script>
          
            <!-- Styles -->
            <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

        </head>
        <body>
<!--- Navigatie --->
            <nav class="navbar navbar-expand-md sticky-top navbar-light">
                <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand ">
                            <img src="{{ asset('img/logo.png') }}" alt="Logo" height="30">
                    </a>
                </div>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item cta mr-md-2"><a class="nav-link" href="#about" >Over</a></li>
                    <li class="nav-item mr-md-2"> <a class="nav-link"  href="#services">Diensten</a></li>
                    <li class="nav-item mr-md-2 "id="student"><a href="{{ url('/redirect') }}" class="nav-link">Student</a></li>
                    <li class="nav-item mr-md-2" id="company"><a href="{{ url('/companies/login') }}" class="nav-link">Bedrijf</a></li>
                </div>
</div>
                </div>
    </nav>

    <!---Top--->
    <section class="hero">
                <div class="top">
                    <h1>Jouw nieuwe
                    <span>stagiair(e)/stage </span>
                            is hier</h1>
                    <p>Opzoek naar een stagiair(e) of een stage, meld je dan nu aan.<span> Nieuwe mogelijkheden elke dag!</span></p>
                    <p class="top_question">Ben je een bedrijf of een student?</p>
                    <div class="links">
                        <a href="{{ url('/companies/login') }}" class="company">Bedrijf</a>
                        <a href="{{ url('/students/login') }}" class="student">Student</a>
                        <!--<a href="{{ url('/redirect') }}" class="student">Student</a>-->
                    </div>      
                </div>
    </section>

 
    <!---Internships--->
    <section class="internships" id="myContainer"> 
    <h2>Nieuwste Stageplaatsen</h2>
    <form action="#" method="post" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row dropdowns">
                        <div class="dropdown dcol-lg-3 col-md-3 col-sm-12">
                            <button class="btn dropdown-toggle btn-block" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Vakgebied
                            
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            @foreach($tags as $tag)
                                <button class="dropdown-item" type="button">{{ $tag->name }}</button>
                            @endforeach
                            </div>
                        </div>
               
                        <div class="dropdown col-lg-3 col-md-3 col-sm-12">
                            <button class="btn dropdown-toggle btn-block" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Regio
                    
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <button class="dropdown-item" type="button">Steden of provincies :)</button>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <button type="button" class="btn details-button">Zoek</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="devider">
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
                <button class="myBtn">details & solliciteer</button>
            </div>
        @endforeach
    </div>
       <!-- <button class="more-button" >Meer</button>-->

    <div id="myModal" class="Modal is-hidden is-visuallyHidden">
  <!-- Modal content -->
  <div class="Modal-content">
    <span id="closeModal" class="Close">&times;</span>
    <p>Je moet ingelogd zijn om verder te kunnen. <span>Signup of login voor meer!</span></p>
    <div class="link">
        <a href="{{ url('/redirect') }}" class="student">Student</a>
    </div>
  </div>
</div>

</section>
    <!---About--->
<section class="about" id="about">
    <div class="balk">
        <div></div>
        <div class="title"><h2>Over <br> Sprintern<hr class="title_hr"></h2></div>
    </div> 
    <div class="about-content">
        <img class="img-fluid" src="../img/about.jpeg"> 
        <div class="about_text"> 
        <p>Het vinden van een stagiair(e) of een stageplaats hoeft niet moeilijk te zijn! Met de sprintern app is het peanuts! 
        Vul je gegevens in voor een direct resulaat. Of wil je liever blijven wachten tot alle coole stageplaatsen bezet zijn? 
        <br>De keuze is aan jou!</p>
        </div>   
    </div>
</section>
   
    <!---Services--->
<section class="services" id="services">
    <h2>Diensten<hr class="title_hr-services"></h2>
    <div class="services_content">
        <div class="service_1"> 
            <h3>Voor bedrijven</h3>
            <p>Bedrijven vinden bij ons stagiair(e)s terug om hun stageplaatsen in te vullen.</p>
        </div>
        <div class="service_2">
            <h3>Voor studenten</h3>
            <p>Studenten kunnen veilig en snel soliciteren voor stages. Al hun gegevens zullen al beschikbaar zijn en dat maakt het eveneens makkelijk. 
                Geen moeilijke mails meer sturen, een paar klikken en je solicitatie is verzonden.
            </p>
        </div>
    </div>           
</section>

    <footer>
        <p>&copy; 2019 Sprintern<p>
    </footer>
        </body>
        <script>

// Get the modal
var modal = document.getElementById('myModal');

// Get the main container and the body
var body = document.getElementsByTagName('body');

// Get the open button
var btnOpen = document.querySelector(".myBtn");

// Get the close button
var btnClose = document.getElementById("closeModal");

// Open the modal
btnOpen.onclick = function() {
    modal.className = "Modal is-visuallyHidden";
    setTimeout(function() {
      body.className = "MainContainer is-blurred";
      modal.className = "Modal";
    }, 100);
    body.className = "ModalOpen";
}

// Close the modal
btnClose.onclick = function() {
    modal.className = "Modal is-hidden is-visuallyHidden";
    body.className = "";
    body.className = "MainContainer";

}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.className = "Modal is-hidden";
        body.className = "";
        body.className = "MainContainer";
    }
}
            </script>
    </html>

