@extends('layouts.template')
@section('titre' ,"Procès-verbal d'attribution définitive")
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
        <div class="col-lg-9 col-md-12 ms-lg-5">
            <div class="row row-cols-1 g-4 ">
                <div class="col">
                  <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <p>Nom de la structure</p>
                    </div>
                    <div class="card-body w-75 pb-0 mb-0">
                    
                      
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

                            <p class=" mt-2 fw-bold ">Attributaires</p>
                
                            </div>
                           
                    </div>
                    <div class="bg-primary clip w-25 py-lg-5 d-flex justify-content-center text-left ">

                        <div class="d-flex flex-column align-items-center p-5 px-auto text-white">
                            
                            <p>PROCES-VERBAL</p>
                            <p>D'ATTRIBUTION</p>
                            <p>DEFINITIVE</p>
                        </div>
                       
                    
                    </div>

                    

                    <div class="card-footer bg-success text-white mt-0 pb-1 d-flex flex-row align-items-center p-index border-0">

                        <div class="col-4">

                        </div>

                        <div class="col-4">
                            <p class="fw-bold">ADS SARL</p>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <button class="btn btn-sm btn-light rounded-2"><i class="fa fa-file-pdf-o"></i> telecharger</button>
                        </div>


                    </div>

                  </div>
                </div>

                <div class="col">
                    <div class="card">
                      <div class="card-header bg-secondary text-white">
                          <p>Nom de la structure</p>
                      </div>
                      <div class="card-body w-75 pb-0 mb-0">
                      
                        
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
  
                              <p class=" mt-2 fw-bold ">Attributaires</p>
                  
                              </div>
                             
                      </div>
                      <div class="bg-primary clip w-25 py-lg-5 d-flex justify-content-center text-left ">
  
                          <div class="d-flex flex-column align-items-center p-5 px-auto text-white">
                              
                              <p>PROCES-VERBAL</p>
                              <p>D'ATTRIBUTION</p>
                              <p>DEFINITIVE</p>
                          </div>
                         
                      
                      </div>
  
                      
  
                      <div class="card-footer bg-success text-white mt-0 pb-1 d-flex flex-row align-items-center p-index border-0">
  
                          <div class="col-4">
  
                          </div>
  
                          <div class="col-4">
                              <p class="fw-bold">ADS SARL</p>
                          </div>
                          <div class="col-4 d-flex justify-content-end">
                              <button class="btn btn-sm btn-light rounded-2"><i class="fa fa-file-pdf-o"></i> telecharger</button>
                          </div>
  
  
                      </div>
  
                    </div>
                  </div>

                  <div class="col">
                    <div class="card">
                      <div class="card-header bg-secondary text-white">
                          <p>Nom de la structure</p>
                      </div>
                      <div class="card-body w-75 pb-0 mb-0">
                      
                        
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

                              
  
                              <p class=" mt-2 fw-bold ">Attributaires</p>
                  
                              </div>
                             
                      </div>
                      <div class="bg-primary clip w-25 py-lg-5 d-flex justify-content-center text-left ">
  
                          <div class="d-flex flex-column align-items-center p-5 px-auto text-white">
                              
                              <p>PROCES-VERBAL</p>
                              <p>D'ATTRIBUTION</p>
                              <p>DEFINITIVE</p>
                          </div>
                         
                      
                      </div>
  
                      
  
                      <div class="card-footer bg-success text-white mt-0 pb-1 d-flex flex-row align-items-center p-index border-0">
  
                          <div class="col-4">
  
                          </div>
  
                          <div class="col-4">
                              <p class="fw-bold">ADS SARL</p>
                          </div>
                          <div class="col-4 d-flex justify-content-end">
                              <button class="btn btn-sm btn-light rounded-2"><i class="fa fa-file-pdf-o"></i> telecharger</button>
                          </div>
  
  
                      </div>
  
                    </div>
                  </div>

            </div>
        </div>
    </div>
    
@endsection