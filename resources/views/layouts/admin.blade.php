<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">
    <title>{{ config('app.name', 'Eleven Food') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ url('assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/components.css') }}">

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                class="fas fa-bars"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                class="fas fa-search"></i></a></li>
                </ul>
                <ul class="navbar-nav navbar-right ml-auto">

                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ url('assets/img/avatar/avatar-1.png') }}"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ url('adminprofile') }}" class="dropdown-item has-icon">
                                <i class="fa fa-user"></i> Profil
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                {{ __('Keluar') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{ url('/admin') }}">Dashboard</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{ url('/admin') }}">
                            <img src="{{ url('images') }}/{{ 'logo.png' }}" class="img-fluid">
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="active"><a class="nav-link" href="{{ url('/admin') }}"><i
                                    class="fas fa-fire"></i><span>Dashboard
                                    Grafik Penjualan
                                </span> </a></li>
                        <li class="active"><a class="nav-link" href="{{ url('transaksi') }}"><i
                                    class="fas fa-database"></i><span>Data
                                    Transaksi</span></a></li>
                        <li class="active"><a class="nav-link" href="{{ url('produk') }}"><i
                                    class="fas fa-utensils"></i><span>Data
                                    Produk</span></a></li>
                        {{-- <li class="active"><a class="nav-link" href="tambah_kategori.html"><i
                                    class="fas fa-grip-vertical"></i><span>Tambah Kategori </span></a></li> --}}
                    </ul>
                </aside>
            </div>

            <main>
                @yield('content')
            </main>

        </div>
    </div>
    </div>
    </div>
    </section>
    </div>
    <footer class="main-footer">
        <div class="footer-left">
            Copyright &copy; Eleven Food 2022 <div class="bullet"></div> Design By <a
                href="https://www.bengkelti.com">Stisla</a>
        </div>
        <div class="footer-right">

        </div>
    </footer>
    </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ url('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ url('assets/modules/popper.js') }}"></script>
    <script src="{{ url('assets/modules/tooltip.js') }}"></script>
    <script src="{{ url('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ url('assets/modules/moment.min.js') }}"></script>
    <script src="{{ url('assets/js/stisla.js') }}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')


    <!-- JS Libraies -->
    <script src="{{ url('assets/modules/jquery.sparkline.min.js') }}"></script>
    <script src="{{ url('assets/modules/chart.min.js') }}"></script>
    <script src="{{ url('assets/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ url('assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ url('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ url('assets/js/page/index.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ url('assets/js/scripts.js') }}"></script>
    <script src="{{ url('assets/js/custom.js') }}"></script>
</body>

</html>
