<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SunTour Control-Panal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('files/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('files/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{asset('AdminLTE-2.3.0/plugins/sweetalert/sweetalert.css')}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
    #sideee{
      position: fixed;
    }
    #side {
    overflow: scroll;
    overflow-x: hidden;
    height: 590px;
  }
  </style>
</head>
<body class="hold-transition sidebar-mini">


<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside id="sideee" class=" main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url(route('home'))}}" class="brand-link">
      <img src="{{asset('uploads/icons/logo-white.png')}}"
           alt="AdminLTE Logo"
           class="brand-image elevation-3"
           style="opacity: .8">
      <span style="font-size:10px;" class="brand-text font-weight-light">Control Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{auth()->user()->photo}}" style="width: 50px; height: 50px;" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info" style="width: 150px; ">
          <a href="{{url(route('user-my-information'))}}" class="d-block mt-1" style=" font-size: 20px;"> {{auth()->user()->name}} </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav id="side" class="mt-2a">
        <ul class="nav nav-pills nav-sidebar flex-column scrollmenu" data-widget="treeview" role="menu" data-accordion="false">
          
        <!--<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Posts
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> -->

          <li class="nav-item">
            <a href="{{url(route('home'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>DashBoard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('users.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Users</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('user-my-information'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p> My Information</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('user-change-password'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Change Password</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('hotels.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Hotels</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('rooms.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Rooms</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('offers.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Offers</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('clients.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Clients</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('reservations.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Reservations</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('categories.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Categories</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('countries.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Countries</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('governorates.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Governorates</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('headers.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Headers</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('sections.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Sections Amenity</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('amenities.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Amenities</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('payment-methods.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Payment Methods</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('comments.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Comments</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('contact.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Contact Us</p>
            </a>
          </li>


          

          <li class="nav-item">
            <a href="{{url(route('settings.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Settings</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url(route('user-logout'))}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Logout</p>
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
        <section class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h1>@yield('page_title')</h1>
              </div>
            </div>  
        </section>

    @yield('content')

   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    <!--<b>Version</b> 3.0.2 -->
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('files/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="{{asset('files/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('files/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('files/js/demo.js')}}"></script>

<script src="{{asset('files/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('files/plugins/jquery-confirm/jquery.confirm.min.js')}}"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>


@stack('scripts')

</body>
</html>
