@extends('layouts.template')
@section('titre' ,"Repertoire des structures")
@section('content')

    <div class="container p-3 mt-lg-3">

        <form action="">

            <div class="input-group">
                <input type="search" class="form-control" placeholder="Entrer le mot-clé ici" aria-label="votre " aria-describedby="button-addon2">
                <button class="btn btn-secondary" type="button" id="button-addon2">Rechercher</button>
                
              </div>
              <div id="emailHelp" class="form-text text-center fst-italic">EX: ASSI pour Agence Nationale pour la Sécurité des Systèmes d'Information</div>

        </form>
        

    </div>

    <div class="container mb-3">
        <div class="row row-cols-1 row-cols-md-2 g-4 ">
            <div class="col">
                <div class="card">
                  <div class="card-header bg-secondary text-white">
                      <p>Nom de la structure</p>
                  </div>
                  <div class="card-body">

                    <div class="row">
                        <div class="col-6">
                            <strong class="fw-bold">Email</strong>
                            <p>marches@structure.domaine</p>
                        </div>

                        <div class="col-6">
                            <strong>Telephone </strong>
                            <p>(+229) 68 45 45 45 / 21 32 12 25</p>
                        </div>
                    </div>

                   <strong>Responsable</strong>
                   <p>Nom et prenoms</p>

                   <strong>Site web</strong>
                   <div class="d-flex flex-row">
                           <span>https://www.structure.domaine</span><a href=""><button class="ms-2 btn btn-success btn-sm ">Visiter</button></a>                          
                   </div>
                  </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                  <div class="card-header bg-secondary text-white">
                      <p>Nom de la structure</p>
                  </div>
                  <div class="card-body">

                    <div class="row">
                        <div class="col-6">
                            <strong class="fw-bold">Email</strong>
                            <p>marches@structure.domaine</p>
                        </div>

                        <div class="col-6">
                            <strong>Telephone </strong>
                            <p>(+229) 68 45 45 45 / 21 32 12 25</p>
                        </div>
                    </div>

                   <strong>Responsable</strong>
                   <p>Nom et prenoms</p>

                   <strong>Site web</strong>
                   <div class="d-flex flex-row">
                           <span>https://www.structure.domaine</span><a href=""><button class="ms-2 btn btn-success btn-sm ">Visiter</button></a>                          
                   </div>
                  </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                  <div class="card-header bg-secondary text-white">
                      <p>Nom de la structure</p>
                  </div>
                  <div class="card-body">

                    <div class="row">
                        <div class="col-6">
                            <strong class="fw-bold">Email</strong>
                            <p>marches@structure.domaine</p>
                        </div>

                        <div class="col-6">
                            <strong>Telephone </strong>
                            <p>(+229) 68 45 45 45 / 21 32 12 25</p>
                        </div>
                    </div>

                   <strong>Responsable</strong>
                   <p>Nom et prenoms</p>

                   <strong>Site web</strong>
                   <div class="d-flex flex-row">
                           <span>https://www.structure.domaine</span><a href=""><button class="ms-2 btn btn-success btn-sm ">Visiter</button></a>                          
                   </div>
                  </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                  <div class="card-header bg-secondary text-white">
                      <p>Nom de la structure</p>
                  </div>
                  <div class="card-body">

                    <div class="row">
                        <div class="col-6">
                            <strong class="fw-bold">Email</strong>
                            <p>marches@structure.domaine</p>
                        </div>

                        <div class="col-6">
                            <strong>Telephone </strong>
                            <p>(+229) 68 45 45 45 / 21 32 12 25</p>
                        </div>
                    </div>

                   <strong>Responsable</strong>
                   <p>Nom et prenoms</p>

                   <strong>Site web</strong>
                   <div class="d-flex flex-row">
                           <span>https://www.structure.domaine</span><a href=""><button class="ms-2 btn btn-success btn-sm ">Visiter</button></a>                          
                   </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

    
    
@endsection