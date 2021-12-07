@extends('layouts.template')
@section('titre' ,"Avis d'appel d'offres")
@section('content')
<div class="container-fluid p-0 position-relative barnner-div">
  <img src="{{ asset('img/classeur.jpg')}}" alt="" class="banner-img">
</div>
<div class="container title-content px-5">
    <div class="ps-3">
            <div class="text-size-xl fw-400 text-white fm-medium">Avis d'appel d'offres</div>
    </div>
</div>
<!-- <div class="container-fluid  px-3 d-flex justify-content-center bg-success text-center align-items-center pt-5">
    <h1 class="text-size-sm">AVIS D'APPEL D'OFFRES</h1>
    {{-- <div class="draw-art rounded-pill"></div> --}}
</div> -->



    <div class="container p-3 py-2">

        <form action="">

            <div class="input-group">
                <input type="search" class="form-control" placeholder="Entrer le mot-clé ici" aria-label="votre " aria-describedby="button-addon2">
                <button class="btn btn-secondary" type="button" id="button-addon2">Rechercher</button>

              </div>
              <div id="emailHelp" class="form-text text-center fst-italic">EX: ASSI pour Agence Nationale pour la Sécurité des Systèmes d'Information</div>

        </form>


    </div>

    <div class="container p-3  d-flex flex-lg-row flex-column px-5 ">
        <div class="col-lg-3 col-sm-12  d-flex flex-column mb-md-3">
            <button class="rounded-0 btn bg-success text-white">FILTRES AVANCES</button>

            <form action="" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Periode de </label>
                <input type="date" class="form-control" id="">

            </div>

            <div class="mb-3">
                <label for="" class="form-label">Au</label>
                <input type="date" class="form-control" id="">


            </div>

            <button class="rounded-0 btn bg-success text-white  w-100" type="submit">RECHERCHER</button>
            </form>

        </div>
        <div class="col-lg-9 col-md-12 ms-lg-5">
            <div class="row row-cols-1 g-4 ">
                @isset($documents)
                    @foreach ($documents as $document)
                    <div class="col">
                        <div class="card">
                          <div class="card-header bg-secondary text-white">
                              <p>{{ $document->marche()->first()->user()->first()->name }}</p>
                          </div>
                          <div class="card-body w-75 pb-0">


                              <p class="card-title fs-6">{{ $document->marche()->first()->intitule }}</p>


                              <div class="row mb-custom1">
                                  <p class="fw-bolder">Reference: {{ $document->reference }}</p>

                                  <div class=" col-6">
                                      <p class="fw-bolder">Date limite de depôt</p>
                                      <small class="text-center">{{ formatdate($document->date_limite)  }}</small>
                                  </div>

                                  <div class="col-6">
                                      <p class="fw-bolder">Date d'ouverture des offres</p>
                                      <small class="text-center">{{ formatdate($document->date_ouverture) }}</small>
                                  </div>
k
                                  </div>
                                 <a href="{{ route('consulter' , ['marche_id'=> $document->marche()->first()->id])}}"><button class="btn btn-secondary btn-sm rounded-3 mb-2">details</button></a> 
                          </div>
                          <div class="  {{ compareDate($document->date_limite) == true ? 'bg-success' : 'bg-danger' }} clip w-25 py-lg-5 d-flex justify-content-end text-left">

                              <div class="d-flex flex-column px-auto my-auto me-4">

                                  <button class="btn btn-sm btn-outline-light rounded-0 mb-2"><i class="fa fa-share"></i> PARTAGER</button>
                                  <a href="{{ route('download_avis',['avis'=>$document]) }}"><button class="btn btn-sm btn-outline-light rounded-0 mb-2"><i class="fa fa-download"></i> TELECHARGER</button></a>

                                  @foreach ($daos as $dao ) @if ($dao->marche_id == $document->marche_id)  @else @endif  @endforeach


                                      <a href="@foreach ($daos as $dao ) @if ($dao->marche_id == $document->marche_id) @if(limite($dao->marche->id)) {{ route('download_dao',['dao'=>$dao]) }} @else javscript:void(0) @endif @endif  @endforeach"><button class="btn btn-sm btn-light rounded-0 mb-2"><i class="fa fa-folder-open"></i> &nbsp;RETIRER DAO</button></a>


                                  
                              </div>


                          </div>

                        </div>
                      </div>
                    @endforeach
                @endisset



            </div>
        </div>
    </div>

@endsection
