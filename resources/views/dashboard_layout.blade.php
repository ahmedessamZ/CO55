<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Co55 Dashboard</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/adminlte.min.css') }}" type="text/css" rel="stylesheet">

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
{{--            <li class="nav-item d-none d-sm-inline-block">--}}
{{--                <a href="#" class="nav-link">Home</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item d-none d-sm-inline-block">--}}
{{--                <a href="#" class="nav-link">Contact</a>--}}
{{--            </li>--}}
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" data-widget="navbar-search" href="#" role="button">--}}
{{--                    <i class="fas fa-search"></i>--}}
{{--                </a>--}}
{{--                <div class="navbar-search-block">--}}
{{--                    <form class="form-inline">--}}
{{--                        <div class="input-group input-group-sm">--}}
{{--                            <input class="form-control form-control-navbar" type="search" placeholder="Search"--}}
{{--                                   aria-label="Search">--}}
{{--                            <div class="input-group-append">--}}
{{--                                <button class="btn btn-navbar" type="submit">--}}
{{--                                    <i class="fas fa-search"></i>--}}
{{--                                </button>--}}
{{--                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">--}}
{{--                                    <i class="fas fa-times"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </li>--}}

            <!-- Messages Dropdown Menu -->
{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link" data-toggle="dropdown" href="#">--}}
{{--                    <i class="far fa-comments"></i>--}}
{{--                    <span class="badge badge-danger navbar-badge">3</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <!-- Message Start -->--}}
{{--                        <div class="media">--}}
{{--                            <img src="#" alt="User Avatar" class="img-size-50 mr-3 img-circle">--}}
{{--                            <div class="media-body">--}}
{{--                                <h3 class="dropdown-item-title">--}}
{{--                                    Brad Diesel--}}
{{--                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>--}}
{{--                                </h3>--}}
{{--                                <p class="text-sm">Call me whenever you can...</p>--}}
{{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Message End -->--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <!-- Message Start -->--}}
{{--                        <div class="media">--}}
{{--                            <img src="#" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
{{--                            <div class="media-body">--}}
{{--                                <h3 class="dropdown-item-title">--}}
{{--                                    John Pierce--}}
{{--                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>--}}
{{--                                </h3>--}}
{{--                                <p class="text-sm">I got your message bro</p>--}}
{{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Message End -->--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <!-- Message Start -->--}}
{{--                        <div class="media">--}}
{{--                            <img src="#" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
{{--                            <div class="media-body">--}}
{{--                                <h3 class="dropdown-item-title">--}}
{{--                                    Nora Silvester--}}
{{--                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>--}}
{{--                                </h3>--}}
{{--                                <p class="text-sm">The subject goes here</p>--}}
{{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Message End -->--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>--}}
{{--                </div>--}}
{{--            </li>--}}
            <!-- Notifications Dropdown Menu -->
{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link" data-toggle="dropdown" href="#">--}}
{{--                    <i class="far fa-bell"></i>--}}
{{--                    <span class="badge badge-warning navbar-badge">15</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
{{--                    <span class="dropdown-header">15 Notifications</span>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <i class="fas fa-envelope mr-2"></i> 4 new messages--}}
{{--                        <span class="float-right text-muted text-sm">3 mins</span>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <i class="fas fa-users mr-2"></i> 8 friend requests--}}
{{--                        <span class="float-right text-muted text-sm">12 hours</span>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <i class="fas fa-file mr-2"></i> 3 new reports--}}
{{--                        <span class="float-right text-muted text-sm">2 days</span>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
{{--                </div>--}}
{{--            </li>--}}


            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>

        </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" target="_blank" class="brand-link">
            <img src="{{asset('images/logo.png')}}" alt="AdminLTE Logo" class="brand-image elevation-3"
                 style="opacity: .8">
            <span class="img-fluid brand-text font-weight-light">Co55 Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="user-panel my-2 d-flex">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <img src="{{asset('images/'.Auth::guard('admins')->user()->image)}}"
                                 class="img-circle elevation-2 img-fluid" alt="Admin Image">
                            <p>
                                &nbsp;&nbsp;&nbsp;{{Auth::guard('admins')->user()->name}}
                                <i class="img-fluid right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{asset('view/profile')}}" class="nav-link ">
                                    <p>View profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{asset('edit/profile')}}" class="nav-link">
                                    <p>Edit profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{asset('logout')}}" class="nav-link">
                                    <p>Logout</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- SidebarSearch Form -->
{{--            <div class="form-inline">--}}
{{--                <div class="input-group" data-widget="sidebar-search">--}}
{{--                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"--}}
{{--                           aria-label="Search">--}}
{{--                    <div class="input-group-append">--}}
{{--                        <button class="btn btn-sidebar">--}}
{{--                            <i class="fas fa-search fa-fw"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ url('admins') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Admins
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/about_us') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                About Us
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/static_page') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Static Pages
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/job') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Jobs
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/faqs') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Faqs
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/slider') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Slider
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/why') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Why
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/link') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Links
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/amenity') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Amenity
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/testimonial') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Testimonial
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/contact_us') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Contact Us
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/job_apply') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Job Apply
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/location') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Locations
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/plan') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Service Plan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/service') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Services
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/inquiry') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Inquiries
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-capitalize m-0">{{str_replace('_', ' ', request()->segment(2))}}</h1>
                    </div>
{{--                    <div class="col-sm-6">--}}
{{--                        <ol class="breadcrumb float-sm-right">--}}
{{--                            <li class="breadcrumb-item"><a href="{{ url('admins') }}">Home</a></li>--}}
{{--                            <li class="breadcrumb-item active">--}}
{{--                                {{ request()->route()->uri }}--}}
{{--                            </li>--}}
{{--                        </ol>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="m-0"></h5>
                            </div>
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            By Ahmed Essam
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2023 <a target="_blank" href="https://intcore.com/">Intcore</a>.</strong> All rights reserved.
    </footer>
</div>


<script src="{{ asset('js/jquery-3.6.2.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>

@stack('scripts')

</body>
</html>
