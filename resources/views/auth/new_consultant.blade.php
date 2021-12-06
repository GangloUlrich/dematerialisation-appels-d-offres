@extends('layouts.connect')
@section('content')
<div class="py-5 bg-success">
        <div class="container-md fm-regular py-3 text-size-xl text-white">FORMULAIRE D'ENREGISTREMENT  D'UN CONSULTANT INDIVIDUEL</div>
    </div>
<div class="container-md">
      <div class="py-2 d-flex justify-content-center fm-light text-secondary">Etes-vous une structure publique ou privée ? <a href="{{route('register_structure')}}" class="text-size-xs text-danger">Cliquez ici</a></div>


      <form action="{{ route('register')}}" method="post">

        @csrf

        <input type="hidden" name="res" value=1>

        <div class="row mb-3">
          <div class="col-12">
                  <label for="name" class="form-label text-size-sm fm-light fw-200 ">Nom et prenoms <span class="text-danger">(*)</span></label>
                  <input type="text" name="name" id="name" class="form-control fm-light text-size-xs py-2  @error('name') is-invalid @enderror" value="{{ old('name')}}" placeholder="Ex: John DOE">
                  @error('name') <small class="text-danger">{{ $message }}</small>@enderror

          </div>
        </div>

        <div class="row mb-3">
         

          <div class="col-md-6 col-sm-12">
          <label for="email" class="form-label text-size-sm fm-light fw-200 ">Email <span class="text-danger">(*)</span></label>
            <input type="email" name="email" id="email" class="form-control fm-light text-size-xs py-2  @error('email') is-invalid @enderror" value="{{ old('email')}}" placeholder="Ex: nomprenom@domaine.com">
            @error('email') <small class="text-danger">{{ $message }}</small>@enderror
          </div>

          <div class="col-md-6 col-sm-12">
            <label for="tel" class="form-label text-size-sm fm-light fw-200 ">Numero de telephone <span class="text-danger">(*)</span></label>
            <input type="text" name="tel" id="tel" class="form-control fm-light text-size-xs py-2  @error('tel') is-invalid @enderror" value="{{ old('tel')}}" placeholder="Ex: 61 25 15 24">
            @error('tel') <small class="text-danger">{{ $message }}</small>@enderror
          </div>
        </div>


        <div class="row mb-3">
         

          <div class="col-md-6 col-sm-12">
              <label for="logo" class="form-label fm-light text-size-sm fw-200">Photo du consultant</label>
              <input type="file" name="logo" id="logo" class="form-control fm-light text-size-xs  ">
              <div class="form-text">Taille maximum du fichier 2Mo.</div>
          </div>

          <div class="col-md-6 col-sm-12">
                <label for="ifu" class="form-label fm-light text-size-sm fw-200 ">Numero d'identification fiscale<span class="text-danger">(*)</span></label>
                <input type="number" name="ifu" id="ifu" class="form-control fm-light text-size-xs   py-2" placeholder="Ex: 1896532415687">
        
          </div>
        </div>
        
        
        <div class="row mb-3">
          <div class="col-md-6 col-sm-12">
                  <label for="password" class="form-label text-size-sm fm-light fw-200 ">Mot de passe <span class="text-danger">(*)</span></label>
                  <input type="password" name="password" id="password" class="form-control fm-light text-size-xs py-2  @error('password') is-invalid @enderror" value="{{ old('password')}}" placeholder="Ex: XXXXXXXXXX">
                  @error('password') <small class="text-danger">{{ $message }}</small>@enderror
                </div>

          <div class="col-md-6 col-sm-12">
            <label for="pass" class="form-label text-size-sm fm-light fw-200 ">Confirmer le mot de passe <span class="text-danger">(*)</span></label>
            <input type="password" name="password_confirmation" id="pass" class="form-control fm-light text-size-xs py-2  @error('confirmation') is-invalid @enderror" value="{{ old('password_confirmation')}}" placeholder="Ex: XXXXXXXXX">
            @error('password_confirmation') <small class="text-danger">{{ $message }}</small>@enderror

          </div>
        </div>

       

        <div class="row mb-3">
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input @error('conditions') is-invalid @enderror" type="checkbox" id="flexCheckDefault" name="conditions">
              <label class="form-check-label fm-light" for="flexCheckDefault">
                <a href="#" class="text-success">J'accepte les conditions d'utilisation</a>
              </label>
            </div>
            @error('conditions') <small class="text-danger">{{ $message }}</small>@enderror
          </div>
          
        </div>

        <div class="text-center row mb-3 d-flex justify-content-center">


    <div class="form-group d-flex justify-content-center">

        {!! NoCaptcha::renderJs() !!}
        {!! NoCaptcha::display() !!}
        @error('g-recaptcha-response')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
    </div>


</div>

      


<div class="text-center">
<button class="btn bg-success text-white px-4 text-size-sm fm-regular rounded-pill" type="submit">S'inscrire</button>

</div>
        
      </form>
</div>
    
@endsection