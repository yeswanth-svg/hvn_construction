<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="{{asset('property/favicon.png')}}" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('property/fonts/icomoon/style.css')}}" />
    <link rel="stylesheet" href="{{asset('property/fonts/flaticon/font/flaticon.css')}}" />

    <link rel="stylesheet" href="{{asset('property/css/tiny-slider.css')}}" />
    <link rel="stylesheet" href="{{asset('property/css/aos.css')}}" />
    <link rel="stylesheet" href="{{asset('property/css/style.css')}}" />


    <title>@yield('title', 'Realestate')</title>

    <style>
        #form {
            padding: 5px 20px;
            display: block;
            font-size: 14px;
            text-transform: none;
            letter-spacing: normal;
            -webkit-transition: 0s all;
            -o-transition: 0s all;
            transition: 0s all;
            color: #000;
        }
    </style>
</head>

<body>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
        <div class="container">
            <div class="menu-bg-wrap">
                <div class="site-navigation">
                    <a href="{{url('/')}}" class="logo m-0 float-start">Realestate</a>

                    <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                        <li class="{{request()->is('/') ? 'active' : '' }}"><a href="{{url('/')}}">Home</a></li>
                        <li class="{{request()->is('about-us') ? 'active' : ''}}"><a
                                href="{{route('about-us')}}">About</a>
                        </li>
                        <!-- <li class="{{request()->is('properties') ? 'active' : ''}}"><a
                                href="{{route('properties')}}">Properties</a></li> -->
                        <li class="{{request()->is('services') ? 'active' : ''}}"><a
                                href="{{route('services')}}">Services</a></li>
                        <li class="{{request()->is('contact') ? 'active' : ''}}"><a href="{{route('contact')}}">Contact
                                Us</a></li>

                        @if (Route::has('login'))
                            @auth
                                <li class="{{request()->is('dashboard') ? 'active' : ''}}"><a
                                        href="{{route('dashboard')}}">Dashboard
                                    </a></li>
                                <li class="has-children">
                                    <a href="">{{ Auth::user()->name }}</a>
                                    <ul class="dropdown">
                                        <li><a href="{{route('profile.edit')}}">{{ __('Profile') }}</a></li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-link text-dark text-decoration-none p-3 m-0">
                                                    {{ __('Logout') }}
                                                </button>
                                            </form>
                                        </li>

                                    </ul>
                                </li>

                            @else
                                <li class="{{request()->is('login') ? 'active' : ''}}"><a href="{{route('login')}}">Login
                                    </a></li>
                                @if (Route::has('register'))
                                    <li class="{{request()->is('register') ? 'active' : ''}}"><a
                                            href="{{route('register')}}">Register</a></li>
                                @endif
                            @endauth
                        @endif

                    </ul>




                    <a href="#"
                        class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
                        data-toggle="collapse" data-target="#main-navbar">
                        <span></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')


    <div class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget">
                        <h3>Contact</h3>
                        <address>43 Raymouth Rd. Baltemoer, London 3910</address>
                        <ul class="list-unstyled links">
                            <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
                            <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
                            <li>
                                <a href="mailto:info@mydomain.com">info@mydomain.com</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="widget">
                        <h3>Sources</h3>
                        <ul class="list-unstyled float-start links">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Vision</a></li>
                            <li><a href="#">Mission</a></li>
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Privacy</a></li>
                        </ul>
                        <ul class="list-unstyled float-start links">
                            <li><a href="#">Partners</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Creative</a></li>
                        </ul>
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="widget">
                        <h3>Links</h3>
                        <ul class="list-unstyled links">
                            <li><a href="#">Our Vision</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>

                        <ul class="list-unstyled social">
                            <li>
                                <a href="#"><span class="icon-instagram"></span></a>
                            </li>
                            <li>
                                <a href="#"><span class="icon-twitter"></span></a>
                            </li>
                            <li>
                                <a href="#"><span class="icon-facebook"></span></a>
                            </li>
                            <li>
                                <a href="#"><span class="icon-linkedin"></span></a>
                            </li>
                            <li>
                                <a href="#"><span class="icon-pinterest"></span></a>
                            </li>
                            <li>
                                <a href="#"><span class="icon-dribbble"></span></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->

            <div class="row mt-5">
                <div class="col-12 text-center">


                    <p>
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        . All Rights Reserved. &mdash; Designed with love by
                        <a href="https://untree.co">Untree.co</a>
                        <!-- License information: https://untree.co/license/ -->
                    </p>
                    <div>
                        Distributed by
                        <a href="https://themewagon.com/" target="_blank">themewagon</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <script src="{{asset('js/core/jquery-3.7.1.min.js')}}"></script>

    <script src="{{asset('property/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('property/js/tiny-slider.js')}}"></script>
    <script src="{{asset('property/js/aos.js')}}"></script>
    <script src="{{asset('property/js/navbar.js')}}"></script>
    <script src="{{asset('property/js/counter.js')}}"></script>
    <script src="{{asset('property/js/custom.js')}}"></script>
    <!-- Bootstrap Notify -->
    <script src="{{asset('js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

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