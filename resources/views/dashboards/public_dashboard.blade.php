
<div class="container-fluid">

  <div class="row">


      <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box shadow-none">
            <span class="info-box-icon bg-secondary"><i class="fas fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">DAOs</span>
              <span class="info-box-number">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>


      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box shadow-none">
          <span class="info-box-icon bg-secondary"><i class="fas fa-tag"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Marchés en cours</span>
            <span class="info-box-number">0</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box shadow-none">
            <span class="info-box-icon bg-secondary"><i class="fas fa-folder"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Marchés attribués</span>
              <span class="info-box-number">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>


        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box shadow-none">
            <span class="info-box-icon bg-secondary"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Soumisionnaires</span>
              <span class="info-box-number">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>



  </div>
</div>




<div class="container-fluid">
  <div class="row">


      <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box shadow-none">
            <span class="info-box-icon bg-success"><i class="fas fa-poll-h"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">PV ouverture</span>
              <span class="info-box-number">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>


      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box shadow-none">
          <span class="info-box-icon bg-success"><i class="fas fa-poll-h"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">PV attribution provisoire</span>
            <span class="info-box-number">0</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box shadow-none">
            <span class="info-box-icon bg-success"><i class="fas fa-poll-h"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">PV attribution definitive</span>
              <span class="info-box-number">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>


        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box shadow-none">
            <span class="info-box-icon bg-success"><i class="fas fa-question-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Preoccupations</span>
              <span class="info-box-number">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>



  </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
                <div class="card-header border-transparent bg-success rounded-0">
                    <h3 class="card-title">Marches recents</h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>Reference</th>
                                    <th>Intitule</th>
                                    <th>Nbre Soumission</th>
                                    <th>statut</th>

                                </tr>
                            </thead>
                            <tbody>

                                @isset($marches)

                                @foreach ($marches as $marche )
                                    <tr>
                                        <td>{{ $marche->reference }}</td>
                                        <td>{{ $marche->intitule }}</td>
                                        <td>0</td>
                                        <td><button class="btn btn-warning">{{ $marche->statut }}</button></td>
                                    </tr>
                                @endforeach

                                @endisset

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
            </div>
            </div>

        </div>

    </div>


</div>
