<nav class="main-header navbar navbar-expand navbar-dark bg-success sticky-top ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">{{ Auth::user()->name }}</a>
        </li>

    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link"></a>
        </li>

        <!-- Notifications Dropdown Menu -->
        
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>



        <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link text-white" type="button" data-toggle="modal"
                data-target="#modal-default"><i class="fas fa-sign-out-alt"></i>Deconnexion</a>

        </li>




    </ul>
</nav>



<div class="modal fade rounded-0 " id="modal-default" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-marche" role="document">
                                    <div class="modal-content ">
                                        <div class="modal-header d-flex justify-content-center m-0">
                                            <div class="text-center fm-semibold text-size-md ps-5 text-danger">Alerte</div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
                                            </button>
                                        </div>
                                        <div class="modal-body p-3 text-center d-flex flex-column justify-content-center">


                                                <div class="py-5 text-size-sm fm-regular ">Etes-vous sure de vouloir vous deconnecter?</div>

                                                <div class="d-flex justify-content-center">
                                                <div class="row">
                                                    <div class="col-6"><button type="button" class="btn btn-danger rounded-pill px-3 " data-dismiss="modal">Annuler</button></div>
                                                    <div class="col-6">
                                                        <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><button type="button" class=" btn btn-success rounded-pill px-3  text-white">Confirmer</button></a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </div>
                                                </div>
                                        </div>

                                        </div>

                                    </div>
                                </div>
                            </div>