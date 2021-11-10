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
                        <small class="fm-regular text-size-md">Soumission d'une offre ( Etape 2) </small>

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

        <form action="{{ route('sendEndBid')}}" method="post" enctype="multipart/form-data">

            @csrf


            <input type="hidden" name="soumission" value="{{ $soumission}}">
        

            <div class="row mb-3">
                <div class="col-12">
                    <label for="intitule" class="fw-bold">Marche </span></label>
                    <input type="text" name="" id="name"
                        class="form-control  @error('marche') is-invalid @enderror" value="{{ $marche->intitule }} " disabled>
                    @error('marche') <small class="text-danger">{{ $message }}</small>@enderror
                </div>
            </div>

            @foreach($pieces as $piece)
            <div class="row mb-3">
                <div class="col-12">
                    <label for="intitule" class="fw-bold">{{ $piece->intitule}}<span class='text-danger'>  {{ $piece->eliminatoire == "1" ? " (*)" : "" }}</span></label>
                    <input type="file" name="filenames[]" id="name" accept="pdf"
                        class="form-control  @error('') is-invalid @enderror">
                    @error('') <small class="text-danger">{{ $message }}</small>@enderror
                </div>
            </div>

            <input type="hidden" name="assoc[]" value="{{ $piece->id }}">
@endforeach


            <div class="d-flex justify-content-around mx-auto col-md-3 col-sm-12">
                <button class="btn btn-danger text-size-xs" type="reset">ANNULER</button>
                <button class="btn btn-success text-size-xs" type="submit">ENREGISTRER</button>
            </div>




        </form>

    </div>


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
            height: 300,
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