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
                <a href="{{ route('show_marche',['id'=>$data->marche()->first()->id]) }}"><button class="btn btn-secondary text-size-xs"><i class="fa fa-backward"
                            aria-hidden="true"></i> Retour</button></a>

            </div>

            <div class="container-fluid bg-white p-3 rounded mb-3">



                <div class="row d-flex justify-content-between align-items-center">

                    <div class="col-sm-9">
                        <small class="fm-regular text-size-md">Ouverture des offres </small>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                        class="text-warning">Dashboard</a></li>
                                <li class="breadcrumb-item">Marchés</li>
                                <li class="breadcrumb-item active" aria-current="page">ouverture</li>
                            </ol>
                        </nav>

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

<div class="container-fluid p-lg-3 mb-2 bg-white rounded">
    <div class=" col-sm-12">

    <div class="text-size-sm fm-semibold fw-bold text-dark mb-2  ">Intitule du marché</div>
    <div class="text-size-xs text-justify fm-regular fw-bold">{{ $data->marche()->first()->intitule }}</div>

</div>
</div>


<div class="container-fluid p-lg-4 bg-white rounded">
    <div class=" col-sm-12">
  <div class="text-size-sm fm-regular text-dark mb-2  ">Soumissionnaire : <span class="fm-semibold">{{ $data->user()->first()->name }}</span> </div>

        <div class="text-size-sm fm-regular mt-2 ">Cout proposé : <span class="fm-semibold">{{ $data->cout }} Francs CFA</span></div>
        </div>

        <div class="text-size-sm fm-regular mt-2 ">Description de l'offre proposé</div>
        <div class="text-size-xs fm-light">{!! $data->details !!} </div>

        <div class="text-size-sm fm-regular my-2 text-danger ">Liste des documents fournis</div>

        <table class="table table-bordered rounded bg-white w-65 mt-3" data-page-length='10'>

<thead class="bg-success text-white">

    <tr>
        <th scope="col">Piece demande </th>
        <th scope="col">Eliminatoire</th>
        <th>Fournis</th>
        <th scope="col">Actions</th>
    </tr>
</thead>
<tbody class="bg-white">
   
@foreach($pieces as $piece)
        <tr>
            <td>{{ $piece->intitule }} </td>
            <td>{{ $piece->eliminatoire == 1 ? 'oui' : 'non'}}</td>
            <td>
            @if(hasProvidedFile($data->id,$piece))
            oui
            @else
            non
            @endif
            </td>
            
            <td>
            @if(hasProvidedFile($data->id,$piece))
            <div class="d-flex justify-content-between">
                     <a href=""  target="_blank" class=" text-secondary " data-toggle="tooltip" data-placement="top" title="Voir le document"><i class="fa fa-eye text-size-sm"></i> Voir </a>
                    </div>
            
            @else

            @endif
            </td>
        </tr>
        @endforeach

</tbody>
</table>
       
       
     


</div>

    </div>


    <div class="container-fluid px-4 mt-2">

<div class="container-fluid p-lg-3 mb-2 bg-white rounded">
    <div class=" col-sm-12">
    <div class="text-size-sm fm-regular mb-2 text-size-md ">Attribution des notes </div>
    <div class="d-flex justify-content-between mb-2">

        <div class="text-size-sm fm-semibold col-8">Liste des criteres</div>
        <div class="text-size-sm fm-semibold col-2">Note attribuée</div>
        <div class="text-size-sm fm-semibold col-2">Note maximale</div>
    </div>

    <form action="{{ route('storeEvaluationBid') }}" method="post" class="form-inline" enctype="multipart/form-data">

    @csrf
    <input type="hidden" name="soumission" value="{{ $data->id}}">
    @foreach($criteres as $critere)
    <div class="form-group col-12 px-0 mb-2">
            <div class="col-8 text-left d-flex justify-content-start fm-light">
            <label for="note" class="fm-light text-size-xs">{!! $critere->intitule !!}</label>
            </div>

            <div class="col-2">
            <input type="number" name="notes[]" id="note" class="form-control  w-75 rounded-0 @error('intitule') is-invalid @enderror">
            </div>

            <div class="col-2  fm-bold text-danger text-size-sm">{{ $critere->note }} points</div>     
            @error('note') <small class="text-danger">{{ $message }}</small>@enderror

    </div>
    <input type="hidden" name="criteres[]" value="{{ $critere->id }}">
    @endforeach
    <div class="d-flex justify-content-around mx-auto col-md-3 col-sm-12">
        <button class="btn btn-danger text-size-xs " type="reset">ANNULER</button>
        <button class="btn btn-success text-size-xs" type="submit">ENREGISTRER</button>
    </div>

</form>

</div>
</div>

@endsection
