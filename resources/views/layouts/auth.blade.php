<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('title')</title>

    <!-- theme meta -->
    <meta name="theme-name" content="mono" />


    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="{{ asset('assets/auth/plugins/material/css/materialdesignicons.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/auth/plugins/simplebar/simplebar.css')}}" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('assets/auth/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />

    @yield('styles')

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">


    <link href="{{ asset('assets/auth/plugins/toaster/toastr.min.css ')}}" rel="stylesheet" />


    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="{{ asset('assets/auth/css/style.css')}}" />




    <!-- FAVICON -->
    <link href="{{ asset('assets/auth/images/favicon.png') }}" rel="shortcut icon" />

    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="{{ asset('assets/auth/plugins/nprogress/nprogress.js')}}"></script>
    <style>
        #logout-button {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 17px;
            padding: 1em 2.7em;
            font-weight: 500;
            background: #1F2937;
            color: white;
            border: none;
            position: relative;
            overflow: hidden;
            border-radius: 0.6em;
        }

        .gradient {
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            border-radius: 0.6em;
            margin-top: -0.25em;
            background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.3));
        }

        .label {
            position: relative;
            top: -1px;
        }

        .transition {
            transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
            transition-duration: 500ms;
            background-color: rgba(16, 185, 129, 0.6);
            border-radius: 9999px;
            width: 0;
            height: 0;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        #logout-button:hover .transition {
            width: 14em;
            height: 14em;
        }

        #logout-button:active {
            transform: scale(0.97);
        }
    </style>
</head>


<body class="navbar-fixed sidebar-fixed" id="body">


    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">


        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('assets/auth/images/logo.png') }}" alt="Mono">
                        <span class="brand-name">Auth Dashboard</span>
                    </a>
                </div>

                <!-- begin sidebar scrollbar -->
                <div class="sidebar-left" data-simplebar style="height: 100%;">
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">



                        <li class="active">
                            <a class="sidenav-item-link" href="{{ route('dashboard') }}">
                                <i class="mdi mdi-briefcase-account-outline"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="section-title">
                            Apps
                        </li>
                        <li>
                            <a class="sidenav-item-link" href="{{ route('auth.categories') }}">
                                <i class="fa-solid fa-list-check"></i>
                                <span class="nav-text">Categories</span>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('auth.tags') }}">
                                <i class="fa-solid fa-user-tag"></i>
                                <span class="nav-text">Tags</span>
                            </a>
                        </li>
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#email" aria-expanded="false" aria-controls="email">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <span class="nav-text">Posts</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="email" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('posts.create') }} ">
                                            <span class="nav-text">Create Post</span>

                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{ route('posts.index') }}">
                                            <span class=" nav-text">Posts</span>

                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="sidebar-footer">
                    <div class="sidebar-footer-content">
                        <ul class="d-flex">
                            <li>
                                <a href="user-account-settings.html" data-toggle="tooltip" title="Profile settings"><i class="mdi mdi-settings"></i></a>
                            </li>
                            <li>
                                <a href="#" data-toggle="tooltip" title="No chat messages"><i class="mdi mdi-chat-processing"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <div class="page-wrapper">
            <!-- Header -->
            <header class="main-header" id="header">
                <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>

                    <span class="page-title">dashboard</span>

                    <div class="navbar-right ">




                        <ul class="nav navbar-nav">

                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <img src="{{ asset('assets/auth/images/user/IMG_6326.jpg')}}" class="user-image rounded-circle" alt="User Image" />
                                    <span class="d-none d-lg-inline-block">{{ auth()->user()->name }}</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">


                                    <li>
                                        <a class="dropdown-link-item" href="{{ route('auth.profile.index') }}">
                                            <i class="mdi mdi-account-outline"></i>
                                            <span class="nav-text">Profile Update</span>
                                        </a>
                                    </li>

                                    <li class="dropdown-footer">
                                        <form id="logout-form" method="post" action="{{ route('logout') }}">
                                            @csrf
                                            <button id="logout-button" type="submit" class="dropdown-link-item">
                                                <i class=" mdi mdi-logout"></i>
                                                <span class="transition"></span>
                                                <span class="gradient"></span>
                                                <span class="label">LogOut</span>
                                            </button>
                                            <!-- <button id="logout-button" type="submit" class="dropdown-link-item"><i
                                                    class=" mdi mdi-logout"></i>
                                                Log Out</button> -->
                                            <!-- <a id="logout-button" href="javascript:void(0)"> -->
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>


            </header>



            <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
            <!-- content will be here -->
            @yield('content')
            <!-- Footer -->
            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>
                        &copy; <span id="copy-year"></span> Copyright Mono Dashboard Bootstrap Template by <a class="text-primary" href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
                    </p>
                </div>
                <script>
                    var d = new Date();
                    var year = d.getFullYear();
                    document.getElementById("copy-year").innerHTML = year;
                </script>
                <script src="https://kit.fontawesome.com/3f696bc338.js" crossorigin="anonymous"></script>
            </footer>

        </div>

        <script src="{{ asset('assets/auth/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/auth/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


        <script src="{{ asset('assets/auth/plugins/simplebar/simplebar.min.js') }}"></script>

        <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script src="{{ asset('assets/auth/plugins/toaster/toastr.min.js') }}"></script>
        <script src="{{ asset('assets/auth/js/mono.js') }}"></script>
        <script src="{{ asset('assets/auth/js/custom.js') }}"></script>

        <!--  -->
        <!-- <scri>
        $(document)
            .ready(function() {
                $('#logout-button').click(function() {
                    $('#logout-form').submit();
                });
            });



 </scri
pt> -->













        @yield('scripts')

</body>

</html>