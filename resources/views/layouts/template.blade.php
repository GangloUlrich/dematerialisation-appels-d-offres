<!doctype html>
<html lang="fr">
  <head>

    <title>{{ env('APP_NAME', ' Plateformee') }}</title>
    <title>Système de gestion dématérialisée des appels d'offres</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="Le Systeme de Gestion Dématérialisée des appels d'offres vous permet de consulter les avis , les procès-verbaux.Retirer numériquement vos dossiers d'appels d'offres, de soumissionner et poser vos préoccupations." />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1" />
        <meta property="fb:app_id" content="205920604956872" />
        <meta property="og:url" content="https://sygdao.herokuapp.com/" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Système de gestion dématérialisée des appels d'offres" data-dynamic="true" />
        <meta property="og:description" content="Le Systeme de Gestion Dématérialisée des appels d'offres vous permet de consulter les avis , les procès-verbaux.Retirer numériquement vos dossiers d'appels d'offres, de soumissionner et poser vos préoccupations." data-dynamic="true" />
        <meta property="og:image" content="https://www.gouv.bj/public/images/armoiries.png" data-dynamic="true" />
        <meta property="og:image:width" content="256" data-dynamic="true">
        <meta property="og:image:height" content="256" data-dynamic="true">
        <meta property="og:locale" content="fr_FR" />
        <meta property="og:site_name" content="Système de gestion dématérialisée des appels d'offres" />
        <meta property="twitter:url" content="https://sygdao.herokuapp.com/" />
        <meta property="twitter:card" content="summary" />
        <meta property="twitter:title" content="Système de gestion dématérialisée des appels d'offres" />
        <meta property="twitter:description" content="Le Systeme de Gestion Dématérialisée des appels d'offres vous permet de consulter les avis , les procès-verbaux.Retirer numériquement vos dossiers d'appels d'offres, de soumissionner et poser vos préoccupations." />
        <meta property="twitter:image" content="https://www.gouv.bj/public/images/armoiries.png" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" >
    <script src="https://kit.fontawesome.com/f38871cf83.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- font-awesome CSS -->
     <link href="{{ asset('fontawesome/all.css') }}" rel="stylesheet" >
    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/style.css')}}">



  </head>
  <body>



    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-white text-size-xs ">
        <div class="container-fluid">

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="javascript:void(0)"><img src="{{ asset('img/logo.png') }}" class="img-brand" alt=""></a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mx-auto p-2 text-uppercase">

              <li class="nav-item me-0 me-xxl-3">
                <a class="nav-link  active text-dark fw-400" aria-current="page" href="{{ route('accueil')}}">Accueil</a>
              </li>
              <li class="nav-item me-0 me-xxl-3">
                <a class="nav-link  text-dark fw-400" href="{{ route('avis')}}">Avis d'appel d'offres</a>
              </li>
              <li class="nav-item dropdown me-0 me-xxl-3">
                <a class="nav-link fw-400 dropdown-toggle text-dark" href="{{ route('proces') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Procès-verbaux
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item text-size-small" href="{{ route('proces_ouverture') }}">Procès verbal d'ouverture </a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item text-size-small" href="{{ route('proces_attProvisoire') }}">Procès-verbal d'attribution provisoire</a></li>

                  <li><a class="dropdown-item text-size-small" href="{{ route('proces_attDefinitive')}}">Procès-verbal d'attribution définitive</a></li>
                </ul>
              </li>
              <li class="nav-item me-0 me-xxl-3">
                <a class="nav-link  fw-400 text-dark" href="{{ route('structures')}}">Structures</a>
              </li>

              <li class="nav-item me-0 me-xxl-3">
                <a class="nav-link fw-400 text-dark" href="">FAQ</a>
              </li>


            </ul>
            <ul class="nav nav-navbar">
              @guest
                <li class="nav-item me-3 ">
                    <a class="nav-link  rounded-pill btn bg-success text-white fw-400" href="{{ route('login') }}">CONNEXION</a>
                  </li>

                  <li class="nav-item me-2">
                    <a class="nav-link  rounded-pill  btn btn-outline-secondary border border-secondary fw-400" href="{{ route('register') }}">INSCRIPTION</a>
                  </li>


                  

              @else

              <li class="nav-item me-3 ">
                    <a class="nav-link  rounded-pill btn bg-success text-white fw-400" href="{{ route('dashboard') }}">Tableau de bord </a>
                  </li>

              @endguest
            </ul>



          </div>
        </div>
      </nav>


     @yield('content')


     <div class="container-fluid">
         <div class="row">
             <div class="col-4 p-1 bg-success"></div>
             <div class="col-4 p-1 bg-warning"></div>
             <div class="col-4 p-1 bg-danger"></div>
         </div>
     </div>
     <div class="container-fluid bg-footer mb-0">

        <div class="container d-flex justify-content-evenly p-4 border-bottom  border-light">
            <div class="col-4 p-2 text-start">
                <img src="{{ asset('img/logo.png') }}" class="img-brand2" alt="">
                <p class="text-light h5 ">&copy;eMARCHESPUBLICS&PRIVES</p>
            </div>
            <div class="col-4 p-2 text-center">
                <p class="text-white text-uppercase fw-bold">Services</p>
                <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link text-light text-size-xs" aria-current="page" href="javascript:void(0)">Portail des marchés publics</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-light text-size-xs" href="javascript:void(0)">Portail de l'administration publique</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-light text-size-xs" href="javascript:void(0)">Bénin Doing Business</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light text-size-xs" href="javascript:void(0)">Jurisprudence Bénin</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-light text-size-xs" href="javascript:void(0)">Tribunal du commerce</a>
                      </li>

                  </ul>
            </div>
            <div class="col-4 p-2 text-center">


                <p class="text-white text-uppercase fw-bold ">Ministères</p>

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-light text-size-xs" href="javascript:void(0)">Ministere des petites et moyennes entreprises et de la promotion de l'emploi </a>
                      </li>
                    <li class="nav-item">
                      <a class="nav-link text-light text-size-xs" aria-current="page" href="javascript:void(0)">Ministère de l'Economie et des Finances </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-light text-size-xs" href="javascript:void(0)">Ministere de la Justice et de la Législation</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-light text-size-xs" href="javascript:void(0)">Ministere du numérique et et de la digitalisation </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light text-size-xs" href="javascript:void(0)">Ministère de l'industrie et du commerce </a>
                      </li>




                  </ul>
            </div>
        </div>
         <div class="row  text-center p-2 text-light">
             <small>&copy;Copyright 2021 e Marches publics et privés | Tous droits reservés.</small>
         </div>
     </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.slider').slick({
   infinite: false,
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  dots: true,
  prevArrow:"<img class='slick-prev control-c' src='https://image.flaticon.com/icons/png/512/142/142049.png'>",
  nextArrow:"<img class=' control-c slick-next' src='https://image.flaticon.com/icons/png/512/120/120889.png'>",
});

    </script>
  </body>
</html>
