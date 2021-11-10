@extends('layouts.connect')

@section('content')

    <div class="py-5 bg-success">
        <div class="container-md fm-regular py-3 text-size-xl text-white">FORMULAIRE D'ENREGISTREMENT  D'UNE STRUCTURE PUBLIQUE/PRIVEE</div>
    </div>

    <div class="container-md">
      <div class="py-2 d-flex justify-content-center fm-light text-secondary">Etes-vous un consultant individuel ? <a href="{{route('register_consultant')}}" class="text-size-xs text-danger">Cliquez ici</a></div>

    <form action="{{ route('register') }}" method="POST" class="border-light" enctype="multipart/form-data">

@csrf

<input type="hidden" name="res" value=2>


  <div class="col-12 ">
          <label for="name" class="form-label text-size-sm fm-light fw-200 ">Nom de la structure <span class="text-danger">(*)</span> </label>
          <input type="text" name="name" id="name" class="form-control fm-light text-size-xs   py-2  @error('name') is-invalid @enderror" placeholder="Ex: Agence de Sécurité des Systèmes d'informations (ASSI) ">
          @error('name') <small class="text-danger">{{ $message }}</small>@enderror

  </div>

  

<div class="row mb-3">


  <div class="col-md-6 col-sm-12">
    <label for="email" class="form-label fm-light fw-200 text-size-sm ">Email <span class="text-danger">(*)</span></label>
    <input type="email" name="email" id="email" class="form-control fm-light text-size-xs py-2 @error('email') is-invalid @enderror" placeholder="Ex: structure@domaine.com">
    @error('email') <small class="text-danger">{{ $message }}</small>@enderror
  </div>

  <div class="col-md-6 col-sm-12">
    <label for="tel" class="form-label fm-light fw-200 text-size-sm ">Numero de telephone <span class="text-danger">(*)</span></label>
    <input type="text" name="tel" id="tel" class="form-control fm-light text-size-xs   py-2  @error('tel') is-invalid @enderror" placeholder="Ex: 21 31 31 31 / 66 66 66 66 ">
    @error('tel') <small class="text-danger">{{ $message }}</small>@enderror
  </div>
</div>



<div class="row mb-3">
    <div class="col-6">

      <div class="mb-2 fm-light text-size-sm fw-200">Type de structure <span class="text-danger">(*)</span> </div>
      <div class="form-check mb-2">
        <input class="form-check-input @error('type') is-invalid @enderror" type="radio" name="type" id="s_public" value="s_public" >
        <label class="form-check-label fm-light text-size-xs fw-200" for="s_public">
          Structure publique /Organisations
        </label>

      </div>
      <div class="form-check">
        <input class="form-check-input @error('type') is-invalid @enderror" type="radio" name="type" id="s_privee" value="s_privee" >
        <label class="form-check-label fm-light text-size-xs fw-200" for="s_privee">
         Structure privee/ entreprises
        </label>
      </div>
      @error('type') <small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="col-6">
    <label for="logo" class="form-label fm-light text-size-sm fw-200">Logo de la structure <span class="text-danger">(*)</span></label>
    <input type="file" name="logo" id="logo" class="form-control fm-light text-size-xs  ">
    <div class="form-text">Taille maximum du fichier 2Mo.</div>
    @error('logo') <small class="text-danger">{{ $message }}</small>@enderror

   </div>

    <div class="row mt-2 d-none" id="condition">
        <div class="col-md-6 col-sm-12">
                <label for="ifu" class="form-label fm-light text-size-sm fw-200 ">Numero d'identification fiscale<span class="text-danger">(*)</span></label>
                <input type="number" name="ifu" id="ifu" class="form-control fm-light text-size-xs   py-2" placeholder="Ex: 1896532415687">
        </div>

        <div class="col-md-6 col-sm-12">
          <label for="rccm" class="form-label fm-light text-size-sm fw-200">Extrait du registre de commerce <span class="text-danger">(*)</span> </label>
          <input type="text" name="rccm" id="rccm" class="form-control fm-light text-size-xs  " placeholder="Ex: R.C.C.M COTONOU (RB / XXXXXX)">
        </div>
    </div>
</div>

<div class="row mb-3">
  <div class="col-md-6 col-sm-12">
          <label for="password" class="form-label fm-light text-size-sm fw-200">Mot de passe  <span class="text-danger">(*)</span></label>
          <input type="password" name="password" id="password" class="form-control fm-light text-size-xs   py-2 @error('password') is-invalid @enderror" placeholder="Ex: XXXXXXXX">
          <div class="form-text">Le mot de passe doit contenir au moins 8 caractères.</div>
          @error('password') <small class="text-danger">{{ $message }}</small>@enderror
        </div>

  <div class="col-md-6 col-sm-12">
    <label for="pass" class="form-label fm-light text-size-sm fw-200">Confirmer le mot de passe  <span class="text-danger">(*)</span></label>
    <input type="password" name="password_confirmation" id="pass" class="form-control fm-light text-size-xs   py-2 @error('confirmation') is-invalid @enderror" placeholder="Ex: XXXXXXXX">
  </div>
</div>

<div class="row mb-3">
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input @error('conditions') is-invalid @enderror" type="checkbox" id="flexCheckDefault" name="conditions">
      <label class="form-check-label" for="flexCheckDefault">
        <a href="#" class="text-success fm-light text-size-sm">J'accepte les conditions d'utilisation</a>
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

     


<script>
    var radio = document.getElementById('s_privee');

    radio.addEventListener('change',function(event){

        if(event.target.value=="s_privee"){
            document.getElementById('condition').classList.remove('d-none');
        }


    });

    document.getElementById('s_public').addEventListener('change',function(event){
        if(event.target.value=="s_public"){
            document.getElementById('condition').classList.add('d-none');
        }
    });
</script>

@endsection
