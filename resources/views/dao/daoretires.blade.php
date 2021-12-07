@extends('layouts.administration')



@push('stylesheets')
@include('layouts.admin.datatables-css')

@endpush

@section('header')
    {{-- header de la section --}}
    <div class="content-header px-4 ">
        <div class="container-fluid ">

            <div class="row  mb-2">
                <a href="{{ route('dashboard') }}"><button class="btn btn-secondary rounded text-size-xs"><i class="fa fa-backward"
                            aria-hidden="true"></i> Retour</button></a>

            </div>

            <div class="container-fluid bg-white p-3 rounded mb-3">

                <div class="row d-flex justify-content-around align-items-center">

                    <div class="col-sm-9">
                        <small class="fm-regular text-size-md ">Liste des dossiers d'appels d'offres retirés ( {{ $retraits->count() }} )</small>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                        class="text-warning">Dashboard</a></li>
                                <li class="breadcrumb-item">DAO retirés</li>
                                <li class="breadcrumb-item active" aria-current="page"></li>
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


<table class="table table-bordered rounded bg-white display" data-page-length='10'>

            <thead class="bg-success text-white">

                <tr>
                    <th>Intitule du marché </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white">
               
            @foreach ($retraits as $retrait)
                    <tr>
                        <td>{{ $retrait->document()->first()->marche()->first()->intitule }}</td>
                        <td>
                            <div class="d-flex justify-content-between">
                                 <a href="{{ route('afficher_document',['document'=>$retrait->document()->first()->id]) }}"  target="_blank" class=" text-secondary me-2 text-size-sm" data-toggle="tooltip" data-placement="top" title="Voir le document"><i class="fa fa-eye text-size-sm"></i></a>
                                <a href="{{ route('telecharger_document',['document'=>$retrait->document()->first()->id]) }}" target="_blank" class="text-success me-2" data-toggle="tooltip" data-placement="top" title="Telecharger le document"><i class="fa fa-download text-size-sm "></i></a>
                                <a href="" class="text-danger " data-toggle="tooltip" data-placement="top" title="Questions/reponses"><i class="fa fa-question-circle me-2 text-size-sm"></i></a>

                                @if(limiteS($retrait->document_id))
                                <a href="{{ route('startBid',['marche'=>$retrait->document()->first()->marche()->first()->id]) }}" class="text-primary " data-toggle="tooltip" data-placement="top" title="Soumettre une offre"><i class="fa fa-paper-plane text-size-sm me-2"></i></a>
                                @else
                                <a href="javascript:void(0)" class="text-dark"><i class="fa fa-exclamation-triangle text-size-sm me-2"></i></a>
                                
                                @endif
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
</table>



@endsection
@push('scripts')
@include('layouts.admin.datatables-js')
@endpush