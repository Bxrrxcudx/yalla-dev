<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard | Yalla ! pour les Enfants</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <!-- TinyMCE WYSIWYG -->
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>

    <!-- Select2.js -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />


</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
            <!-- mini logo for sidebar mini 50x50 pixels -->
        <a href="{{ url('admin/home') }}" class="logo">
            <span class="logo-mini"><b>Yalla !</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Yalla ! enfants</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="user user-menu">
                        <a href="#" class="dropdown-toggle">
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                    </li>
                    <li class="user user-menu">
                        <a href="{{ url('admin/logout') }}" class="dropdown-toggle" > Déconnexion</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                    <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">NAVIGATION</li>
                <li>
                    <a href="{{ route('messages.index') }}">
                        <i class="fa fa-envelope"></i>
                        <span>Messages</span>
                        {{--<span class="pull-right-container">
                          <small class="label pull-right bg-yellow">12</small>
                        </span>--}}
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{ route('newsletters.index') }}">
                        <i class="fa fa-pie-chart"></i>
                        <span>Abonnés Newsletter</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Actualités</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('news.index') }}"><i class="fa fa-circle-o"></i> Toutes les actualités </a></li>
                        <li><a href="{{ route('news.create') }}"><i class="fa fa-circle-o"></i> Ajouter une Actualité </a></li>
                        <li><a href="{{ route('categories.index') }}"><i class="fa fa-circle-o"></i> Catégories </a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Pages</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('pages.create') }}"><i class="fa fa-circle-o"></i> Ajouter une page </a></li>
                        <li><a href="{{ route('pages.index') }}"><i class="fa fa-circle-o"></i> Toutes les pages</a></li>
                    </ul>
                </li>
                {{--<li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Adhérents Yalla !</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('admin/subscribers/add') }}"><i class="fa fa-circle-o"></i> Ajouter un membre </a></li>
                        <li><a href="{{ url('admin/subscribers') }}"><i class="fa fa-circle-o"></i> Tous les adhérents </a></li>
                    </ul>
                </li>--}}
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

@yield('content')

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2017 <a href="{{ url('/') }}">Yalla ! pour les Enfants </a>.</strong> All rights
        reserved.
    </footer>
    <div class="control-sidebar-bg"></div>
</div>
    <!-- jQuery 2.2.3 -->
    <script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/app.min.js') }}"></script>
    <!-- Custom TinyMCE WYSIWYG -->
    <script src="{{ asset('dist/js/tiny.js') }}"></script>

@yield('scripts')
</body>
</html>