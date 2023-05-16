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
                    <span class="brand-text font-weight-light" style="font-family: algerian;">Go-Fit</span>
                </a>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="https://img2.pngdownload.id/20180402/ufe/kisspng-cashier-computer-icons-cash-register-cashier-5ac234b84d3247.2009979915226769203162.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                    <div class="info">
                        <a href="#" class="d-block text-dark">Kasir</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ url('member') }}" class="nav-link text-dark">
                                <i class="nav-icon fa-solid fa-user-group"></i>
                                <p>Mengelola Data Member</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('aktivasi') }}" class="nav-link text-dark">
                                <i class="nav-icon fa-solid fa fa-asl-interpreting"></i>
                                <p>Aktivasi Member</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('depositReguler') }}" class="nav-link text-dark">
                                <i class="nav-icon fa-solid fa fa-credit-card"></i>
                                <p>Deposit Reguler Member</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('depositKelas') }}" class="nav-link text-dark">
                                <i class="nav-icon fa-solid fa fa-database"></i>
                                <p>Deposit Kelas Member</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('terlambat') }}" class="nav-link text-dark">
                                <i class="nav-icon fa-solid fa-stopwatch"></i>
                                <p>Terlambat Instruktur</p>
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
                <strong>Copyright &copy; {{ date('Y') }}</strong>
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