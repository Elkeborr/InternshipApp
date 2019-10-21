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

            <div class="hero">
            <!--- Navigatie --->
            <nav class="navbar navbar-expand-md navbar-light">
                <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand ">
                            <img src="{{ asset('img/logo.png') }}" alt="Logo" height="30">
                    </a>
                </div>
                <div class="nav navbar-nav navbar-righ" id="collapsibleNavbar">
                    <a class="nav-link active nav-item " >About</a>
                    <a class="nav-item  nav-link" >Services</a>
                </div>
                </div>
    </nav>

    <!---Top--->

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
    <!---About--->

    <div class="about">
        <div></div>
        <div> <h2>About us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus elit sem, molestie id rhoncus sit amet, accumsan facilisis lacus. Nulla vitae lacus interdum, consequat enim eget, euismod sapien. In lectus nisi, accumsan at dolor nec, elementum interdum dolor. Nulla vestibulum odio ipsum, vel vestibulum sem ultricies ut. </p>
                    </div>   
    </div>

    <!---Services--->

    <div class="services">
                    <h2>Services</h2>
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
        </body>
    </html>
