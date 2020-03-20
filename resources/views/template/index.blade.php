<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SisDenys | @yield('titulo')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/tempusdominus-bootstrap-4.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('css/icheck-bootstrap.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/adminlte.css')}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('css/sweetalert2.css')}}">
    @yield('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    @include('template.menu-superior')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('template.menu-lateral')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('conteudo')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.0.2
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


<script src="{{asset('js/jquery.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('js/jquery-ui.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.js')}}"></script>
<!-- daterangepicker -->
{{--<script src="{{asset('js/moment.js')}}"></script>--}}
{{--<script src="{{asset('js/daterangepicker.js')}}"></script>--}}
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('js/demo.js')}}"></script>
<script src="{{asset('js/sweetalert2.js')}}"></script>

@yield('scripts')
</body>
</body>
</html>
