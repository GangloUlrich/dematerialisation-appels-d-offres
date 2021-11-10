@extends('layouts.administration')

@push('stylesheets')

{{-- summernote --}}
<link rel="stylesheet" href="{{asset('summernote/summernote-bs4.css')}}">
{{-- select2 --}}
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">

<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

@endpush


@section('header')
    {{-- header de la section --}}
    <div class="content-header px-4 ">
        <div class="container-fluid ">

            <div class="*row  mb-2">
                <a href="{{ route('dashboard') }}"><button class="btn btn-secondary text-size-xs"><i class="fa fa-backward"
                            aria-hidden="true"></i> Retour</button></a>

            </div>

            <div class="container-fluid bg-white p-3 rounded mb-3">



                <div class="row d-flex justify-content-around align-items-center">

                    <div class="col-sm-9">
                        <small class="fm-regular text-size-md">Confirmation de la reception de l'offre (  Etape 4 ) </small>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                        class="text-warning">Dashboard</a></li>
                                <li class="breadcrumb-item">Marchés</li>
                                <li class="breadcrumb-item active" aria-current="page">soumission</li>
                            </ol>
                        </nav>

                    </div>

                    <div class="col-sm-3 d-flex justify-content-end ">
                        <a href="{{ route('liste_marche') }}"><button class="btn btn-primary text-size-xs"><i class="fa fa-bars"></i>
                                Tous les marchés</button></a>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection


@section('content')


@if (session()->has('message'))


                    <div class="alert alert-success alert-dismissible fade show " role="alert">
                        {{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>


@endif


<div class="container-fluid px-4">
<div class="container-fluid p-lg-4 bg-white rounded">
    <div class=" col-sm-12">

    <div class="text-size-sm fm-regular fw-bold text-dark   ">Intitule du marché</div>
    <div class="text-size-xs text-justify fm-regular fw-bold mb-2">{{ $details->marche()->first()->intitule }}</div>  

    <div class="text-size-sm fm-regular fw-bold text-dark ">Autorité contractante</div>
    <div class="text-size-xs text-justify fm-regular fw-bold mb-2">{{ $details->marche()->first()->user()->first()->name }}</div>  

     
    <div class="text-danger text-size-sm mb-2">Votre offre a été bien enregistrée </div>

    <div class="text-size-sm fm-regular fw-bold text-dark  ">Date ouverture des offres </div>
    <div class="text-size-xs text-justify fm-regular fw-bold mb-2">{{ $details->date_ouverture }}</div> 

    <div class="text-size-sm fm-regular fw-bold text-dark  ">Lien de la reunion d'ouverture </div>
    <div class="text-size-xs text-justify fm-regular fw-bold mb-2">{!! $details->meet_link !!}</div> 

    <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm fm-regular ">Dashboard</a>
    
</div>
</div>


@endsection
