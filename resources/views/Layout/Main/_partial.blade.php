<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <meta name="csrf-token" content="content">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('main_title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('main_assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ion Icons -->
  <link rel="stylesheet" href="{{ asset('main_assets/plugins/ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('main_assets/css/adminlte.min.css')}}">
 <!-- overlayScrollbars -->
 <link rel="stylesheet" href="{{ asset('main_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- DataTables -->
<link rel="stylesheet" href="{{ asset('main_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('main_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('main_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('main_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('main_assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('main_assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('main_assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
@livewireStyles
</head>
<body class="hold-transition sidebar-mini layout-footer-fixed layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
@include('Layout.Main.Partial._mainNavbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('Layout.Main.Partial._sidebar')
  <!-- Content Wrapper. Contains page content -->
  @yield('main_content')


  @yield('modal')

  <!-- /.content-wrapper -->
  @include('Layout.Main.Partial._footer')
  <!-- Control Sidebar -->
  @include('Layout.Main.Partial._sideControl')
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('main_assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('main_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


<!-- DataTables  & Plugins -->
<script src="{{ asset('main_assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('main_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('main_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('main_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('main_assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('main_assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('main_assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('main_assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('main_assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('main_assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('main_assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('main_assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('main_assets/plugins/select2/js/select2.full.min.js') }}"></script>
 <!-- overlayScrollbars -->
 <script src="{{ asset('main_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('main_assets/js/adminlte.min.js')}}"></script>
<!-- Page specific script -->
<script src="{{ asset('main_assets/js/modules-ion-icons.js')}}"></script>
    <!-- jQuery Mapael -->
    <script src="{{ asset('main_assets/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{ asset('main_assets/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset('main_assets/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
    <script src="{{ asset('main_assets/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
    <script src="{{ asset('main_assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>

    <!-- ChartJS -->
    <script src="{{ asset('main_assets/plugins/chart.js/Chart.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
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
    //Initialize Select2 Elements
   $('.select2').select2()

   //Initialize Select2 Elements
   $('.select2bs4').select2({
     theme: 'bootstrap4'
   })
// //Bootstrap Duallistbox
  $('.duallistbox').bootstrapDualListbox()


  });

</script>
@yield('page_javascript')
@livewireScripts
</body>
</html>
