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
        <div class="row row-cols-1 row-cols-md-3 g-4 ">

        @isset($structures)
        
        @foreach($structures as $structure)
        <div class="col">
                <div class="card card-struct">
                  <div class="card-header bg-secondary text-white">
                      <p>{{$structure ->name}}</p>
                  </div>
                  <div class="card-body">

                    <div class="row">
                        <div class="col-7">
                            <strong class="fw-bold">Email</strong>
                            <p>{{$structure->email}}</p>
                        </div>

                        <div class="col-5">
                            <strong>Telephone </strong>
                            <p>{{$structure->tel}}</p>
                        </div>
                    </div>

                    @isset($structure->website)
                   <strong>Site web</strong>

                   <div class="d-flex flex-row">
                           <span>{{$structure->website}}</span><a href=""><button class="ms-2 btn btn-success btn-sm ">Visiter</button></a>                          
                   </div>
                   @endisset
                  </div>
                </div>
            </div>
        @endforeach
        @endisset
           
        </div>
    </div>

    
    
@endsection