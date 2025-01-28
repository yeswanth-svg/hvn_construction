<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title', 'Admin')</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{assert('img/kaiadmin/favicon.ico')}}" type="image/x-icon" />



    <!-- Fonts and icons -->
    <script src="{{asset('js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{asset('css/fonts.min.css')}}"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>
    <script src="{{asset('js/core/jquery-3.7.1.min.js')}}"></script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/plugins.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/kaiadmin.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/demo.css')}}" />
    <!-- Include DataTables and Buttons Libraries -->
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet">





    <style>
        .navbar .navbar-nav .nav-item {
            padding: 0px 36px;
        }
    </style>


</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="#" class="logo">
                        <!-- <img src="{{asset('images/kaiadmin/logo_dark.svg')}}" alt="navbar brand" class="navbar-brand"
                            height="20" /> -->
                        <h2 class="text-white">HVN</h2>
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item active">
                            <a href="{{route('admin.dashboard')}}">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>

                            </a>
                        </li>
                        @can('manage-roles')
                            <li class="nav-section">
                                <span class="sidebar-mini-icon">
                                    <i class="fa fa-ellipsis-h"></i>
                                </span>
                                <h4 class="text-section">Role Management</h4>
                            </li>
                        @endcan

                        @can('manage-roles')
                            <li class="nav-item">
                                <a href="{{route('admin.roles.index')}}">
                                    <i class="fas fa-user-shield"></i>
                                    <p>Roles</p>
                                    <!-- <span class="caret"></span> -->
                                </a>
                            </li>
                        @endcan



                        @can('manage-permissions')
                            <li class="nav-item">
                                <a data-bs-toggle="collapse" href="#per" aria-expanded="false" aria-controls="per">
                                    <i class="fas fa-binoculars"></i>
                                    <p>Manage Permissions</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="per" aria-labelledby="headingPer">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href="{{route('admin.permissions.index')}}">
                                                <span class="sub-item">Add Permissions</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.assign-permissions')}}">
                                                <span class="sub-item">Assign Permissions</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endcan



                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Project Management</h4>
                        </li>

                        @can('manage-project-information')
                            <li class="nav-item">
                                <a href="{{route('admin.project-info.index')}}">
                                    <i class="fas fa-building"></i>
                                    <p>Project Information </p>

                                </a>
                            </li>
                        @endcan

                        @can('manage-plot-level-information')
                            <li class="nav-item">
                                <a href="{{route('admin.plot-level-information.index')}}">
                                    <i class="fas fa-map"></i>
                                    <p>Plot Level Information</p>

                                </a>
                            </li>
                        @endcan

                        @can('manage-epi')
                            <li class="nav-item">
                                <a href="{{route('admin.each-plot-information.index')}}">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <p>Each Plot Information</p>

                                </a>
                            </li>
                        @endcan

                        @can('manage-customers')
                            <li class="nav-item">
                                <a href="{{route('admin.customer-details.index')}}">
                                    <i class="fas fa-users"></i>
                                    <p>Coustmer Details</p>
                                    <!-- <span class="caret"></span> -->
                                </a>
                            </li>
                        @endcan

                        @can('manage-company-accounts')
                            <li class="nav-item">
                                <a href="{{route('admin.company-accounts.index')}}">
                                    <i class="fas fa-users"></i>
                                    <p>Company Accounts</p>
                                    <!-- <span class="caret"></span> -->
                                </a>
                            </li>
                        @endcan

                        @can('manage-company-accounts')
                            <li class="nav-item">
                                <a href="{{route('admin.reports')}}">
                                    <i class="fas fa-file-alt"></i>
                                    <p>Reports</p>
                                    <!-- <span class="caret"></span> -->
                                </a>
                            </li>
                        @endcan



                    </ul>
                </div>
            </div>
        </div>
        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="#" class="logo">
                            <img src="{{asset('images/kaiadmin/logo_light.svg')}}" alt="navbar brand"
                                class="navbar-brand" height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">

                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">

                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                                    aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="{{asset('img/mlane.jpg')}}" alt="..."
                                            class="avatar-img rounded-circle" />
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Hi,</span>
                                        <span class="fw-bold">Admin</span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <!-- <div class="avatar-lg">
                                                    <img src="{{asset('images/profile.jpg')}}" alt="image profile"
                                                        class="avatar-img rounded" />
                                                </div> -->
                                                <div class="u-text">
                                                    <h4>{{auth()->user()->name}}</h4>
                                                    <p class="text-muted">{{auth()->user()->email}}</p>
                                                    <a href="{{route('profile.edit')}}"
                                                        class="btn btn-xs btn-secondary btn-sm">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <form method="POST" action="{{ route('logout') }}" class="m-3">
                                                @csrf
                                                <button class="btn btn-danger btn-sm ms-auto"><i
                                                        class="fas fa-sign-out-alt"></i> Logout</button>
                                            </form>

                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
            <!-- End Sidebar -->
            @yield('content')
        </div>

    </div>




    <!-- jQuery -->

    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>






    <!--   Core JS Files   -->


    <script src="{{asset('js/core/popper.min.js')}}"></script>
    <script src="{{asset('js/core/bootstrap.min.js')}}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{asset('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

    <!-- Chart JS -->
    <script src="{{asset('js/plugin/chart.js/chart.min.js')}}"></script>


    <!-- Chart Circle -->
    <script src="{{asset('js/plugin/chart-circle/circles.min.js')}}"></script>

    <!-- Datatables -->
    <script src="{{asset('js/plugin/datatables/datatables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <!-- Bootstrap Notify -->
    <script src="{{asset('js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>


    <!-- Sweet Alert -->
    <script src="{{asset('js/plugin/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{asset('js/kaiadmin.min.js')}}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{asset('js/setting-demo.js')}}"></script>
    <script src="{{asset('js/demo.js')}}"></script>

    <script>
        $(document).ready(function () {
            // Success notification
            @if(session('success'))
                var content = {
                    message: "{{ session('success') }}",
                    title: "Success",
                    icon: "fa fa-bell"
                };

                $.notify(content, {
                    type: 'success', // You can change this to match your notification type
                    placement: {
                        from: 'top', // Correct capitalization
                        align: 'right' // Correct capitalization
                    },
                    time: 1000,
                    delay: 5000, // Adjust delay if needed
                });
            @endif


            // Error notification
            @if($errors->any())
                var content = {
                    message: "{{ $errors->first() }}",
                    title: "Error",
                    icon: "fa fa-exclamation-circle",
                };

                $.notify(content, {
                    type: "danger", // Error style
                    allow_dismiss: true,
                    delay: 5000,
                    placement: {
                        from: "top",
                        align: "right",
                    },
                    offset: { x: 20, y: 70 },
                    animate: {
                        enter: "animated fadeInDown",
                        exit: "animated fadeOutUp",
                    },
                });
            @endif

        });
    </script>
</body>

</html>