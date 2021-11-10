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
                <a href="@if ($marche_current==0) {{ route('dashboard') }} @else {{ route('show_marche',['id'=>$marche_current]) }} @endif"><button class="btn btn-secondary text-size-xs"><i class="fa fa-backward"
                            aria-hidden="true"></i> Retour</button></a>

            </div>

            <div class="container-fluid bg-white p-3 rounded mb-3">



                <div class="row d-flex justify-content-around align-items-center">

                    <div class="col-sm-9">
                        <small class="fm-regular text-size-md">Ajouter une pièce à fournir </small>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                        class="text-warning">Dashboard</a></li>
                                <li class="breadcrumb-item">Marchés</li>
                                <li class="breadcrumb-item active" aria-current="page">Critères de  sélection</li>
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

        <form action="{{ route('store_piece') }}" method="post" enctype="multipart/form-data">

            @csrf




            <div class="row mb-3">
                <label for="marche" class="form-label">Marche</label>
                <select name="marche_id" id="marche" class="form-control select2">


                    @foreach ($marches as $marche)

                    <option value="{{ $marche->id }}">{{ $marche->intitule }}</option>

                    @if($marche->id == $marche_current)
                    <option value="{{ $marche->id }}" selected>{{ $marche->intitule }}</option>

                @endif

                    @endforeach

                </select>
                @error('marche_id') <small class="text-danger">{{ $message }}</small>@enderror
            </div>



            <div class="form-group">
                    <label for="reference" class="form-label">Intitule</label>
                    <textarea name="intitule" id="intitule" class="summernote  @error('intitule') is-invalid @enderror form-control"  value="{{ old('intitule') }}" ></textarea>
                    @error('intitule') <small class="text-danger">{{ $message }}</small>@enderror

            </div>

            <div class=" form-group">
                <label for="">Piece eliminatoire </label>
                <div class="form-check">
                    <input class="form-check-input @error('eliminatoire') is-invalid @enderror" type="radio" name="eliminatoire" id="oui"
                        value="1">
                    <label class="form-check-label" for="oui">
                        Oui
                    </label>

                </div>

                <div class="form-check">
                    <input class="form-check-input @error('eliminatoire') is-invalid @enderror" type="radio" name="eliminatoire" id="non"
                        value="0">
                    <label class="form-check-label" for="non">
                        Non
                    </label>

                </div>

                @error('eliminatoire') <small class="text-danger">{{ $message }}</small>@enderror

            </div>


            <div class="d-flex justify-content-around mx-auto col-md-3 col-sm-12">
                <button class="btn btn-danger text-size-xs" type="reset">ANNULER</button>
                <button class="btn btn-success text-size-xs" type="submit">ENREGISTRER</button>
            </div>




        </form>

    </div>


</div>
</div>


@endsection