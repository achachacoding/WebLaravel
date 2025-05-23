<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Web Laravel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('templateadmin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('template/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('templateadmin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('templateadmin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('templateadmin/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('templateadmin/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('templateadmin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('templateadmin/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('templateadmin/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="{{asset('templateadmin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('templateadmin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('templateadmin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Ckeditor -->
	<script type="text/javascript" src="{{asset('templateadmin/ckeditor/style.js')}}"></script>
	<script type="text/javascript" src="{{asset('templateadmin/ckeditor/ckeditor.js')}}"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <!-- Navbar -->
  @include('admin.partial.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.partial.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> @yield('judul')</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
  @include('admin.partial.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('templateadmin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('template/adminplugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('templateadmin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('templateadmin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('templateadmin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('templateadmin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('templateadmin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('templateadmin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('templateadmin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('templateadmin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('templateadmin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('templateadmin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('templateadmin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('templateadmin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('templateadmin/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('templateadmin/dist/js/pages/dashboard.js')}}"></script>
<script src="{{asset('templateadmin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('templateadmin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('templateadmin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('templateadmin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('templateadmin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('templateadmin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('templateadmin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('templateadmin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('templateadmin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('templateadmin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('templateadmin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('templateadmin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
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
</body>
</html>
