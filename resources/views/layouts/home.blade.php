<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Zona Korea">
    <meta name="description" content="Comfort zone to enjoy news, fun content, and more facts about Korea and Kpop!">
    <title>Zona Korea @yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon/favicon.ico') }}">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <!-- Swiper Slider -->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}" type="text/css">
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/font-awesome.min.css') }}">
    <!-- OWL Carousel -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}" type="text/css">
    <!-- Animate -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}" type="text/css">
    <!-- NProgress -->
    <link rel="stylesheet" href="{{ asset('assets/css/nprogress.css') }}" type="text/css">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">

</head>
<body>
<!-- Section Navbar V1 -->
<header class="header-01">
    <div class="topbar-01">
        <div class="container">
            <div class="row">
                <div class="left col-6">
                    <div class="today">
                        <p>Today</p>
                    </div>
                    <div class="searchbar">
                        <form action="{{ route('search') }}" method="post">
                            @csrf
                            <input type="text" name="search" placeholder="I'm searching for .." @if(isset($keyword)) value="{{ $keyword }}" @endif required>
                            <button type="submit">
                                <img src="{{ asset('assets/images/svg/050-magnifying-glass.svg') }}" alt="Zona Korea">
                            </button>
                        </form>
                    </div>
                </div>
                <div class="right col-6">
                    @if(Auth::check())
                    <div class="user-profile">
                        <img src="{{ asset('assets/images/thumbnail/profile.jpg') }}" alt="Zona Korea">
                        <p>{{ Auth::user()->name }}<i class="fa fa-chevron-down"></i></p>
                        <div class="user-menu">
                            <ul>
                                <li><a href="{{ route('dashboard') }}">Admin Page</a></li>
                                <li><a href="{{ route('logout') }}">Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar-menu navbar navbar-expand-lg">
        <div class="container navbar-container">
            <!-- Logo -->
            <a class="navbar-brand background-logo" href="{{ route('/') }}"><img src="{{ asset('assets/images/logo-zonakorea.png') }}" alt="Zona Korea"></a>
            <!-- /.Logo -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @foreach($categories as $category)
                    <li class="nav-item">
                        <a href="{{ route('category', $category->slug) }}" class="nav-link">{{ $category->name }}</a>
                    </li>
                    @endforeach
{{--                    <li class="nav-item dropdown-submenu dropdown">--}}
{{--                        <a class="dropdown-item dropdown-toggle nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            Films--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li><a href="#" class="dropdown-item">Category</a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Category</a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Category</a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Category</a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Category</a></li>--}}
{{--                            <li><a href="#" class="dropdown-item">Category</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                </ul>
            </div>
            <button type="button" id="sidebarCollapse" class="navbar-toggler active" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>
</header>
<!-- /.Section Navbar V1 -->
<!-- Section Slider 02 -->
@yield('content')
<!-- /.Section Contents -->
<!-- Section Footer -->
<div id="section-footer" class="footer-03">
    <div class="container">
        <div class="row text-center">
            <div class="ft-column col-md-12 col-lg-12">
                <div class="logo">
                    <a href="#"><img src="{{ asset('assets/images/logo-zonakorea.png') }}" alt="Zona Korea"></a>
                </div>
                @if(!empty($footer_text))
                <p>{{ $footer_text->content }}</p>
                @endif
                <ul class="ft_social_links">
                    <li><a href="{{ !empty($facebook) ? $facebook->content : '#' }}"><i class="fa fa-facebook fa-lg"></i></a></li>
                    <li><a href="{{ !empty($twitter) ? $twitter->content : '#' }}"><i class="fa fa-twitter fa-lg"></i></a></li>
                    <li><a href="{{ !empty($instagram) ? $instagram->content : '#' }}"><i class="fa fa-instagram fa-lg"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyright text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright-wrapper">
                        <p>Copyright © 2020 Zona Korea by <a target="_blank" href="">Hash Entertainment</a> All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.Section Footer -->

<!-- Javascript Files -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!-- Swiper Slider -->
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<!-- OWL Carousel -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!-- Waypoint -->
<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
<!-- Easy Waypoint -->
<script src="{{ asset('assets/js/easy-waypoint-animate.js') }}"></script>
<!-- Counter -->
<script src="{{ asset('assets/js/jquery.countup.js') }}"></script>
<!-- Counter -->
<script src="{{ asset('assets/js/jquery.countup.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('assets/js/nprogress.js') }}"></script>
<!-- Ticker -->
<script src="{{ asset('assets/js/jquery.newsTicker.min.js') }}"></script>
<!-- Scripts -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>

@stack('scripts')
</body>
</html>
