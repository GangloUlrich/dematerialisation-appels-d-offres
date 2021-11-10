@extends('layouts.template')
@section('content')

<div class="container-fluid p-0 position-relative barnner-div">
  <img src="{{ asset('img/classeur.jpg')}}" alt="" class="banner-img">
</div>
<div class="container title-content px-5">
    <div class="ps-3">
            <div class="text-size-xl fw-400 text-white fm-semibold">{{ $marche->user()->first()->name }}</div>
    </div>
</div>

<!-- body-style/ -->
<div class="body-style">

<section class="container mb-3 ">
@if (session()->has('message'))

  <div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
  {{ session()->get('message') }}
  </div>
</div>
@endif
    <div class="">
    <div class="fm-regular text-size-md mb-2">{{ $marche->intitule }}</div>
        <div class="d-flex justify-content-between">
        <div class="fm-regular mb-2">Reference: <strong class="fw-bolder">{{ $marche->reference }}</strong></div>
        @foreach($mores as $more)
      
        </div>

        @if($more->type_document == 'aao')
        <div class="row mb-2">
            <div class="col-5">
                <div class="fw-bolder fm-regular mb-2">Date limite de depôt</div>
                <div>{{ $more->date_limite }}</div>
            </div>
            <div class="col-5">
            <div class="fw-bolder fm-regular mb-2">Date d'ouverture des offres</div>
                <div>{{ $more->date_ouverture }}</div>
            </div>
        </div>
        @endif

        @endforeach

        <div class="d-flex mb-5">
            <div class="me-3">
                <a href="{{ route('accueil')}}"><button class="btn btn-sm btn-secondary">Retour à l'accueil</button></a>
            </div>
        @foreach($mores as $more)
        
            @if($more->type_document == 'aao')
            <div class="me-3">
            <a href="{{ route('display_avis',['avis'=>$more->id]) }} " target="_blank"> <button class="btn btn-sm btn-outline-success"> <i class="fas fa-eye"></i> Visionner</button></a>   
            </div>
            <div class="me-3">
            <a href="{{ route('download_avis',['avis'=>$more->id]) }}" target="_blank" ><button class="btn btn-sm btn-outline-success"> <i class="fas fa-download"></i> Telecharger</button></a>
            </div>
            @endif
            @if($more->type_document == 'dao')
            <div class="me-3">
            <a href="{{ route('download_dao',['dao'=>$more->id,'user'=>Auth::user()->id]) }}" target="_blank"><button class="btn btn-sm btn-danger"> <i class="fas fa-link"></i> Retirer le DAO</button></a>
            </div>
            @endif
            @endforeach
        </div>
        

        
        


    </div>


</section>


<!-- end body style -->
</div>
@endsection
