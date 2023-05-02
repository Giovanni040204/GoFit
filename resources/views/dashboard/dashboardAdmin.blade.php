<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initialscale=1">
        <title>GoFit | P3L_10835</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>
            </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary bg-danger elevation-4">
                <!-- Brand Logo -->
                <a href="#" class="brand-link">
                    <img src="https://i.pinimg.com/originals/dc/0e/36/dc0e36c68fe8c0ab31bc8241f081c6b6.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight" style="font-family: algerian; font-color:black;">Go-Fit</span>
                </a>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="data:image/png;base64,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" class="img-circle elevation-2" alt="User Image">
                        </div>
                    <div class="info">
                        <a href="#" class="d-block text-dark">Admin</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ url('pegawai') }}" class="nav-link text-dark">
                                <i class="nav-icon fa fa-male"></i>
                                <p>Mengelola Data Pegawai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('promo') }}" class="nav-link text-dark">
                                <i class="nav-icon fa fa-bookmark"></i>
                                <p>Mengelola Data Promo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('instruktur') }}" class="nav-link text-dark">
                                <i class="nav-icon fa fa-users"></i>
                                <p>Mengelola Data Intruktur</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('logout') }}" class="nav-link text-dark">
                                <i class="nav-icon fa-solid fa-right-from-bracket"></i>
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
                @yield('content')
            </div>
            <!-- /.content-wrapper -->
            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline"> 200710835</div>
                <!-- Default to the left -->
                <strong>Copyright &copy; {{ date('Y') }}
            </footer>
        </div>
        <!-- ./wrapper -->
        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('plugins/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('js/adminlte.min.js') }}"></script>
        
        <script src="resources/js/app.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
    <script>
        @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
</html>