@extends('layouts.administration')



@push('stylesheets')
{{-- select2 --}}
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">

<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
{{-- summernote --}}
<link rel="stylesheet" href="{{asset('summernote/summernote-bs4.css')}}">

@endpush
@section('header')
    {{-- header de la section --}}
    <div class="content-header px-4 ">
        <div class="container-fluid ">

            <div class="row  mb-2">
                <a href="@if ($marche_current==0) {{ route('dashboard') }} @else {{ route('show_marche',['id'=>$marche_current]) }} @endif"><button class="btn btn-secondary rounded text-size-xs"><i class="fa fa-backward"
                            aria-hidden="true"></i> Retour</button></a>

            </div>

            <div class="container-fluid bg-white p-3 rounded mb-3">



                <div class="row d-flex justify-content-around align-items-center">

                    <div class="col-sm-9">
                        <small class="fm-regular text-size-md ">Ajouter un dossier d'appel d'offres</small>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                        class="text-warning">Dashboard</a></li>
                                <li class="breadcrumb-item">Marchés</li>
                                <li class="breadcrumb-item active" aria-current="page">nouveau DAO</li>
                            </ol>
                        </nav>

                    </div>

                    <div class="col-sm-3 d-flex justify-content-end ">
                        <a href="{{ route('liste_marche') }}"><button class="btn btn-primary text-size-xs rounded px-3"><i class="fa fa-bars"></i>
                                Tous les marchés</button></a>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection


@section('content')





<div class="container-fluid px-4">
<div class="container-fluid p-lg-4 bg-white rounded">

    @if (session()->has('message'))


    <div class="alert alert-success alert-dismissible fade show mb-3 " role="alert">
        {{ session()->get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


@endif


        <form action="{{ route('store_dao') }}" method="post" enctype="multipart/form-data">

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



            <div class="row mb-3">


                    <label for="reference" class="form-label">Reference</label>
                    <input type="text*" name="reference" id="reference"
                        class="form-control rounded-0 @error('reference') is-invalid @enderror"
                        value="{{ old('reference') }}">
                    @error('reference') <small class="text-danger">{{ $message }}</small>@enderror

            </div>

            <div class="row mb-3">


                    <label for="file" class="form-label">Fichier</label>
                    <input type="file" name="dao_file" id="file" accept=".pdf"
                        class="form-control rounded-0 @error('dao_file') is-invalid @enderror"
                        value="{{ old('dao_file') }}">
                    @error('dao_file') <small class="text-danger">{{ $message }}</small>@enderror

            </div>


            <div class="row mb-3 col-md-12">
                <label for="desc" class="form-label">Description</label>
                <textarea name="description" id="desc" class="summernote w-100 @error('description') is-invalid @enderror" ></textarea>
                @error('description') <small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="d-flex justify-content-around mx-auto col-md-3 col-sm-12">
                <button class="btn btn-danger  px-4 text-size-xs" type="reset">Annuler</button>
                <button class="btn btn-success px-4 text-size-xs" type="submit">Enregistrer</button>
            </div>

        </form>

    </div>
    <

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
            width:1300,
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
