@extends('layouts.template')
@section('content')

<div class="container-fluid p-0 position-relative barnner-div">
  <img src="{{ asset('img/memo.jpg')}}" alt="" class="banner-img">
  <div class="container banner-content px-5">
    <div class="ps-3 text-center">
            <small class="text-size-xl text-white fw-600">Plateforme de dématérialisation des dossiers d'appel d'offres </small>
    </div>
</div>

</div>

<div class="container banner-stats d-flex justify-content-center fm-regular">

<div class="col-12 text-center">
<div class="row text-center px-6">
        <div class="col px-2  ">
          <div class="bg-success py-3 text-white fm-medium">
          Avis d'appels d'offres <strong class="fm-bold" >8</strong>
          </div>
        </div>

        <div class="col px-2  ">
          <div class="bg-warning py-3 text-white fm-medium">
          Procès verbaux types <strong class="fm-bold text-size-MD" >8</strong>
          </div>
        </div>

        <div class="col px-2  ">
          <div class="bg-danger py-3 text-white fm-medium">
          Dossiers d'appels d'offres <strong class="fm-bold" >8</strong>
          </div>
        </div>

      </div>
      </div>
</div>

</div>


<section class="container mb-5">
    <div class="d-flex justify-content-between p-1 px-3 align-items-center">
        <p class="text-size-xxl text-secondary fw-600 text-uppercase">Avis d'appel d'offres</p>
        <a href="{{ route('avis') }}" class="btn rounded-0 btn-outline-success">Voir tout</a>
    </div>

    <div class="row row-cols-1 row-cols-md-1 px-3 slick-carousel">
        <div class="slider ">
        @isset($documents)

@foreach ( $documents as $document)
                <div class="col-3 me-3 me-lg-3 me-md-3 me-xl-3">
                    <div class="card position-relative card-hp">
                        <div class="card-border-div"></div>
                        <div class="card-header card-hp-header bg-gray-dark  d-flex align-items-end p-4 ps-2 pb-3">
                            <div class="text-white text-size-sm">{{ $document->marche()->first()->user()->first()->name }}</div>
                        </div>
                        <div class="card-body card-hp-body ">
                            <button class="btn btn-warning btn-card rounded-0 py-1">En cours</button>
                            <div class="text-size-xs mb-3 pt-1 text-start card-hp-content">{{ $document->marche()->first()->intitule }}</div>
                            <small><Strong>Deadline :</Strong> &nbsp;{{ $document->date_limite}}</small>
                            <div class="mt-2">
                              <a href="{{ route('consulter',['marche_id'=> $document->marche()->first()->id])}}">  <button class="btn btn-outline-secondary rounded-0">Consulter</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
    @endisset


        </div>
    </div>

</section>


<!-- <section class="container px-5 mt-2">
<div class="container-fluid px-4">
<div class="row">
  <div class="col-6 bg-secondary d-flex flex-column justify-content-center align-items-center text-white p-5">
      <h4 class="fm-bold">LOIS ET DECRETS</h4>
      <div class="mt-3">
      <button class="btn rounded-0 bg-white text-dark fm-semibold">CONSULTER</button>
      </div>
  </div>
  <div class="col-6 container-fluid bg-light img-law">
    <img src="{{ asset('img/law.jpg')}}" alt="loi" class="img-fluid">
  </div>
</div>
</div>

</section> -->
@endsection
