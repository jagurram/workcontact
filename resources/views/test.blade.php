<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="_token" content="{{ csrf_token() }}">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Work Contact</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
  <!-- Bootstrap 4 -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- DataTable.net -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <!-- bootstrap wysihtml5 - text editor -->
   <link rel="stylesheet" href="{{ asset('css/bootstrap3-wysihtml5.min.css') }}">

    <!-- DateTimePicker  -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{ asset('adminlte/css/skins/skin-blue.min.css') }}">
  <link href="{{ asset('adminlte/css/select2.min.css') }}" rel="stylesheet" />
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>W</b>C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Work</b>Contact</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

        @yield('navbar')

        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          <li class="active"><a href="/admin"><i class="fa fa-link"></i> <span>Home</span></a></li>

          <li class="treeview">
          <a href="#">
            <!-- indiquer ici quel icone affiché -->

            <span> Contacts </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="/admin/contacts"><i class="fa fa-circle-o"></i> List</a></li>
            <li><a href="/admin/contacts/create"><i class="fa fa-circle-o"></i> Create</a></li>

          </ul>
        </li>

          <li class="treeview">
          <a href="#">
            <!-- indiquer ici quel icone affiché -->

            <span> Entreprises </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/entreprises"><i class="fa fa-circle-o"></i> List</a></li>
            <li><a href="/admin/entreprises/create"><i class="fa fa-circle-o"></i> Create</a></li>
          </ul>
        </li>

          <li class="treeview">

                  <!-- indiquer ici quel icone affiché -->

                  <span> Documents </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>

          </li>

          <li class="treeview">
              <a href="#">
                  <!-- indiquer ici quel icone affiché -->

                  <span> Offre d'emplois </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="/admin/entreprises"><i class="fa fa-circle-o"></i> List</a></li>
                  <li><a href="/admin/entreprises/create"><i class="fa fa-circle-o"></i> Create</a></li>
              </ul>
          </li>

          <li class="treeview">
              <a href="#">
                  <!-- indiquer ici quel icone affiché -->

                  <span> Candidatures </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="/admin/entreprises"><i class="fa fa-circle-o"></i> List</a></li>
                  <li><a href="/admin/entreprises/create"><i class="fa fa-circle-o"></i> Create</a></li>
              </ul>
          </li>

          <li class="treeview">
              <a href="#">
                  <!-- indiquer ici quel icone affiché -->

                  <span> Formations </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="/admin/entreprises"><i class="fa fa-circle-o"></i> List</a></li>
                  <li><a href="/admin/entreprises/create"><i class="fa fa-circle-o"></i> Create</a></li>
              </ul>
          </li>

          <li class="treeview">
              <a href="#">
                  <!-- indiquer ici quel icone affiché -->

                  <span> Recrutement/Cooptation </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="/admin/entreprises"><i class="fa fa-circle-o"></i> List </a></li>
                  <li><a href="/admin/entreprises/create"><i class="fa fa-circle-o"></i> Recherche</a></li>
              </ul>
          </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    @yield('content-header')

    </section>

    <!-- Main content -->
    <section class="content">

    @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.2
    </div>
    <strong>Copyright &copy; 2019-2020 <a href="https://adminlte.io">Work Contact</a>.</strong> All rights
    reserved.

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



<!-- jQuery 3 -->
<script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- Bootstrap 4 -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

<!-- AdminLTE App -->
<script src="{{ asset('adminlte/js/adminlte.min.js')}}"></script>
<!-- Select2  -->
<script src="{{ asset('adminlte/js/select2.min.js') }}"></script>
<!-- DatePicker -->
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

<!-- Input Phone Controle -->
<script src="{{ asset('js/jquery.inputmask.js') }}"></script>


<!-- DataTables.net -->
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('js/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- DateTimePicker -->
<script src="{{ asset('js/bootstrap-datetimepicker.min.js')}}"></script>



<!-- <script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script> -->

@yield('js_script')

</body>
</html>
