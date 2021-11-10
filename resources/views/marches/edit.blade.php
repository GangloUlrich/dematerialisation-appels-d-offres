@extends('layouts.administration')
@section('title', 'Modification d\'un marche')


@push('stylesheets')

<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">

<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

@endpush


@section('header')
    {{-- header de la section --}}
    <div class="content-header px-4 ">
        <div class="container-fluid ">

            <div class="*row  mb-2">
                <a href="{{ route('liste_marche') }}"><button class="btn btn-secondary"><i class="fa fa-backward"
                            aria-hidden="true"></i> retour</button></a>

            </div>

            <div class="container-fluid bg-white p-3 rounded mb-3">



                <div class="row d-flex justify-content-around align-items-center">

                    <div class="col-sm-9">
                        <small class="font-weight-bold h5">Création d'un Nouveau marché</small>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                        class="text-warning">Dashboard</a></li>
                                <li class="breadcrumb-item">Marchés</li>
                                <li class="breadcrumb-item active" aria-current="page">nouveau marché</li>
                            </ol>
                        </nav>

                    </div>

                    <div class="col-sm-3 d-flex justify-content-end ">
                        <a href="{{ route('liste_marche') }}"><button class="btn btn-primary"><i class="fa fa-bars"></i>
                                Tous les marchés</button></a>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

{{-- ./header de la section --}}


@section('content')

<div class="container-fluid px-4">
    <div class="container-fluid  bg-white p-lg-4 rounded">




        <form action="{{ route('update_marche', ['id' => $marche]) }}" method="post">

            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="row mb-3">
                <div class="col-12">
                    <label for="intitule" class="fw-bold">Intitule du marche</label>
                    <input type="text" name="intitule" id="name"
                        class="form-control  @error('intitule') is-invalid @enderror"
                        value="{{ $marche->intitule }} ">
                    @error('intitule') <small class="text-danger">{{ $message }}</small>@enderror
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-md-6 col-sm-12 form-group">
                    <label for="reference" class="form-label">Reference</label>
                    <input type="text*" name="reference" id="reference"
                        class="form-control  @error('reference') is-invalid @enderror"
                        value="{{ $marche->reference }}">
                    @error('reference') <small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="col-md-6 col-sm-12 form-group">
                    <label for="montant" class="form-label">Montant (en FCFA)</label>
                    <input type="number" name="montant" id="montant"
                        class="form-control  @error('montant') is-invalid @enderror"
                        value="{{ $marche->montant }}">
                    @error('intitule') <small class="text-danger">{{ $message }}</small>@enderror
                </div>
            </div>


            <div class="row mb-3">

                <div class="col-md-6 col-sm-12 form-group">
                    <label for="type_marche" class="form-label">Type de marché</label>
                    <select name="type_marche" id="type_marche"
                        class="form-control select2 @error('type_marche') is-invalid @enderror">
                        <option value="">Choisir...</option>
                        <option value="fournitures" {{ $marche->type_marche == 'fournitures' ? 'selected' : '' }}>Marché
                            de
                            fournitures</option>
                        <option value="services" {{ $marche->type_marche == 'services' ? 'selected' : '' }}>Marché de
                            services</option>
                        <option value="travaux" {{ $marche->type_marche == 'travaux' ? 'selected' : '' }}>Marché de
                            travaux
                        </option>
                        <option value="prestations intellectuelles"
                            {{ $marche->type_marche == 'prestations intellectuelles' ? 'selected' : '' }}>Marché de
                            prestations intellectuelles</option>
                    </select>
                    @error('type_marche') <small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="col-md-6 col-sm-12 form-group">
                    <label for="type_source" class="form-label">Type source de financement</label>
                    <select name="type_source" id="type_source"
                        class="form-control select2  @error('type_source') is-invalid @enderror">
                        <option value="">Choisir...</option>
                        <option value="budget_autonome"
                            {{ $marche->type_source == 'budget_autonome' ? 'selected' : '' }}>
                            Budget autonome</option>
                        <option value="budget_national"
                            {{ $marche->type_source == 'budget_national' ? 'selected' : '' }}>
                            Budget national</option>
                        <option value="financement_exterieur"
                            {{ $marche->type_source == 'financement_exterieur' ? 'selected' : '' }}>Financement exterieur
                        </option>
                        <option value="don" {{ $marche->type_source == 'don' ? 'selected' : '' }}>Don</option>
                        <option value="partenariat" {{ $marche->type_source == 'partenariat' ? 'selected' : '' }}>
                            Partenariat</option>
                    </select>
                    @error('type_source') <small class="text-danger">{{ $message }}</small>@enderror
                </div>

            </div>


            <div class="row mb-3">

                <div class="col-md-6 col-sm-12 form-group">
                    <label for="mode_passation" class="form-label">Mode de passation</label>
                    <select name="mode_passation" id="mode_passation"
                        class="form-control select2  @error('mode_passation') is-invalid @enderror">
                        <option value="">Choisir...</option>
                        <option value="aao" {{ $marche->mode_passation == 'aao' ? 'selected' : '' }}>Avis d'appel
                            d'offres
                            ouvert</option>
                        <option value="aaoi" {{ $marche->mode_passation == 'aaoi' ? 'selected' : '' }}>Avis d'appel
                            d'offres international</option>
                        <option value="aaor" {{ $marche->mode_passation == 'aaor' ? 'selected' : '' }}>Avis d'appel
                            d'offres restreint</option>
                        <option value="ami" {{ $marche->mode_passation == 'ami' ? 'selected' : '' }}>Avis d'appel à
                            manifestation d'interêt</option>
                        <option value="amii" {{ $marche->mode_passation == 'amii' ? 'selected' : '' }}>Avis d'appel à
                            manifestation d'interêt international</option>
                        <option value="dc" {{ $marche->mode_passation == 'dc' ? 'selected' : '' }}>Demande de cotation
                        </option>
                        <option value="ddp" {{ $marche->mode_passation == 'ddp' ? 'selected' : '' }}>Demande de
                            renseignement de prix</option>
                    </select>
                    @error('mode_passation') <small class="text-danger">{{ $message }}</small>@enderror
                </div>


                <div class="col-md-6 col-sm-12 form-group">
                    <label for="type_selection" class="form-label">Methode de selection</label>
                    <input type="text" name="type_selection" id="type_selection"
                        class="form-control  @error('type_selection') is-invalid @enderror"
                        value="{{ $marche->type_selection }}">
                    @error('type_selection') <small class="text-danger">{{ $message }}</small>@enderror
                </div>


            </div>

            <div class="row mb-3">

                @if (Auth::user()->type == 's_public')
                    <div class="col-md-6 col-sm-12 form-group">
                        <label for="">Organe de contrôle du marché</label>
                        <div class="form-check">
                            <input class="form-check-input @error('type_organe') is-invalid @enderror" type="radio"
                                name="type_organe" id="dncmp" value="DNCMP"
                                {{ $marche->type_organe == 'DNCMP' ? 'checked' : '' }}>
                            <label class="form-check-label" for="dncmp">
                                Direction Nationale de Controle des Marchés Publics
                            </label>

                        </div>

                        <div class="form-check">
                            <input class="form-check-input @error('type_organe') is-invalid @enderror" type="radio"
                                name="type_organe" id="ccmp" value="CCMP"
                                {{ $marche->type_organe == 'CCMP' ? 'checked' : '' }}>
                            <label class="form-check-label" for="ccmp">
                                Cellule de Controle des Marches Publics
                            </label>

                        </div>

                        @error('type_organe') <small class="text-danger">{{ $message }}</small>@enderror

                    </div>
                @endif

                <div class="col-md-6 col-sm-12 form-group">
                    <label for="">Ce marché contient des lots</label>
                    <div class="form-check">
                        <input class="form-check-input @error('lot') is-invalid @enderror" type="radio" name="lot" id="oui"
                            value="1" {{ $marche->lot == '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="oui">
                            Oui
                        </label>

                    </div>

                    <div class="form-check">
                        <input class="form-check-input @error('lot') is-invalid @enderror" type="radio" name="lot" id="non"
                            value="0" {{ $marche->lot == '0' ? 'checked' : '' }}>
                        <label class="form-check-label" for="non">
                            Non
                        </label>

                    </div>

                    @error('lot') <small class="text-danger">{{ $message }}</small>@enderror

                </div>



            </div>


            @if ($marche->lot == 1)

                <div class="row mb-3 d-none" id="condition">
                    <div class="col-12">
                        <label for="nbr_lot" class="form-label">Nombre de lots</label>
                        <input type="number" name="nbr_lot" id="nbr_lot"
                            class="form-control  @error('nbr_lot') is-invalid @enderror"
                            value="{{ $marche->nbr_lot }}">
                        @error('nbr_lot') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>

            @endif




            <div class="d-flex justify-content-around mx-auto col-md-3 col-sm-12">
                <button class="btn btn-danger  elevation-1" type="reset">Annuler</button>
                <button class="btn btn-success  elevation-1" type="submit">Enregistrer</button>
            </div>




        </form>

    </div>
</div>





@endsection
