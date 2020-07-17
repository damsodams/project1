<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/jqvmap/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{url('plugins/summernote/summernote-bs4.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>
      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="{{url('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Trouve Ton Dev</span>
      </a>
      <?php $user = auth()->user();?>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{url('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{$user->name}}</a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Utilisateurs
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('developpeur.index')}}" id="navDev" class="nav-link">
                    <i class="far fa fa-terminal"></i>
                    <p>Développeurs</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('entreprise.index')}}" id="navEnt" class="nav-link">
                    <i class="far fa fa-briefcase"></i>
                    <p>Entreprises</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('utilisateur.index')}}" id="navUse" class="nav-link">
                    <i class="far fa fa-user"></i>
                    <p>Utilisateurs</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="pages/widgets.html" class="nav-link">
                <i class="fa fa-file-text-o"></i>
                <p>
                  Offres
                  <!--  <span class="right badge badge-danger">New</span>-->
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <!--<h1 class="m-0 text-dark">Dashboard</h1>-->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- Main content -->
      @section("content")

      @show
    </div>
    <!-- ./wrapper -->
    <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{url('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('plugins/chart.js/Chart.min.js')}}"></script>
    <script src="{{url('plugins/sparklines/sparkline.js')}}"></script>
    <script src="{{url('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{url('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <script src="{{url('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <script src="{{url('plugins/moment/moment.min.js')}}"></script>
    <script src="{{url('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{url('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="{{url('dist/js/adminlte.js')}}"></script>
    <script src="{{url('dist/js/pages/dashboard.js')}}"></script>
    <script src="{{url('dist/js/demo.js')}}"></script>
    <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{url('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

    <script>
    $(function () {
      bsCustomFileInput.init();
    });
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
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
