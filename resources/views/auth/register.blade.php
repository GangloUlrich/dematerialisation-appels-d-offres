<!doctype html>
<html lang="fr">
  <head>
    <title>{{ env('APP_NAME', ' Plateforme') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('fontawesome/all.css') }}" rel="stylesheet" >
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

            .img-app{
                width: calc(30px + 2vw);
            }


    </style>
  </head>
  <body>

    <div class="container-fluid  ">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-7 ps-3 pt-2 ps-2 ">
        <div class="text-start d-flex align-items-center mt-2">
                <a href="{{ route('accueil') }}"><img src="{{ asset('img/logo.png') }}" alt="logo de la plateforme" class="img-app"></a>
                <small class="fw-bold">SYGDAO</small>
            </div>
            <div class="mt-5">
                <div class="fw-bold fm-light text-size-md mb-1">Consulter  des avis d'appels d'offres et des procès-verbaux </div>
                <div class="fw-bold fm-light text-size-md mb-1">Soumissionner à des appels d'offres</div>
                <div class="fw-bold fm-light text-size-md mb-1">Gerer vos différents marchés</div>
            </div>
            <div class="mt-5 col-10">
                <img src="{{ asset('img/work.svg') }}" alt="docs svg icone"  class="img-fluid">

            </div>
            
        </div>
        <div class=" col-md-12 col-sm-12 col-lg-5 d-flex flex-column align-items-center justify-content-center bg-success">
            <div class="text-center py-3">
            <div><i class="fas fa-building h1 text-white"></i></div>
                <div class="text-size-lg fm-light text-white">Etes-vous une structure publique ,<br> privée ou une organisation ?</div>
                <div class="text-center">
                <div class="my-2"><span class="fas fa-arrow-down h3 text-white"></span></div>
                
                <a href="{{ route('register_structure')}}" class="btn bg-white e-text-warning rounded-pill px-5"> Cliquez ici </a>
                </div>
            </div>

            <div class="text-center py-3">
                <div><i class="fas fa-user h1 text-white"></i></div>
                <div class="text-size-lg fm-light text-white"> Etes-vous un consultant individuel ?</div>
                <div class="text-center">
                <div class="my-2"><span class="fas fa-arrow-down h3 text-white"></span></div>
                
                <a href="{{ route('register_consultant')}}" class="btn bg-white e-text-warning rounded-pill px-5"> Cliquez ici </a>
                </div>
            </div>

            <div class="mt-5 text-center text-size-small text-white">&copy;2021 eMARCHESPUBLICS1PRIVES | Tous droits reservés.</div>
        </div>
        </div>
    </div>




    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" ></script>
   
  </body>
</html>

