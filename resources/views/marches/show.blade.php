@extends('layouts.administration')
@push('stylesheets')
@include('layouts.admin.datatables-css')

@endpush




@section('header')
    {{-- header de la section --}}
    <div class="content-header ">
        <div class="container-fluid bg-white p-3 rounded text-size-md ">
            {{ $marche->intitule }}
        </div>
    </div>

@endsection

@section('content')


{{-- cartes de stats  --}}
<div class="container-fluid  rounded p-0 d-flex flex-lg-row flex-column m-0">
    <div class="col-md-3 col-sm-6 col-12 ">

        <div class="d-flex align-items-center justify-content-around p-3 bg-success text-white">
            <p>Documents associés</p>
            <h2>@isset($stat_docs)  {{ $stat_docs }} @else 0  @endisset</h2>
        </div>

      </div>


      <div class="col-md-3 col-sm-6 col-12 ">

        <div class="d-flex align-items-center justify-content-around p-3 bg-warning text-dark">
            <p>Pièces à fournir </p>
            <h2>@isset($stat_piece)  {{ $stat_piece }}  @else 0 @endisset</h2>
        </div>

      </div>


      <div class="col-md-3 col-sm-6 col-12 ">

        <div class="d-flex align-items-center justify-content-around p-3 text-white bg-danger">
            <p>Critères de sélection </p>
            <h2>@isset($stat_critere) {{ $stat_critere }}  @else 0 @endisset</h2>
        </div>

      </div>

      <div class="col-md-3 col-sm-6 col-12 ">

        <div class="d-flex align-items-center bg-dark text-white justify-content-around p-3 ">
            <p>Soumissionnaires </p>
            <h2>{{ $soumissions->count() }}</h2>
        </div>

      </div>

</div>

{{-- menu de navigation --}}

<div class="container-fluid  bg-white my-3 p-3">

    <ul class="nav nav-tabs " id="myTab" role="tablist">
        <li class="nav-item ">
          <a class="nav-link rounded-0 active text-dark" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Informations généraux </a>
        </li>
        <li class="nav-item">
          <a class="nav-link rounded-0 text-dark" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Documents associés</a>
        </li>
        <li class="nav-item">
          <a class="nav-link rounded-0 text-dark" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Criteres de selection</a>
        </li>

        <li class="nav-item">
            <a class="nav-link rounded-0 text-dark" id="pieces-tab" data-toggle="tab" href="#piece" role="tab" aria-controls="piece" aria-selected="false">Pièces à fournir</a>
        </li>

        <li class="nav-item">
            <a class="nav-link rounded-0 text-dark" id="autres-tab" data-toggle="tab" href="#autre" role="tab" aria-controls="autre" aria-selected="false">Reunion</a>
        </li>

        <li class="nav-item">
            <a class="nav-link rounded-0 text-dark" id="retrait-tab" data-toggle="tab" href="#retrait" role="tab" aria-controls="retrait" aria-selected="false">Retraits </a>
        </li>

        <li class="nav-item">
            <a class="nav-link rounded-0 text-dark" id="soumissions-tab" data-toggle="tab" href="#soumission" role="tab" aria-controls="soumission" aria-selected="false">Soumissionnaires </a>
        </li>
    </ul>


    {{-- tab informations  --}}


    <div class="tab-content mt-3" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

        <div class="d-flex justify-content-between mb-3">
            <h4 class="text-size-md text-uppercase d-block " class="text-size-md">Informations généraux</h4>

            <div class="col-md-4 offset-md-4 col-sm-12">

                    <button class="btn-success rounded btn me-3 text-size-xs"> <i class="fas fa-tag"></i> statut: {{  $marche->statut }}</button>
                    <a href="{{ route('edit_marche', ['id' => $marche->id]) }}" class="ms-3"><button class="btn-danger rounded btn text-size-xs"><i class="fa fa-pencil-alt"></i> Modifier</button></a>

            </div>
        </div>
                    <div class="row mt-3 ">
                        <div class="col-md-4 col-sm-12">
                            <span class="f-400">Reference:</span>
                            <p>{{ $marche->reference }}</p>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <span class="f-400">Montant:</span>
                            <p>{{ $marche->montant }}  FCFA </p>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <span class="f-400">Type du marché:</span>
                            <p>{{ $marche->type_marche }}</p>
                        </div>


                    </div>


                    <div class="row ">
                        <div class="col-md-4 col-sm-12">
                            <span class="f-400">Source de financement:</span>
                            <p>{{ $marche->type_source }}</p>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <span class="f-400">Mode de passation:</span>
                            <p>{{ $marche->mode_passation }}</p>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <span class="f-400">Organe de contrôle:</span>
                            <p>{{ $marche->type_organe }}</p>
                        </div>
                    </div>



        </div>


        {{-- tab documents  --}}

        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

        <div class="d-flex justify-content-between mb-3">
            <div class="text-center text-size-md text-uppercase">Documents associés ({{ $documents->count() }} )</div>
            <!-- Button trigger modal -->
           
            <button type="button" class="btn btn-primary text-size-xs" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Nouveau document </button>
         </div>




            <table  class="table table-bordered rounded bg-white display">



                <thead class="bg-success text-white">

                    <tr>
                        <th>Reference</th>
                        <th>Type</th>
                        <th>Date ajout</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @isset($documents)
                    @foreach ($documents as  $document)
                        <tr>
                            <td>{!! $document->reference !!}</td>
                            <td>{{ $document->type_document}}</td>
                            <td>{{ $document->created_at}}</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <a href="{{ route('afficher_document',['document'=>$document->id]) }}" class="text-primary "><i
                                        class="fa fa-eye"></i></a>

                                    <a href="{{ route('telecharger_document',['document'=>$document->id]) }}" class="text-secondary "><i
                                            class="fa fa-download"></i></a>

                                    <a href="" class="text-success "><i
                                            class="fa fa-pencil-alt"></i></a>


                                    <!-- Button trigger modal -->

                                    <a href="#" class="text-danger  " type="button" data-toggle="modal"
                                        data-target=""><i class="fa fa-trash"></i></a>
                                </div>



                                <!-- Modal -->
                                {{-- \Illuminate\Support\Str::words pour
                                    pourvoir avoir un identifiant unique pour chaque modal--}}
                                <div class="modal fade rounded-0 " id="" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger m-0">

                                                <h5 class="modal-title f-400 " id="exampleModalLongTitle">
                                                    Confirmation de la suppression
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form id="" action=""
                                                    method="POST"> @csrf

                                                    <p>Etes-vous sure de vouloir supprimer le
                                                        document? : <strong
                                                            class="text-danger f-400"></strong>?
                                                    </p>
                                                    <button class="btn btn-success rounded-0 pull-right"
                                                        type="submit">Confirmer</button>
                                                    <button type="button" class="btn btn-outline-danger rounded-0 pull-right"
                                                        data-dismiss="modal">Annuler</button>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endisset
                </tbody></table>




                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title text-size-md" id="exampleModalLabel"><i class="fa fa-plus"></i> Nouveau document </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body d-flex flex-column">
                            <a href="{{ route('create_dao',['marche'=>$marche->id]) }}" class="text-success mb-2"><i class="fa fa-plus-circle"></i>&nbsp;Ajouter un dossier d'appel d'offres</a>
                            <a href="{{ route('create_aao',['marche' =>$marche->id]) }}" class="text-warning mb-2"><i class="fa fa-plus-circle"></i>&nbsp;Ajouter un avis d'appel d'offres</a>
                            <a href="javascript:void(0)" class="text-primary mb-2"><i class="fa fa-plus-circle"></i>&nbsp;Ajouter un procès verbal</a>
                        </div>

                    </div>
                    </div>
                </div>

        </div>


        {{-- criteres de selection  --}}

        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

        <div class="d-flex justify-content-between mb-3">
            <div class="text-size-md text-center text-uppercase">Critères de selection ({{ $criteres->count() }})</div>
              <a href="{{ route('create_critere',['marche'=>$marche->id]) }}" class="d-block d-flex justify-content-center text-size-xs"><button class="btn btn-primary"><i class="fa fa-plus"></i> Nouveau critère</button></a>
        </div>

            <table  class="table table-bordered rounded bg-white display">



                <thead class="bg-success text-white">
                    <tr>
                        <th>Intitule du critere</th>
                        <th>Note attribué / 100</th>
                        <th>Actions</th>
                    </tr>

                </thead>
                <tbody class="bg-white">
                    @isset($criteres)
                                @foreach ($criteres as $critere)
                                    <tr>
                                        <td >{!!  $critere->intitule !!}</td>
                                        <td>{{  $critere->note }}</td>
                                        <td>
                                            <div class="d-flex justify-content-around">

                                                <a href="" class="text-success "><i
                                                        class="fa fa-pencil-alt"></i></a>
                                                <!-- Button trigger modal -->

                                                <a href="#" class="text-danger  " type="button" data-toggle="modal"
                                                    data-target=""><i class="fa fa-trash"></i></a>
                                            </div>



                                            <!-- Modal -->
                                            {{-- \Illuminate\Support\Str::words pour
                                                pourvoir avoir un identifiant unique pour chaque modal--}}
                                            <div class="modal fade rounded-0 " id="" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger m-0">

                                                            <h5 class="modal-title f-400 " id="exampleModalLongTitle">
                                                                Confirmation de la suppression
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form id="" action=""
                                                                method="POST"> @csrf

                                                                <p>Etes-vous sure de vouloir supprimer le
                                                                    marche : <strong
                                                                        class="text-danger f-400"></strong>?
                                                                </p>
                                                                <button class="btn btn-success rounded-0 pull-right"
                                                                    type="submit">Confirmer</button>
                                                                <button type="button" class="btn btn-outline-danger rounded-0 pull-right"
                                                                    data-dismiss="modal">Annuler</button>

                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                </tbody></table>


        </div>



        {{-- Pièces à fournir  --}}

        <div class="tab-pane fade" id="piece" role="tabpanel" aria-labelledby="pieces-tab">

            <div class="d-flex justify-content-between mb-3">
            <div class="text-size-md text-center text-uppercase">Pièces à fournir ( {{ $pieces->count() }})</div>

            <a href="{{ route('create_piece',['marche'=>$marche->id]) }}" class="d-block d-flex justify-content-center text-size-xs"><button class="btn btn-primary"><i class="fa fa-plus"></i> Nouvelle pièce</button></a>
            </div>

            <table  class="table table-bordered rounded bg-white display">



                <thead class="bg-success text-white">
                    <tr>
                        <th>Intitule de la piece</th>
                        <th>Eliminatoire</th>
                        <th>Actions</th>
                    </tr>

                </thead>
                <tbody class="bg-white">
                    @isset($pieces)
                                @foreach ($pieces as  $piece)
                                    <tr>
                                        <td>{!! $piece->intitule !!}</td>
                                        <td>{{ $piece->eliminatoire==1 ? 'oui' : 'non' }}</td>
                                        <td>
                                            <div class="d-flex justify-content-around">

                                                <a href="" class="text-success "><i
                                                        class="fa fa-pencil-alt"></i></a>
                                                <!-- Button trigger modal -->

                                                <a href="#" class="text-danger  " type="button" data-toggle="modal"
                                                    data-target=""><i class="fa fa-trash"></i></a>
                                            </div>



                                            <!-- Modal -->
                                            {{-- \Illuminate\Support\Str::words pour
                                                pourvoir avoir un identifiant unique pour chaque modal--}}
                                            <div class="modal fade rounded-0 " id="" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger m-0">

                                                            <h5 class="modal-title f-400 " id="exampleModalLongTitle">
                                                                Confirmation de la suppression
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form id="" action=""
                                                                method="POST"> @csrf

                                                                <p>Etes-vous sure de vouloir supprimer le
                                                                    marche : <strong
                                                                        class="text-danger f-400"></strong>?
                                                                </p>
                                                                <button class="btn btn-success rounded-0 pull-right"
                                                                    type="submit">Confirmer</button>
                                                                <button type="button" class="btn btn-outline-danger rounded-0 pull-right"
                                                                    data-dismiss="modal">Annuler</button>

                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                </tbody></table>

        </div>


        {{-- organiser une reunion virtuelle  --}}

        <div class="tab-pane fade" id="autre" role="tabpanel" aria-labelledby="autres-tab">

        <div class="d-flex justify-content-between mb-3">
            <div class="text-size-md text-center text-uppercase">Organiser une reunion</div>

            @foreach($documents as $document)

                @if($document->type_document=="aao")
                <a href="{{ route('create_meet',['marche'=>$marche->id]) }}" class="d-block d-flex justify-content-center " ><button class="btn btn-primary rounded text-size-xs "><i class="fa fa-plus"></i> Planifier la reunion d'ouverture</button></a>

                @endif

            @endforeach

        </div>
                    <div class="mt-3">
                        <p class="fm-semibold text-size-sm">Lien d'invitation de la reunion d'ouverture</p>
        

                        @foreach($documents as $document)

                            @if($document->type_document=="aao")

                            <div class="fm-regular text-size-xs">{!! $document->meet_link !!}</div>
                            @endif

                        @endforeach
                    
                    </div>
        </div>


        <div class="tab-pane fade" id="retrait" role="tabpanel" aria-labelledby="retrait-tab">

        <div class="d-flex justify-content-between mb-3">
            <div class="text-size-md text-center text-uppercase">Retraits du DAO ( @isset($retraits){{ $retraits->count() }} @endisset)</div>

            </div>

            <table  class="table table-bordered rounded bg-white display">



                <thead class="bg-success text-white">
                    <tr>
                        <th>Nom de l'entreprise</th>
                        <th>Email</th>
                        <th>Telephone</th>
                    </tr>

                </thead>
                <tbody class="bg-white">
                    @isset($retraits)
                                @foreach ($retraits as  $retrait)
                                    <tr>
                                        <td>{{ $retrait->user()->first()->name }}</td>
                                        <td>{{ $retrait->user()->first()->email }}</td>
                                        <td>{{ $retrait->user()->first()->tel }}</td>
                                        
                                    </tr>
                                @endforeach
                            @endisset
                </tbody></table>
        </div>

        {{-- Liste des soumissionnaires --}}

        <div class="tab-pane fade" id="soumission" role="tabpanel" aria-labelledby="soumissions-tab">
        <div class="d-flex justify-content-between mb-3">
        <div class="text-size-md text-center text-uppercase">Soumissions ( {{ $soumissions->count() }})</div>
</div>
 <table  class="table table-bordered rounded bg-white display">



<thead class="bg-success text-white">
    <tr>
        <th>Nom de l'entreprise</th>
        <th>date de soumission</th>
        <th>Actions</th>
    </tr>

</thead>
<tbody class="bg-white">
    @isset($soumissions)
                @foreach ($soumissions as  $soumission)
                    <tr>
                        <td>{{ $soumission->user()->first()->name }}</td>
                        <td>{{ $soumission->date_soumission }}</td>
                        <td>
                        <a href="{{ route('ouvertureBid',['soumission' => $soumission ])}}" class="btn btn-sm btn-success"><i class="fa fa-lock"></i> Ouvrir</a>
                        <a href="{{ route('evaluationBid',['soumission' => $soumission ])}}" class="btn btn-sm btn-danger"><i class="fa fa-lock"></i> Evaluer</a>
                        </td>
                        
                    </tr>
                @endforeach
            @endisset
</tbody></table>

</div>

        </div>

</div>
@endsection
@push('scripts')
@include('layouts.admin.datatables-js')

@endpush
