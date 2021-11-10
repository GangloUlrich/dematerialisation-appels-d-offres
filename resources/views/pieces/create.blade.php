@extends('layouts.administration')

@push('stylesheets')

{{-- summernote --}}
<link rel="stylesheet" href="{{asset('summernote/summernote-bs4.css')}}">

@endpush

@section('header')
    {{-- header de la section --}}
    <div class="content-header px-4 ">
        <div class="container-fluid ">

            <div class="*row  mb-2">
                <a href="{{ route('dashboard') }}"><button class="btn btn-secondary"><i class="fa fa-backward"
                            aria-hidden="true"></i> retour</button></a>

            </div>

            <div class="container-fluid bg-white p-3 rounded mb-3">



                <div class="row d-flex justify-content-around align-items-center">

                    <div class="col-sm-9">
                        <small class="font-weight-bold h5">Ajouter une pièce à fournir </small>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                        class="text-warning">Dashboard</a></li>
                                <li class="breadcrumb-item">Marchés</li>
                                <li class="breadcrumb-item active" aria-current="page">nouveau pièce à fournir </li>
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


@section('content')


@if (session()->has('message'))


                    <div class="alert alert-success alert-dismissible fade show " role="alert">
                        {{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>


@endif

<div class="container-fluid">
    <div class=" col-sm-12">

        <form action="{{ route('store_critere') }}" method="post" enctype="multipart/form-data">

            @csrf


            <div class="row mb-3">
                <label for="marche" class="form-label">Marche</label>
                <select name="marche_id" id="marche" class="form-control">
                    <option value="">Choisir...</option>

                    @foreach ($marches as $marche)

                    <option value="{{ $marche->id }}">{{ $marche->intitule }}</option>

                    @endforeach

                </select>
                @error('marche_id') <small class="text-danger">{{ $message }}</small>@enderror
            </div>



            <div class="form-group">
                    <label for="reference" class="form-label">Intitule</label>
                    <textarea name="intitule" id="intitule" class="summernote  @error('intitule') is-invalid @enderror form-control"  value="{{ old('intitule') }}" ></textarea>
                    @error('intitule') <small class="text-danger">{{ $message }}</small>@enderror

            </div>

            <div class="form-group">


                <label for="note" class="form-label">Note à attribuer</label>
                <input type="number" name="note" id="note"
                    class="form-control rounded-0 @error('intitule') is-invalid @enderror"
                    value="{{ old('note') }}">
                @error('note') <small class="text-danger">{{ $message }}</small>@enderror

            </div>


            <div class="d-flex justify-content-around mx-auto col-md-3 col-sm-12">
                <button class="btn btn-danger elevation-1" type="reset">ANNULER</button>
                <button class="btn btn-success  elevation-1" type="submit">ENREGISTRER</button>
            </div>




        </form>

    </div>


</div>



@endsection


@push('scripts')

<script src="{{ asset('summernote/summernote-bs4.min.js')}}"></script>

<script>



    $(document).ready(function() {
        $('.summernote').summernote({
            // fontNames:['Arial','Arial Black','Comic Sans MS','Courier New'],
            fontNames:['Montserrat-light', 'Montserrat-regular', 'Montserrat-bold'],
            fontNamesIgnoreCheck: [ 'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
                'Helvetica Neue', 'Helvetica', 'Impact', 'Lucida Grande',
                'Tahoma', 'Times New Roman', 'Verdana'],
            defaultFontNames: 'Montserrat-light',
            height: 200,
            width:1240,
            codemirror: {
                mode: 'text/html',
                htmlMode: true,
                lineNumbers: true,
                theme: 'monokai'
            },
            lang: 'fr-FR',
            placeholder: 'Saisissez le contenu ici'
        })
    });


</script>

@endpush

