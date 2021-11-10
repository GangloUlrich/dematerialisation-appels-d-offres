<!DOCTYPE html>
<html  lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plateforme | Dashboard</title>
    <meta name="csrf_token" content="{{csrf_token()}}">


    {{-- css --}}
    @include('layouts.admin.css')

    {{-- additional css --}}
    @stack('stylesheets')
    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

</head>

<body class="hold-transition sidebar-mini layout-fixed">

     {{-- pre-loader  --}}



    <div class="wrapper ">

        <!-- Navbar -->
        @include('layouts.admin.navbar')
        <!-- /.navbar -->




        <!-- Main Sidebar Container -->
        @include('layouts.admin.sidebar')

        <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper ">

            <!-- Content Header (Page header) -->


            @yield('header')


            <!-- Main content -->
            <section class="content">


                        @yield('content')



                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy;2020 Plateforme de depouillement des offres</a>.</strong>Tous droits reservés.

        </footer>


    </div>
    <!-- ./wrapper -->

    {{-- js files  --}}

    @include('layouts.admin.js')

    {{-- additional js  --}}
    @stack('scripts')


</body>

</html>
