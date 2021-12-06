<!doctype html>
<html lang="fr">
  <head>

    <title>{{ env('APP_NAME', ' Plateforme') }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" >
    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/style.css')}}">


    <style>
            .app-div{
                position: absolute;
                bottom: 0px;
                top:0px;
                overflow: hidden;
                margin: 0px;
                padding: 5rem;

            }

            .div-header{
                position:absolute;
                top:0px;
                left: 0px;
                transform: translate(50%, 50%);
            }


            .div-content{
                position:absolute;
                top: 100px;
                bottom: 0px;
                right: 50px;

            }

            h2{
                font-size:22px;
            }

            h1{
                font-size:24px;
            }

            .form-label{
                font-weight: 500 !important;
            }


            .form-control{
                background-color: rgba(187, 222,251,0.4) !important;
                border: none;
                border-radius: 0px !important;

            }

            .img-logo{
                width: calc(30px + 2vw);
            }


    </style>
  </head>
  <body>

    <div class="container-fluid app-div d-flex flex-column flex-lg-row ">
        <div class="col-lg-8 col-md-12 col-sm-12 d-flex flex-column ">

            <div class="text-start d-flex align-items-center div-header">
                <a href="{{ route('accueil') }}"><img src="{{ asset('img/logo.png') }}" alt="logo de la plateforme" class="img-logo"></a>
                <small class="fw-bold">SYGDAO</small>
            </div>

            <div class="mt-5 container">
                <h2 class="fw-bold">Consulter  des avis d'appels d'offres et des procès-verbaux </h2>
                <h2 class="fw-bold">Soumissionner à des appels d'offres</h2>
                <h2 class="fw-bold">Gerer vos différents marchés</h2>
            </div>

            <div class="mt-5 col-10">
                <img src="{{ asset('img/work.svg') }}" alt="docs svg icone" height="70" class="img-fluid">

            </div>
        </div>

        <div class=" col-lg-4 col-md-12 col-sm-12  px-4">
            @yield('content')
        </div>
    </div>




    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" ></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
    <script>
        //paste this code under head tag or in a seperate js file.
        // Wait for window load
        $(window).load(function() {
            // Animate loader off screen
            $(".loader").fadeOut("slow");;
        });
    </script>

    @stack('scripts')

  </body>
</html>

