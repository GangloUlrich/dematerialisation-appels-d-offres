





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
            <a class="nav-link rounded-0 text-dark" id="pieces-tab" data-toggle="tab" href="#piece" role="tab" aria-controls="piece" aria-selected="false">Pieces à fournir</a>
        </li>

        <li class="nav-item">
            <a class="nav-link rounded-0 text-dark" id="autres-tab" data-toggle="tab" href="#autre" role="tab" aria-controls="autre" aria-selected="false">Reunion</a>
        </li>


        <li class="nav-item">
            <a class="nav-link rounded-0 text-dark" id="soumissions-tab" data-toggle="tab" href="#soumission" role="tab" aria-controls="soumission" aria-selected="false">Soumissionnaires</a>
        </li>
    </ul>

      @if (session()->has('message'))


                        <div class="alert alert-success alert-dismissible fade show " role="alert">
                            {{ session()->get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>


     @endif


    <di



        {{-- Documents associés  --}}


        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    <h4 class="text-center text-size-md text-uppercase">Documents associés ( )</h4>

                    <table  id="datatable" class=" table  table-bordered rounded bg-white w-10" data-page-length='10'>

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
                            <tr>

                            </tr>
                        </tbody></table>
        </div>

        {{-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">


                    <h4 class="text-size-md text-center text-uppercase">Critères de selection</h4>

                    <a href="{{ route('create_critere') }}"><button class="btn btn-primary rounded-0"><i class="fa fa-plus"></i> Ajouter un critere</button></a>

                    <table  class="table  table-bordered rounded bg-white w-100 " data-page-length='10'>

                        {{-- <div id="bouton" class="mb-2 float-right rounded-0"></div>

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
                                        <td>{!!  $critere->intitule !!}</td>
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
                                                pourvoir avoir un identifiant unique pour chaque modal
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

        </div> --}}


        {{-- <div class="tab-pane fade" id="piece" role="tabpanel" aria-labelledby="pieces-tab">

            <div class="card">
                <div class="card-header bg-secondary rounded-0 p-1"></div>
                <div class="card-body">
                    <h4 class="text-size-md text-center text-uppercase">Pièces à fournir</h4>

                    <a href="{{  route('create_piece') }}"><button class="btn btn-primary rounded-0"><i class="fa fa-plus"></i> Ajouter une piece</button></a>
                    <table class="table mt-3">
                        <thead class="table-secondary">
                           <tr>
                               <th>Intitule de la piece</th>
                               <th>Eliminatoire</th>
                               <th>Actions</th>
                           </tr>
                        </thead>

                        <tbody>

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
                                                pourvoir avoir un identifiant unique pour chaque modal
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




                        </tbody>
                    </table>
                </div>
            </div>

        </div> --}}


        {{-- <div class="tab-pane fade" id="autre" role="tabpanel" aria-labelledby="autres-tab">
            <div class="card">
                <div class="card-header bg-secondary rounded-0 p-1"></div>
                <div class="card-body">
                    <h4 class="text-size-md text-center text-uppercase">Organiser une reunion</h4>



                </div>

            </div>
        </div> --}}


        {{-- <div class="tab-pane fade" id="soumission" role="tabpanel" aria-labelledby="soumissions-tab">
            <div class="card">
                <div class="card-header bg-secondary rounded-0 p-1"></div>
                <div class="card-body">
                    <h4 class="text-size-md text-center text-uppercase">Liste des soumissionaires</h4>

                    <table class="table mt-3">
                        <thead class="table-secondary">
                           <tr>
                               <th>Nom de l'entreprise</th>
                               <th>Date soumission</th>
                               <th>Actions</th>
                           </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>jkvjnkrnjvkktrbknkhyk,nk,hyk,nk,yt</td>
                                <td>04/09/2018 à 10h03</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn-success rounded-0 btn" data-toggle="tooltip" data-placement="top" title="ouvrir le document"> ouvrir l'offre <i class="fa fa-lock-open"></i></button>
                                        <button class="btn-danger rounded-0 btn" data-toggle="tooltip" data-placement="top" title="evaluer ce document">Evaluer l'offre <i class="fa fa-lock"></i></button>

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div> --}}
    </div>
@endsection

@push('scripts')
@include('layouts.admin.datatables-js')

@endpush



