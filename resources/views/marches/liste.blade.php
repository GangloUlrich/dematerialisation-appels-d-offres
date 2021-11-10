@extends('layouts.administration')
@section('title', 'liste des marches')

@push('stylesheets')
@include('layouts.admin.datatables-css')
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
                        <small class="font-weight-bold h5">Liste des marchés</small>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-warning">Dashboard</a></li>
                                <li class="breadcrumb-item">Marchés</li>

                            </ol>
                        </nav>

                    </div>

                    <div class="col-sm-3 d-flex justify-content-end ">
                        <a href="{{ route('create_marche') }}"><button class="btn btn-primary"><i class="fa fa-plus"></i>
                                Nouveau marché</button></a>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('content')


<div class="container-fluid px-4">
    <div class="container-fluid p-4 bg-white rounded">

        @if (session()->has('reponse'))

            <div class="alert alert-success" role="alert">
                <i class="fas fa-check"></i> {{ session()->get('reponse') }}
            </div>

        @endif



        <div class="mb-3 text-center">
            <p class="font-weight-bold text-center ">LISTE DES MARCHES ({{ $marches->count() }})</p>
        </div>

        <table class="table table-bordered rounded bg-white display" data-page-length='10'>

            {{-- <div id="bouton" class="mb-2 float-right rounded-0"></div> --}}

            <thead class="bg-success text-white">

                <tr>
                    <th>Reference</th>
                    <th>Intitule du marché </th>
                    <th>Statut</th>
                    <th>Type</th>
                    <th>Montant</th>

                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($marches as $marche)
                    <tr>
                        <td>{{ $marche->reference }}</td>
                        <td>{{ $marche->intitule }}</td>
                        <td>{{ $marche->statut }}</td>
                        <td>{{ $marche->type_marche }}</td>
                        <td>{{ $marche->montant }}  Francs CFA</td>

                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('show_marche',['id'=>$marche->id]) }}" class=" text-secondary"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('edit_marche', ['id' => $marche->id]) }}" class="text-success "><i
                                        class="fa fa-pencil-alt"></i></a>
                                <!-- Button trigger modal -->

                                <a href="#" class="text-danger  " type="button" data-toggle="modal"
                                    data-target="#{!! \Illuminate\Support\Str::words($marche->intitule, 1, '') !!}"><i class="fa fa-trash"></i></a>
                            </div>



                            <!-- Modal -->
                            {{-- \Illuminate\Support\Str::words pour
                                pourvoir avoir un identifiant unique pour chaque modal --}}
                            <div class="modal fade rounded-0 " id="{!! \Illuminate\Support\Str::words($marche->intitule, 1, '') !!}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-marche" role="document">
                                    <div class="modal-content ">
                                        <div class="modal-header text-center m-0">
                                            <div class="text-center fm-semibold text-size-md">Supprimer un marché</div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
                                            </button>
                                        </div>
                                        <div class="modal-body p-3 text-center d-flex justify-content-center">

                                            <form id="" action="{{ route('delete_marche', ['id' => $marche->id]) }}"
                                                method="POST"> @csrf

                                                <div>Etes-vous sure de vouloir supprimer le
                                                    marche :  </div>
                                                    
                                                <div class="text-danger mt-3 font-weight-bold fm-regular">{{ $marche->intitule }}</div>?

                                                <div class="d-flex justify-content-center">
                                                <div class="row">
                                                <div class="col-6"><button type="button" class="btn btn-danger rounded-pill px-3 " data-dismiss="modal">Annuler</button></div>
                                                    <div class="col-6"><button class="btn btn-success rounded-pill px-3 " type="submit">Confirmer</button></div>
                                                </div>
                                                </div>
                                                
                                                

                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>




@endsection



@push('scripts')
@include('layouts.admin.datatables-js')
@endpush
