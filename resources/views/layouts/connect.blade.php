<!doctype html>
<html lang="fr">
  <head>

    <title>{{ env('APP_NAME', ' Plateforme') }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" >
     <!-- font-awesome CSS -->
     <link href="{{ asset('fontawesome/all.css') }}" rel="stylesheet" >
    <link rel="stylesheet" href="{{ asset('bootstrap/style.css')}}">



  </head>
  <body>
  
  <div class="container-md">
      <div class="d-flex justify-content-between align-items-center py-2">
      
        <div class="d-flex align-items-center">
         <a href="{{route('accueil')}}" class="d-block d-flex align-items-center p-0 text-secondary text-decoration-none"><img src="{{ asset('img/logo.png') }}" alt="" class="img-app">
          <div class="text-size-sm fm-regular">e<span class="text-success">MARCHES</span><span class="text-warning">PUBLICS</span>&<span class="text-danger">PRIVES</span></div> </a>
        </div>

        <div>
        <a href="{{route('login')}}" class="btn btn-sm  bg-primary text-white fm-light text-size-sm rounded-pill px-3">Connexion</a>
          <a href="{{route('accueil')}}" class="btn btn-sm  bg-secondary text-white fm-light text-size-sm rounded-pill px-3">Retour à l'accueil</a>
        </div>
      </div>
  </div>

    

    @yield('content')


    <div class="mt-3 text-center bg-light p-5">
    <small>&copy;Copyright 2021 e Marches publics et privés | Tous droits reservés.</small>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" ></script>
  </body>
</html>
