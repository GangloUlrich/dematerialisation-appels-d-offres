<!doctype html>
<html lang="fr">
  <head>
    <title>{{ env('APP_NAME', ' Plateforme') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('fontawesome/all.css') }}" rel="stylesheet" >
    <link rel="stylesheet" href="{{ asset('bootstrap/style.css')}}">
  </head>
  <body>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-7 ps-3 pt-2 ps-2 ">
        <div class="text-start d-flex flex-column mt-2">
                <a href="{{ route('accueil') }}"><img src="{{ asset('img/logo.png') }}" alt="logo de la plateforme" class="img-app"></a>
                <small class="fw-bold">e<span class="text-success">MARCHES</span><span class="text-warning">PUBLICS&</span><span class="text-danger">PRIVES</span></small>
            </div>
            <div class="mt-5">
                <div class="fw-bold fm-light text-size-md mb-1">Consulter  des avis d'appels d'offres et des procès-verbaux </div>
                <div class="fw-bold fm-light text-size-md mb-1">Soumissionner à des appels d'offres</div>
                <div class="fw-bold fm-light text-size-md mb-1">Gerer vos différents marchés</div>
            </div>
            <div class="mt-5 col-10">
                <img src="{{ asset('img/work.svg') }}" alt="docs svg icone" height="20" class="img-fluid">

            </div>
            
        </div>
        <div class=" col-md-12 col-sm-12 col-lg-5 d-flex flex-column align-items-center justify-content-center bg-success">
            <div class="text-center py-5">
            <div><i class="fas fa-building h1 text-white"></i></div>
                <div class="text-size-lg fm-light text-white">Etes-vous une structure publique ,<br> privée ou une organisation ?</div>
                <div class="text-center">
                <div class="my-2"><span class="fas fa-arrow-down h3 text-white"></span></div>
                
                <a href="{{ route('register_structure')}}" class="btn bg-white e-text-warning rounded-pill px-5"> Cliquez ici </a>
                </div>
            </div>

            <div class="text-center py-5">
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

