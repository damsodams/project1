<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Timeline</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{url('css/perso.css')}}">
  <link rel="stylesheet" href="{{url('scss/perso.scss')}}">
  <link rel="stylesheet" href="{{url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{route('home')}}" class="nav-link">Home</a>
        </li>
        <!--  <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">filtres</a>
      </li>-->
    </ul>
    <?php $user = auth()->user();?>
    <!-- Recherche par titre -->
    <form method="post" action="{{route('recherche')}}" class="form-inline ml-3">
      @csrf
      <div class="input-group input-group-sm">
        <input name="search"  class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <ul class="navbar-nav ml-auto">
      @if (isset($user->name))
        @if ($user->statut == "admin")
          <li class="nav-item">
            <a class="dropdown-item" href="{{ route('backo') }}">
              <i class="fas fa-user-cog"></i>
            </a>
          </li>
        @endif
        <li class="nav-item">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Se déconnecter</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        @endif
      </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="#" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Trouve Ton Dev</span>
      </a>
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            @if (isset($user->name))
              @if ($user->statut == "entreprise")
                <img src="{{url($user->entreprise->logo)}}" class="img-circle elevation-2" alt="User Image">

              @elseif ($user->statut == "dev")
                <img src="{{url($user->developpeur->photo)}}" class="img-circle elevation-2" alt="User Image">
              @elseif ($user->statut == "admin")
                <img src="{{url('/images/admin.png')}}" class="img-circle elevation-2" alt="User Image">
              @endif
            @else
              <img src="{{url('/images/ghest.png')}}" class="img-circle elevation-2" alt="User Image">
            @endif
          </div>
          <div class="info">
            @if (isset($user->name))
              <a href="#" class="d-block">{{$user->name}}</a>
            @else
              <a href="{{ route('login') }}" class="d-block">Connection</a>
            @endif
          </div>
        </div>
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if (isset($user->name))
              @if ($user->statut == "entreprise")
                <li class="nav-item">
                  <a href="{{route('mail_index')}}" class="nav-link @section('activemail') @show">
                    <i class="fas fa-mail-bulk"></i>
                    <p>Mes Mails</p>
                    @php $i=0; @endphp
                    @foreach ($user->entreprise->offres as $offre)
                      @if (isset($offre->Postuler_Offre))
                        @foreach ($offre->Postuler_Offre as $post)
                          @if ($post->statut == "1")
                            @php
                            $i++;
                            @endphp
                          @endif
                        @endforeach
                      @endif
                    @endforeach
                    @if ($i != 0)
                      <span class="badge badge-danger right">{{$i}}</span>
                    @endif
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('ajaxRequest.index')}}" class="nav-link @section('activemail') @show">
                    <i class="fa fa-comments"></i>
                    <p>Mes Conversation</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('offre_entreprise.create')}}" class="nav-link @section('activedof') @show">
                    <i class="fas fa-plus-square"></i>
                    <p>Déposer une offre</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('offre_entreprise.index')}}" class="nav-link @section('activegof') @show">
                    <i class="fa fa-barcode"></i>
                    <p>Gestion de mes offres</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('projet_index')}}" class="nav-link @section('activepro') @show">
                    <i class="fas fa-tasks"></i>
                    <p>Mes projets en cours</p>
                  </a>
                </li>
              @elseif ($user->statut == "dev")

                <li class="nav-item">
                  <a href="{{route('profil_show')}}" class="nav-link @section('activemde') @show">
                    <i class="fas fa-address-card"></i>
                    <p>Mon Profil</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link @section('activempr') @show">
                    <i class="fas fa-laptop-code"></i>
                    <p>Mes Projets</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('ajaxRequestDev.index')}}" class="nav-link @section('activemail') @show">
                    <i class="fa fa-comments"></i>
                    <p>Mes Conversation</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('index_offre')}}" class="nav-link @section('activemde') @show">
                    <i class="fas fa-hourglass-half"></i>
                    <p>Mes Demandes</p>
                  </a>
                </li>
              @endif
            @endif
          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">
      @if (isset($countOffres))
        @if ($countOffres == 0)
          <h3 style="color : red;">Aucune offre trouvé</h1>
        @else
          <h3 style="color : green;">{{$countOffres}} Offre trouvé</h1>
        @endif


      @endif
      <section class="content">
        <div class="container-fluid">
          @section("content")
          @show
        </div>
      </section>
    </div>
  </div>
  <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
  <script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('dist/js/adminlte.min.js')}}"></script>
  <script src="{{url('dist/js/demo.js')}}"></script>
  <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
  <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
  <script src="{{url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <script src="{{url('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
  <script src="{{url('plugins/raphael/raphael.min.js')}}"></script>
  <script src="{{url('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
  <script src="{{url('plugins/chart.js/Chart.min.js')}}"></script>
  <script src="{{url('dist/js/pages/dashboard2.js')}}"></script>


  <script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

  <script>
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
