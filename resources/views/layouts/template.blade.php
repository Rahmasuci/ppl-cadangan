<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Distribution</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <link rel="stylesheet" href="{{ asset ('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset ('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset ('bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
        <link rel="stylesheet" href="{{ asset ('dist/css/skins/skin-green.min.css') }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>D</b>BN</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Distribution</b></span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
             <a class="nav-link" href="{{route('make.klien')}}">Registrasi</a>
           </li>
           @else
           <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
             @if(Auth::user()->role == 'pembeli')
             {{ Auth::user()->pelanggan->nama }} <span class="caret"></span>
             @elseif(Auth::user()->role == 'admin')
             {{ Auth::user()->email }} <span class="caret"></span>
             @else(Auth::user()->role == 'supplier')
             {{ Auth::user()->supplier->nama_supplier }} <span class="caret"></span>
             @endif
           </a>

           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>
      @endguest
    </ul>
  </div>
</nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
 <!-- sidebar: style can be found in sidebar.less -->
 <section class="sidebar">
  <!-- Sidebar Menu -->
  <form>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
       <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> <span>Dahsboard</span></a></li>
      @if(Auth::user()->role == 'admin')
      <li><a href="{{url('/product')}}"><i class="fa fa-tag"></i> <span>Product</span></a></li>
      <li><a href="{{url('/order')}}"><i class="fa fa-shopping-cart"></i> <span>Order</span></a></li>
      <li><a href="{{ route('penawaran.index') }}"><i class="fa fa-paper-plane"></i> <span>Penawaran</span></a></li>
{{--       <li><a href="{{ route('pengajuan.index') }}"><i class="fa fa-paper-plane-o"></i> <span>Pengajuan</span></a></li>
 --}}   <li class="treeview">
        <a href="#"><i class="fa fa-users"></i> <span>Supplier</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('supplier.index') }}">List Supplier</a></li>
          <li><a href="{{ route('supplier.create') }}">Tambah Supplier</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-files-o"></i> <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/laporan') }}">Tahunan</a></li>
          <li><a href="{{ url('/bulan') }}">Bulanan</a></li>
        </ul>
      </li>
     

      @elseif(Auth::user()->role == 'supplier')
      <li><a href="{{ route('penawaran.index') }}"><i class="fa fa-paper-plane"></i> <span>Penawaran</span></a></li>
      <li><a href="{{ route('pengajuan.index') }}"><i class="fa fa-paper-plane-o"></i> <span>Pengajuan</span></a></li>
      <li class="header">SETTING</li>
      <li><a href="{{ url('/profile') }}"><i class="fa fa-user"></i> <span>Profile</span></a></li>

      @elseif(Auth::user()->role == 'pembeli')
      <li><a href="{{url('/order')}}"><i class="fa fa-shopping-cart"></i> <span>Order</span></a></li>
        <li class="header">SETTING</li>
        <li><a href="{{ url('/profile') }}"><i class="fa fa-user"></i> <span>Profile</span></a></li>
      @endif
    </ul>
  </form>
    

    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" >
  @yield('content')
</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="pull-right hidden-xs">
    Anything you want
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
</footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->


{{-- <script src="{{ asset ('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset ('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset ('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset ('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset ('bower_components/chart.js/Chart.js') }}"></script> --}} --}}

<!-- jQuery 3 -->
<!-- ChartJS -->
{{-- <script src="{{ asset ('js/chart.js/Chart.js') }}"></script> --}}
<script src="{{ asset ('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset ('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset ('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('dist/js/adminlte.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset ('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap  -->
<script src="{{ asset ('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset ('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset ('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="bower_components/chart.js/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

     @stack('script')

   </body>
   </html>