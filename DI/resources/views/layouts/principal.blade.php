<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @if (! config('app.debug', true))
    <link rel="stylesheet" href="{{ asset('css/admin-all.css') }}">
    @else
    <!-- Vendors -->
    <link rel="stylesheet" href="{{ asset('css/admin-vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-custom.css') }}">
    @endif

    @yield('css')

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>Sa</b>I</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Sales</b>In</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only"></span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The -xs hides the username on small devices so only the image appears. -->
                                @Logged()
                                {{ auth()->user()->name }}</span>&nbsp
                                <span class="caret"></span>
                                @else
                                <span class="caret"></span>
                                @endLogged()
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    @Logged()
                                    <p>
                                        {{ auth()->user()->email }} <br />
                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer" style="height:75px;padding-top:20px;">
                                    <div class="pull-left">
                                        <a href="{{ url('/') }}" class="btn btn-info btn-flat" style="width:120px">Mi página principal</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('logout') }}"
                                        style="width:120px"
                                            class="btn btn-danger btn-flat"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Desloguearse
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                                @else
                                <p>
                                    Debes iniciar sesión
                                    para tener acceso a todo el contenido <br />
                                </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer" style="height:75px;padding-top:20px;">
                            <div style="text-align:center">
                                <a href="{{ url('login') }}" class="btn btn-info btn-flat">Iniciar sesión</a>
                            </div>
                        </li>
                        @endLogged()

                    </ul>
                    </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->

                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="" width="160" height="160" class="img-circle" alt="">
                    </div>
                    <div class="pull-left info">
                        @Logged()
                        <p class="user-panel-name">{{ Auth::user()->name }} </p>
                        @else
                        <p>
                            <small><a href="{{ url('login') }}"> <span>Inicia sesión</span></a></small>
                        </p>
                        @endLogged()
                    </div>
                </div>

                @include('commun.menu')

            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('page-header', '')
            </section>

            <!-- Main content -->
            <section class="content">

                @yield('content')

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <!-- Default to the left -->
            <strong>Copyright &copy; {{ date('Y') }} 2ºDAM.</strong> All rights reserved.
        </footer>

    </div>
    <!-- ./wrapper -->

    @if (config('app.debug', true))
    <!-- Vendors -->
    <script src="{{ asset('js/admin-vendor.js') }} "></script>
    <script src="{{ asset('js/admin-custom.js') }} "></script>
    @else
    <script src="{{ asset('js/admin-all.js') }} "></script>
    @endif


    @yield('js')
</body>

</html>