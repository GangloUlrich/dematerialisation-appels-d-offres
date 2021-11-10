<aside class="main-sidebar sidebar-dark-light  elevation-2">

    <div class="text-left  p-3">
        <a href="{{ route('accueil')}}" class="ml-2"><img src="{{Auth::user()->logo_path =='' ? asset('img/logo.png') : asset('img/'.Auth::user()->logo_path) }}" alt="" class="img-fluid"></a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{ route('dashboard') }}" class="nav-link ">
                        <i class="fas fa-th nav-icon"></i>
                        <p>
                            Tableau de bord

                        </p>
                    </a>

                </li>

                @if (Auth::user()->type == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('comptes') }}" class="nav-link active">

                            <i class="fas fa-users nav-icon"></i>


                            <p>
                                Comptes utilisateurs

                            </p>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->type == 's_privee' || Auth::user()->type == 's_public')




                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="fas fa-archive nav-icon"></i>
                            <p>
                                Marchés
                                {{-- <i class="fas fa-angle-left right"></i> --}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('create_marche') }}" class="nav-link active">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Creer un marché</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('liste_marche') }}" class="nav-link">
                                    <i class="fa fa-align-justify nav-icon"></i>
                                    <p>Liste des marchés</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-book nav-icon"></i>
                            <p>
                                Dossier d'appel d'offres
                                {{-- <i class="fas fa-angle-left right"></i> --}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('create_dao',['marche' => 0])}}" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Ajouter un DAO</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('create_aao',['marche'=>0]) }}" class="nav-link">
                                    <i class="fas fa-plus  nav-icon"></i>
                                    <p>Ajouter un AAO</p>
                                </a>
                            </li>



                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-poll-h"></i>
                            <p>
                                Critères de sélection

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('create_critere',['marche'=>0])}}" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Ajouter un critère  </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('create_piece',['marche'=>0])}}" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Ajouter une pièce à fournir</p>
                                </a>
                            </li>


                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-poll-h"></i>
                            <p>
                                Procès-verbaux
                                {{-- <i class="fas fa-angle-left right"></i> --}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>PV d'ouverture </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>PV d'attribution provisoire</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>PV attribution d"finitive</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-question-circle nav-icon"></i>
                            <p>
                                PREOCCUPATIONS
                                {{-- <i class="fas fa-angle-left right"></i> --}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('nouvelle_question',['user'=>Auth::user()->id,'marche'=>0]) }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Questions</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Recours</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Repondre</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-clipboard-list nav-icon"></i>
                            <p>
                                EVALUATIONS
                                {{-- <i class="fas fa-angle-left right"></i> --}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>soumissionaires</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Recours</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Repondre</p>
                                </a>
                            </li>

                        </ul>
                    </li>


                @endif

                @if (Auth::user()->type == 's_privee' || Auth::user()->type == 'c_individuel')

                    <li class="nav-header font-weight-bold">SOUMISSIONS</li>

                    <li class="nav-item">
                        <a href="{{ route('liste_retrait',['user'=>Auth::user()->id])}}" class="nav-link">
                            <i class="fas fa-clone nav-icon"></i>
                            <p>
                                liste des DAOs retirés

                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas  fa-paper-plane"></i>
                            <p>
                                Soumettre une offre

                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-align-justify nav-icon"></i>
                            <p>
                                liste des soumissions

                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-scroll nav-icon"></i>
                            <p>
                                Mes preoccupations

                            </p>
                        </a>
                    </li>

                @endif




                <li class="nav-header font-weight-bold">INFORMATIONS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user-cog nav-icon"></i>
                        <p>
                            Mettre à jour les infos

                        </p>
                    </a>
                </li>





            </ul>
            </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
