@extends('layouts.administration')



{{-- Ajout de styles supplementaires --}}


@push('stylesheets')

    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

@endpush


@section('header')
    {{-- header de la section --}}
    <div class="content-header ">
        <div class="container-fluid ">

            <div class="*row  mb-2">
                <a href="{{ route('dashboard') }}"><button class="btn btn-secondary"><i class="fa fa-backward"
                            aria-hidden="true"></i> retour</button></a>

            </div>

            <div class="container-fluid bg-white p-3 rounded mb-3">



                <div class="row d-flex justify-content-around align-items-center">

                    <div class="col-sm-9">
                        <small class="fm-regular text-size-md">Création d'un Nouveau marché</small>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                        class="text-warning">Dashboard</a></li>
                                <li class="breadcrumb-item">Marchés</li>
                                <li class="breadcrumb-item active" aria-current="page">Nouveau marché</li>
                            </ol>
                        </nav>

                    </div>

                    <div class="col-sm-3 d-flex justify-content-end ">
                        <a href="{{ route('liste_marche') }}"><button class="btn btn-primary  rounded text-size-xs"><i class="fa fa-bars"></i>
                                Tous les marchés</button></a>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('content')



<div class="container-fluid px-2">

    <div class="container-fluid bg-white rounded p-lg-4 p-sm-2">




        <form action="{{ route('store_marche') }}" method="post">

            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="row mb-3">
                <div class="col-12">
                    <label for="intitule" class="fw-bold">Intitulé du marché <span class="text-danger">(*)</span></label>
                    <input type="text" name="intitule" id="name"
                        class="form-control  @error('intitule') is-invalid @enderror" value="{{ old('intitule') }} ">
                    @error('intitule') <small class="text-danger">{{ $message }}</small>@enderror
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-md-6 col-sm-12 form-group">
                    <label for="reference" class="form-label">Référence <span class="text-danger">(*)</span></label>
                    <input type="text*" name="reference" id="reference"
                        class="form-control  @error('reference') is-invalid @enderror" value="{{ old('reference') }}">
                    @error('reference') <small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="col-md-6 col-sm-12 form-group">
                    <label for="montant" class="form-label">Montant (en FCFA) <span class="text-danger">(*)</span></label>
                    <input type="number" name="montant" id="montant"
                        class="form-control  @error('montant') is-invalid @enderror" value="{{ old('montant') }}">
                    @error('intitule') <small class="text-danger">{{ $message }}</small>@enderror
                </div>
            </div>


            <div class="row mb-3">

                <div class="col-md-6 col-sm-12 form-group">
                    <label for="type_marche" class="form-label">Type de marché <span class="text-danger">(*)</span></label>
                    <select name="type_marche" id="type_marche"
                        class="form-control select2 @error('type_marche') is-invalid @enderror">
                        <option value="">Choisir...</option>
                        <option value="fournitures" {{ old('type_marche') == 'fournitures' ? 'selected' : '' }}>Marché de
                            fournitures</option>
                        <option value="services" {{ old('type_marche') == 'services' ? 'selected' : '' }}>Marché de
                            services</option>
                        <option value="travaux" {{ old('type_marche') == 'travaux' ? 'selected' : '' }}>Marché de travaux
                        </option>
                        <option value="prestations intellectuelles"
                            {{ old('type_marche') == 'prestations intellectuelles' ? 'selected' : '' }}>Marché de
                            prestations intellectuelles</option>
                    </select>
                    @error('type_marche') <small class="text-danger">{{ $message }}</small>@enderror
                </div>

                <div class="col-md-6 col-sm-12 form-group">
                    <label for="type_source" class="form-label">Type source de financement <span class="text-danger">(*)</span></label>
                    <select name="type_source" id="type_source"
                        class="form-control select2 @error('type_source') is-invalid @enderror">

                        <option value="">Choisir...</option>
                        <option value="budget_autonome" {{ old('type_source') == 'budget_autonome' ? 'selected' : '' }}>
                            Budget autonome</option>
                        <option value="budget_national" {{ old('type_source') == 'budget_national' ? 'selected' : '' }}>
                            Budget national</option>
                        <option value="financement_exterieur"
                            {{ old('type_source') == 'financement_exterieur' ? 'selected' : '' }}>Financement extérieur
                        </option>
                        <option value="don" {{ old('type_source') == 'don' ? 'selected' : '' }}>Don</option>
                        <option value="partenariat" {{ old('type_source') == 'partenariat' ? 'selected' : '' }}>
                            Partenariat</option>
                    </select>
                    @error('type_source') <small class="text-danger">{{ $message }}</small>@enderror
                </div>

            </div>


            <div class="row mb-3">

                <div class="col-md-6 col-sm-12 form-group">
                    <label for="mode_passation" class="form-label">Mode de passation <span class="text-danger">(*)</span></label>
                    <select name="mode_passation" id="mode_passation"
                        class="form-control  select2 @error('mode_passation') is-invalid @enderror">
                        <option value="">Choisir...</option>
                        <option value="aaoo" {{ old('mode_passation') == 'aao' ? 'selected' : '' }}>Avis d'appel d'offres
                            ouvert</option>
                        <option value="aaoi" {{ old('mode_passation') == 'aaoi' ? 'selected' : '' }}>Avis d'appel
                            d'offres international</option>
                        <option value="aaor" {{ old('mode_passation') == 'aaor' ? 'selected' : '' }}>Avis d'appel
                            d'offres restreint</option>
                        <option value="ami" {{ old('mode_passation') == 'ami' ? 'selected' : '' }}>Avis d'appel à
                            manifestation d'interêt</option>
                        <option value="amii" {{ old('mode_passation') == 'amii' ? 'selected' : '' }}>Avis d'appel à
                            manifestation d'interêt international</option>
                        <option value="dc" {{ old('mode_passation') == 'dc' ? 'selected' : '' }}>Demande de cotation
                        </option>
                        <option value="ddp" {{ old('mode_passation') == 'ddp' ? 'selected' : '' }}>Demande de
                            renseignement de prix</option>
                    </select>
                    @error('mode_passation') <small class="text-danger">{{ $message }}</small>@enderror
                </div>


                <div class="col-md-6 col-sm-12 form-group">
                    <label for="type_selection" class="form-label">Méthode de sélection <span class="text-danger">(*)</span></label>
                    <input type="text" name="type_selection" id="type_selection"
                        class="form-control &  @error('type_selection') is-invalid @enderror"
                        value="{{ old('type_selection') }}">
                    @error('type_selection') <small class="text-danger">{{ $message }}</small>@enderror
                </div>


            </div>

            <div class="row mb-3">

                @if (Auth::user()->type == 's_public')
                    <div class="col-md-6 col-sm-12 form-group">
                        <label for="">Organe de contrôle du marché <span class="text-danger">(*)</span></label>
                        <div class="form-check">
                            <input class="form-check-input @error('type_organe') is-invalid @enderror" type="radio"
                                name="type_organe" id="dncmp" value="DNCMP">
                            <label class="form-check-label" for="dncmp">
                                Direction Nationale de Contrôle des Marchés Publics
                            </label>

                        </div>

                        <div class="form-check">
                            <input class="form-check-input @error('type_organe') is-invalid @enderror" type="radio"
                                name="type_organe" id="ccmp" value="CCMP">
                            <label class="form-check-label" for="ccmp">
                                Cellule de Contrôle des Marchés Publics
                            </label>

                        </div>

                        @error('type_organe') <small class="text-danger">{{ $message }}</small>@enderror

                    </div>
                @endif

                <div class="col-md-6 col-sm-12 form-group">
                    <label for="">Ce marché contient des lots </label>
                    <div class="form-check">
                        <input class="form-check-input @error('lot') is-invalid @enderror" type="radio" name="lot" id="oui"
                            value="1">
                        <label class="form-check-label" for="oui">
                            Oui
                        </label>

                    </div>

                    <div class="form-check">
                        <input class="form-check-input @error('lot') is-invalid @enderror" type="radio" name="lot" id="non"
                            value="0">
                        <label class="form-check-label" for="non">
                            Non
                        </label>

                    </div>

                    @error('lot') <small class="text-danger">{{ $message }}</small>@enderror

                </div>



            </div>


            <div class="row mb-3 d-none" id="condition">
                <div class="col-12">
                    <label for="nbr_lot" class="form-label">Nombre de lots</label>
                    <input type="number" name="nbr_lot" id="nbr_lot"
                        class="form-control  @error('nbr_lot') is-invalid @enderror">
                    @error('nbr_lot') <small class="text-danger">{{ $message }}</small>@enderror
                </div>


            </div>



            <div class="d-flex justify-content-around mx-auto col-md-3 col-sm-12">
                <button class="btn btn-danger  elevation-1 rounded px-4 " type="reset">Annuler</button>
                <button class="btn btn-success  elevation-1 rounded px-4" type="submit">Enregistrer</button>
            </div>




        </form>

    </div></div>




    <script>
        var radio = document.getElementById('oui');

        radio.addEventListener('change', function(event) {

            if (event.target.value == 1) {
                document.getElementById('condition').classList.remove('d-none');
            }


        });

        document.getElementById('non').addEventListener('change', function(event) {
            if (event.target.value == 0) {
                document.getElementById('condition').classList.add('d-none');
            }
        });

    </script>


@endsection


@push('scripts')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2({
                theme: 'bootstrap4'
            });
        });

    </script>
@endpush
