@extends('layouts.template')
@section('titre' ,"Procès-verbal d'ouverture")
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

    <div class="container p-3 mt-lg-3 d-flex flex-lg-row flex-column ">
        <div class="col-lg-3 col-sm-12  d-flex flex-column mb-md-3">
            <button class="rounded-0 btn btn-success">FILTRES AVANCES</button>

            <form action="" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Periode de </label>
                <input type="date" class="form-control" id="">
               
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Au</label>
                <input type="date" class="form-control" id="">

                
            </div>
            
            <button class="rounded-0 btn btn-success  w-100" type="submit">RECHERCHER</button>
            </form>
            
        </div>
        <div class="col-lg-9 col-md-8 ms-lg-5">
            <div class="row row-cols-1 g-4 ">
                <div class="col">
                    <div class="card">
                      <div class="card-header bg-secondary text-white">
                          <p>Nom de la structure</p>
                      </div>
                      <div class="card-body w-75 mb-0 pb-0 ">
                      
                        
                          <p class="card-title fs-6">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. lead-in to additional content. This content is a little bit longer.</p>
                          
  
                          <div class="row ">
                              <p class="fw-bolder">Reference: T_UAD_2243</p>
          
                              <div class=" col-6">
                                  <p class="fw-bolder">Date de publication</p>
                                  <small class="text-center">10-06-2021 à 10H</small>           
                              </div> 
                              
                              <div class="col-6">                        
                                  <p class="fw-bolder">Date d'ouverture</p>
                                  <small class="text-center">10-06-2021 à 10H30</small>
                              </div>
  
                           
                  
                              </div>
                              <button class="btn btn-secondary btn-sm rounded-3 mb-2"><i class="fa fa-file-pdf-o"></i> telecharger</button>
                             
                      </div>
                      <div class="bg-warning clip  py-lg-5 d-flex justify-content-center text-left ">
  
                          <div class="d-flex flex-column align-items-center p-5 px-auto text-white">
                              
                              <p>PROCES-VERBAL</p>
                              <p>D'OUVERTURE</p>
                             
                          </div>
                         
                      
                      </div>
  
                      
  
                      
  
                    </div>
                  </div>


                  <div class="col">
                    <div class="card">
                      <div class="card-header bg-secondary text-white">
                          <p>Nom de la structure</p>
                      </div>
                      <div class="card-body w-75 mb-0 pb-0 ">
                      
                        
                          <p class="card-title fs-6">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. lead-in to additional content. This content is a little bit longer.</p>
                          
  
                          <div class="row ">
                              <p class="fw-bolder">Reference: T_UAD_2243</p>
          
                              <div class=" col-6">
                                  <p class="fw-bolder">Date de publication</p>
                                  <small class="text-center">10-06-2021 à 10H</small>           
                              </div> 
                              
                              <div class="col-6">                        
                                  <p class="fw-bolder">Date d'ouverture</p>
                                  <small class="text-center">10-06-2021 à 10H30</small>
                              </div>
  
                           
                  
                              </div>
                              <button class="btn btn-secondary btn-sm rounded-3 mb-2"><i class="fa fa-file-pdf-o"></i> telecharger</button>
                             
                      </div>
                      <div class="bg-warning clip  py-lg-5 d-flex justify-content-center text-left ">
  
                          <div class="d-flex flex-column align-items-center p-5 px-auto text-white">
                              
                              <p>PROCES-VERBAL</p>
                              <p>D'OUVERTURE</p>
                             
                          </div>
                         
                      
                      </div>
  
                      
  
                      
  
                    </div>
                  </div>

                  <div class="col">
                    <div class="card">
                      <div class="card-header bg-secondary text-white">
                          <p>Nom de la structure</p>
                      </div>
                      <div class="card-body w-75 mb-0 pb-0 ">
                      
                        
                          <p class="card-title fs-6">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. lead-in to additional content. This content is a little bit longer.</p>
                          
  
                          <div class="row ">
                              <p class="fw-bolder">Reference: T_UAD_2243</p>
          
                              <div class=" col-6">
                                  <p class="fw-bolder">Date de publication</p>
                                  <small class="text-center">10-06-2021 à 10H</small>           
                              </div> 
                              
                              <div class="col-6">                        
                                  <p class="fw-bolder">Date d'ouverture</p>
                                  <small class="text-center">10-06-2021 à 10H30</small>
                              </div>
  
                           
                  
                              </div>
                              <button class="btn btn-secondary btn-sm rounded-3 mb-2"><i class="fa fa-file-pdf-o"></i> telecharger</button>
                             
                      </div>
                      <div class="bg-warning clip  py-lg-5 d-flex justify-content-center text-left ">
  
                          <div class="d-flex flex-column align-items-center p-5 px-auto text-white">
                              
                              <p>PROCES-VERBAL</p>
                              <p>D'OUVERTURE</p>
                             
                          </div>
                         
                      
                      </div>
  
                      
  
                      
  
                    </div>
                  </div>

            </div>
        </div>
    </div>
    
@endsection