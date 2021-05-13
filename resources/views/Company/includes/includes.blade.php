<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Super Stokist | Company</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{url('/')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('/')}}/dist/css/adminlte.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="{{url('/')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="{{url('/')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   <link rel="stylesheet" href="{{url('/')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini">
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

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-power-off"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{url('/')}}/assets/profiles/{{$data['profile']->user_image}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title" >
                    {{$data['profile']->user_name}}    
                </h3>
                <h3 class="dropdown-item-title" >
                    @if($data['profile']->user_type==1)
                   (Company)
                    @endif   
                    @if($data['profile']->user_type==2)
                    (Super Stalkist)
                    @endif              
                </h3>
                <div class="d-flex justify-content-center mr-2 mb-2">
                    <a href="/logout" class="">Logout</a>
                  </div>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
         
            
          <div class="dropdown-divider"></div>
         
        </div>
      </li>
     
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 fixed">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        
        <img src="{{url('/')}}/assets/logo/{{$data['logo']->logo}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        
      <span class="brand-text font-weight-light">Company</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('/')}}/assets/profiles/{{$data['profile']->user_image}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{$data['profile']->user_name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          {{-- <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item">
            @if($data['type']=="dashboard") 
            <a href="/company/dashboard" class="nav-link active">
              @else
              <a href="/company/dashboard" class="nav-link">
            @endif
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            @if($data['type']=="category") 
            <a href="/company/category" class="nav-link active">
              @else
              <a href="/company/category" class="nav-link">
            @endif
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Manage Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            @if($data['type']=="subcategory") 
            <a href="/company/subcategory" class="nav-link active">
              @else
              <a href="/company/subcategory" class="nav-link">
            @endif
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Manage Subcategory
              </p>
            </a>
          </li>
          <li class="nav-item">
            @if($data['type']=="product") 
            <a href="/company/dashboard" class="nav-link active">
              @else
              <a href="/company/dashboard" class="nav-link">
            @endif
              <i class="nav-icon fa fa-bars"></i>
              <p>
                Manage Product
              </p>
            </a>
          </li>
         
           
            @if($data['type']=="ruser") 
            <li class="nav-item menu-open">
            <a href="/company/dashboard" class="nav-link active">
            @else
            <li class="nav-item">
            <a href="/company/dashboard" class="nav-link">
            @endif
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Register user
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if($data['subtype']=="rc") 
                <a href="{{url('/company/adduser')}}" class="nav-link active">
                @else
                <a href="{{url('/company/adduser')}}" class="nav-link">
                @endif
               
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create User</p>
                </a>
              </li>
              <li class="nav-item">
                @if($data['subtype']=="rc") 
                <a href="{{url('/company/company')}}" class="nav-link active">
                @else
                <a href="{{url('/company/company')}}" class="nav-link">
                @endif
               
                  <i class="far fa-circle nav-icon"></i>
                  <p>Company</p>
                </a>
              </li>
              <li class="nav-item">
                @if($data['subtype']=="rss") 
                <a href="{{url('/company/superstokist')}}" class="nav-link active">
                @else
                <a href="{{url('/company/superstokist')}}" class="nav-link">
                @endif
               
                  <i class="far fa-circle nav-icon"></i>
                  <p>Super Stokist</p>
                </a>
              </li>
              <li class="nav-item"> 
                @if($data['subtype']=="rd") 
                <a href="{{url('/company/distributor')}}" class="nav-link active">
                @else
                <a href="{{url('/company/distributor')}}" class="nav-link">
                @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>Distributor</p>
                </a>
              </li>
              <li class="nav-item">
                @if($data['subtype']=="rr") 
                <a href="{{url('/company/retailer')}}" class="nav-link active">
                @else
                <a href="{{url('/company/retailer')}}" class="nav-link">
                @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>Retailer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Area Sales Manager</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            @if($data['type']=="order") 
            <a href="#" class="nav-link active">
              @else
              <a href="#" class="nav-link">
            @endif
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
                Manage Orders
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


@yield('content')



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018-@php echo date('Y') @endphp <a href="https://digiblade.in">Digiblade.in</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{url('/')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{url('/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('/')}}/dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{url('/')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('/')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{url('/')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{url('/')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{url('/')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{url('/')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{url('/')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{url('/')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{url('/')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{url('/')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{url('/')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{url('/')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
