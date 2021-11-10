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
            <a href="@if ($marche_current==0) {{ route('dashboard') }} @else {{ route('show_marche',['id'=>$marche_current]) }} @endif"><button class="btn btn-secondary text-size-xs"><i class="fa fa-backward"
                            aria-hidden="true"></i> Retour</button></a>

            </div>

            <div class="container-fluid bg-white p-3 rounded mb-3">



                <div class="row d-flex justify-content-around align-items-center">

                    <div class="col-sm-9">
                        <small class="fm-regular text-size-md">Planification d'une réunion virtuelle</small>

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

@if (session()->has('message'))


                    <div class="alert alert-success alert-dismissible fade show " role="alert">
                        {{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>


@endif

<div class="container-fluid px-2">

    <div class="container-fluid bg-white rounded p-lg-4 p-sm-2">

    <div class="text-size-sm fm-regular ps-0">Creer la réunion par visioconférence avec : </div>
    <div class="d-flex">
    
        <a href="https://meet.google.com/" target="_blank" class="btn btn outline success btn-sm fm-regular me-3 text-size-sm ps-0"><img src="{{asset('icons/meet.svg')}}" alt="Google meet" height="30">Google Meet</a>
        <a href="https://www.microsoft.com/fr-ww/microsoft-teams/group-chat-software" target="_blank" class="btn text-size-sm btn outline success btn-sm fm-regular me-3"><img src="{{asset('icons/teams.svg')}}" alt="Microsoft Teams" height="30">Microsoft Teams</a>
        <a href="https://zoom.us/signin" target="_blank" class="btn text-size-sm btn outline success btn-sm fm-regular me-3"><img src="{{asset('icons/zoom.svg')}}" alt="Zoom" height="30">Zoom</a>
        <a href="https://www.skype.com/fr/free-conference-call/?cm_mmc=accessurl" target="_blank" class="btn text-size-sm btn outline success btn-sm fm-regular me-3"><img src="{{asset('icons/skype.svg')}}" alt="skype" height="30">Skype</a>
    </div>

    <form action="{{ route('store_meet') }}" method="post">

            @csrf
            <input type="hidden" name="marche" value="{{ $marcheInfos->id }}">



            <div class="row my-3">


                <label for="date" class="form-label fm-regular ">Marché</label>
                <input type="text"  id="date"
                    class="form-control rounded-0 @error('') is-invalid @enderror"
                    value="{{$marcheInfos->intitule }}" disabled>


        </div>


        <div class="row mb-3 col-md-12">
                    <label for="desc" class="form-label">Lien d'invitation à la reunion d'ouverture des offres</label>
                    <textarea name="lien" id="desc" class="summernote w-100 @error('lien') is-invalid @enderror" ></textarea>
                    @error('lien') <small class="text-danger">{{ $message }}</small>@enderror
        </div>


            <div class="d-flex justify-content-around mx-auto col-md-3 col-sm-12">
                <button class="btn btn-danger text-size-xs" type="reset">ANNULER</button>
                <button class="btn btn-success text-size-xs" type="submit">ENREGISTRER</button>
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

@endpush