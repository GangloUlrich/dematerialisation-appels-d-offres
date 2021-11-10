@extends('layouts.administration')
@section('title',"liste des dossiers d'appels d'offres")


@push('stylesheets')
    <link rel="stylesheet" href="{{ asset("plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{ asset("plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{ asset("plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">

@endpush
@section('content')


    


<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection

@push('scripts')

<script src="{{ asset("plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{ asset("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{ asset("plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{ asset("plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
<script src="{{ asset("plugins/datatables-buttons/js/dataTables.buttons.min.js")}}"></script>
<script src="{{ asset("plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}"></script>
<script src="{{ asset("plugins/jszip/jszip.min.js")}}"></script>
<script src="{{ asset("plugins/pdfmake/pdfmake.min.js")}}"></script>
<script src="{{ asset("plugins/pdfmake/vfs_fonts.js")}}"></script>
<script src="{{ asset("plugins/datatables-buttons/js/buttons.html5.min.js")}}"></script>
<script src="{{ asset("plugins/datatables-buttons/js/buttons.print.min.js")}}"></script>
<script src="{{ asset("plugins/datatables-buttons/js/buttons.colVis.min.js")}}"></script>
    
@endpush