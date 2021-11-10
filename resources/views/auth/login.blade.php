@extends('layouts.app')


@section('add-button')

<li class="nav-item me-3 ">
    <a class="nav-link fw-1 btn btn-secondary text-white" href="{{ route('register') }}">INSCRIPTION</a>
  </li>

@endsection


@section('content')
<div class="container mt-lg-5  ">

    <div class="card  border-1 rounded-0 shadow-sm  ">

      <div class="card-body py-lg-4 p-3">
        <h1 class="text-center fw-bold">Connexion</h1>
        <small class= " d-block text-center">Veuillez entrer vos informations d'identification</small>

        <form action="" method="post" class="mt-3">

          @csrf



            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email')}}">
              @error('email') <small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Mot de passe</label>
              <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password')}}">
              @error('password') <small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="mb-3 d-flex justify-content-end">
                    <a href="" class="text-success">Mot de passe oublié ?</a>
            </div>


            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled">
                <label class="form-check-label" for="flexCheckDisabled">
                 Se rappeler de moi
                </label>
              </div>



             <button class="btn btn-success w-100">Se connecter</button>
        </form>

        <div class="text-center mt-3">
          <div class="fm-regular text-size-xs">Etes-vous nouveau ? <a href="{{ route('register')}}" class="text-success">Creer un compte</a> </div>
        </div>
      </div>
    </div>

  </div>

<script>
     var onloadCallback = function() {
        grecaptcha.hl(document.getElementById('google'), {
          'french' : 'fr'
        });
      };
</script>
@endsection
