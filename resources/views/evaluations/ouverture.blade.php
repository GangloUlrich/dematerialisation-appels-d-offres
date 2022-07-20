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
    <div class="text-size-xs text-justify fm-regular font-weight-bold h6">{{ $data->marche()->first()->intitule }}</div>

</div>
</div>


<div class="container-fluid p-lg-4 bg-white rounded">
    <div class=" col-sm-12">


<div class="d-flex justify-content-between">
<div>
        <div class="text-size-sm fm-regular text-dark mb-2  ">Soumissionnaire : <span class="fm-semibold font-weight-bold h6">{{ $data->user()->first()->name }}</span> </div>

        <div class="text-size-sm fm-regular mt-2 ">Cout proposé : <span class="fm-semibold font-weight-bold h6">{{ $data->cout }} Francs CFA</span></div>
        </div>

        <div>
            <a href="{{ route('evaluationBid',['soumission' => $data->id ])}}" class="btn btn-primary text-size-xs btn-sm px-4">Evaluer</a>
        </div>
</div>

        <div class="text-size-sm fm-regular mt-2 mb-4 ">Description de l'offre proposé</div>
        <div class="text-size-xs fm-light font-weight-bold " >{!! $data->details !!} </div>
        <div class="text-size-sm fm-regular mt-2  ">Documents fournis</div>
        <table class="table table-striped">
            @foreach($pieces as $piece)
            <tr>
                <td> {{ $piece->intitule }}</td>
            </tr>
            @endforeach

        </table>


</div>

    </div>



@endsection
