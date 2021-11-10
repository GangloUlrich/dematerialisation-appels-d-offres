@extends('layouts.administration')
@section('title', 'liste des comptes')


    @push('stylesheets')
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    @endpush


@section('content')

    <div class="container-fluid ">

        @if (session()->has('reponse'))

            <div class="alert alert-success" role="alert">
                <i class="fas fa-check"></i> {{ session()->get('reponse') }}
            </div>

        @endif

        <div class="card bg-white">

            <div class="card-body  border-0">
                <table id="example1" class="table  table-bordered " data-page-length='10'>
                    <thead class="">
                        <tr>
                            <th>Nom </th>
                            <th>Type</th>
                            <th>Email</th>
                            <th>Date creation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comptes as $compte)
                            <tr>
                                <td>{{ $compte->name }}</td>
                                <td>{{ $compte->type }}</td>
                                <td>{{ $compte->email }}</td>
                                <td>{{ $compte->created_at }}</td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                        <a href="" class=" btn btn-sm btn-secondary"><i class="fa fa-eye"></i> details</a>
                                        <a href="" class="btn  btn-sm btn-success "><i
                                                class="fa fa-danger"></i>Suspendre</a>
                                    </div>
                                </td>

                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>


    </div>
    </div>




@endsection

@push('scripts')

    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,

                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "paging": true,
                "language": 'French',

                "searching": true,
                "paginate": {

                    "next": "Suivant",
                    "previous": "Precedent"
                },




            });;

        });

    </script>

@endpush
