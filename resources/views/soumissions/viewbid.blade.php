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
                        <small class="fm-regular text-size-md">Validation de l'offre (  Etape 3 ) </small>

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

    <div class="text-size-sm fm-semibold fw-bold text-dark mb-2  ">Intitule du marché</div>
    <div class="text-size-xs text-justify fm-regular fw-bold display-5 font-weight-bold">{{ $data->marche()->first()->intitule }}</div>

    <div class="text-size-sm fm-semibold mt-2 ">Cout proposé</div>
    <div class="text-size xs fm-regular display-5 font-weight-bold">{{ $data->cout }} Francs CFA</div>

    <div class="text-size-sm fm-semibold mt-2 ">Description de l'offre proposé</div>
    <div class="text-size xs fm-regular display-5 font-weight-bold">{!! $data->details !!} </div>
    </div>

    <table class="table table-bordered rounded bg-white w-65 mt-3" data-page-length='10'>

<thead class="bg-success text-white">

    <tr>
        <th scope="col">Documents fournis </th>
        <th scope="col">Soumis</th>
        <th scope="col">Actions</th>
    </tr>
</thead>
<tbody class="bg-white">

@foreach ($files as $file)

@foreach($pieces as $piece)

@if($piece->id == $file->piecenecessaire_id)
        <tr>
            <td>{{ $piece->intitule }} </td>
            <td>{{ $piece->eliminatoire== 1 ? 'oui' : 'non'}}</td>
            <td>
            <div class="d-flex justify-content-between">
                     <a href=""  target="_blank" class=" text-secondary " data-toggle="tooltip" data-placement="top" title="Voir le document"><i class="fa fa-eye text-size-sm"></i></a>
                    <a href="" target="_blank" class="text-success " data-toggle="tooltip" data-placement="top" title="Telecharger le document"><i class="fa fa-pen text-size-sm "></i></a>
                    </div>
            </td>

        </tr>
@endif
@endforeach
    @endforeach
</tbody>
</table>


<div class="mt-3">

@if($data->statut != "soumis")
    <a href="{{ route('finalizeBid',['soumission'=>$data->id ])}}" class="btn btn-success btn-sm fm-regular">Soumettre l'offre</a>
@else

<div class="text-danger text-size-sm">L'offre a été soumis le {{ $data->date_soumission }}</div>
</div>

@endif
</div>
</div>


@endsection
