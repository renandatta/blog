<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">

    <title>{{ env('APP_NAME') }}</title>
    <!-- Favicon Icon -->
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png" />
    <!-- Stylesheets -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lightgallery.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <style>
        body, html {
            font-family: 'Montserrat', sans-serif !important;
        }
        #services {
            background-color: #192B71;
        }
        #portfolio {
            background-color: #192B71;
        }
        .st-site-header.st-style1 {
            background-color: #192B71;
        }
        .st-bottom-header {
            background-color: #fff;
        }
        .st-site-header.st-style1.st-sticky-active {
            background-color: #192B71;
        }
        h1.text-banner {
            color: #10B0EC;
            position: absolute;
            top: 120px;
            left: 120px;
            font-size: 42pt;
        }
        h6.text-banner {
            position: absolute;
            top: 280px;
            left: 120px;
            max-width: 650px;
            font-size: 13pt;
            line-height: 20pt;
        }
        .st-section-heading.st-style1 .st-section-heading-title {
            color: #10B0EC;
        }
        .st-section-heading.st-style1 .st-section-heading-subtitle {
            color: #fff;
            margin-top: 10px;
        }
        .btn-primary {
            background-color: #F1632D;
            border-color: #F1632D;
            padding-left: 20px;
            padding-right: 20px;
        }
        .btn-primary:hover, .btn-primary:active {
            background-color: #FD4A02;
            border-color: #FD4A02;
        }
        .st-isotop-filter.st-style1 li a{
            color: #fff;
        }
        .st-green .st-funfact.st-style1 .st-funfact-icon {
            color: #fff;
        }
        .st-funfact.st-style1 .st-funfact-number {
            color: #fff;
        }
        .st-funfact.st-style1 .st-funfact-title {
            color: #fff;
        }
        .st-green .st-btn.st-style1.st-color1 {
            background-color: #FD4A02;
        }
        .st-green .st-contact-info-list li i {
            color: #FD4A02;
        }

        @media screen and (min-width: 992px) {
            .img-brush {
                height: 90px;
                position: absolute;
                bottom: 0;
                margin-left: 240px;
            }
            .st-nav .st-nav-list > li {
                margin-right: 10px;
            }
            .st-green .st-nav .st-nav-list li a {
                font-weight: 500;
                color: #fff;
                text-transform: uppercase;
                font-size: 10pt;
                border-right: 1px solid #F1632D;
                padding: 0 10px 0 0;
                margin: 15px 0;
            }
            .st-green .st-nav .st-nav-list li:last-child a{
                border-right: 0;
            }
            .st-green .st-nav .st-nav-list li a.active {
                color: #F1632D;
                font-weight: bold;
            }
        }
        @media screen and (max-width: 991px) {
            .st-bottom-header {
                display: none;
            }
            .img-brush {
                display: none;
            }
            .st-munu-toggle span, .st-munu-toggle span:before, .st-munu-toggle span:after {
                background-color: #fff;
            }
            h1.text-banner {
                top: 60px;
                left: 30px;
                font-size: 20pt;
                max-width: 100%;
            }
            h6.text-banner {
                top: 150px;
                left: 30px;
                font-size: 9pt;
            }
        }
    </style>
</head>

<body class="st-green">
<!-- Start Header Section -->
<header class="st-site-header st-style1 st-sticky-header">
    <div class="st-main-header">
        <div class="container">
            <div class="st-main-header-in">
                <div class="st-main-header-left">
                    <a class="st-site-branding st-white-logo" href="{{ route('/') }}"><img src="{{ asset('img/logo.png') }}" alt="Sumowarna"></a>
                    <a class="st-site-branding st-dark-logo" href="{{ route('/') }}"><img src="{{ asset('img/logo.png') }}" alt="Sumowarna"></a>
                </div>
                <div class="st-main-header-right">
                    <div class="st-nav">
                        <ul class="st-nav-list st-onepage-nav">
                            <li><a href="#home" class="st-smooth-move">Home</a></li>
                            <li><a href="#about" class="st-smooth-move">About</a></li>
                            <li><a href="#services" class="st-smooth-move">Download</a></li>
                            <li><a href="#portfolio" class="st-smooth-move">Gallery</a></li>
                            <li><a href="#team" class="st-smooth-move">News</a></li>
                            <li><a href="#price" class="st-smooth-move">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="st-bottom-header">
        <div class="container">
            <div class="st-top-header-in" style="max-height: 15px;">
                <img src="{{ asset('img/brush.png') }}" alt="" class="img-brush">
                &nbsp;
            </div>
        </div>
    </div>
</header>
<!-- End Header Section -->

<div class="st-content">
    <!-- Start Hero Seciton -->
    <div class="st-height-b40 st-height-lg-b50"></div>
    <div class="st-hero-wrap st-gray-bg">
        <div class="banner" style="background: url('{{ asset('img/banner.png') }}') no-repeat center;background-size: cover;width: 100vw; height: 650px;">
            <h1 class="text-banner">“To Colour <br>Wonderful Indonesia”</h1>
            <h6 class="text-banner">PT. Sumo Warna Indonesia merupakan sebuah perusahaan manufaktur yang bergerak dalam bidang industri pembuatan cat (Pabrik Cat). Untuk saat ini kami memproduksi khusus cat tembok, eksterior maupun interior. Produk kami distribusikan secara nasional melalui penjualan langsung ataupun melalui kantor perwakilan berbagai daerah khususnya Indoensia bagian Timur dan beberapa agen yang ditunjuk di berbagai kota besar di Indonesia. </h6>
        </div>
    </div>
    <!-- End Hero Seciton -->

    <!-- Start Service Section -->
    <section id="services">
        <div class="st-height-b50 st-height-lg-b50"></div>
        <div class="container">
            <div class="st-section-heading st-style1">
                <h2 class="st-section-heading-title">Produk Inovasi Terbaik di Kelasnya</h2>
                <div class="st-section-heading-subtitle">Terus menerus menghasilkan produk dengan mutu konsisten dan harga yang bersaing</div>
            </div>
            <div class="st-height-b40 st-height-lg-b40"></div>
        </div>
        <div class="container">
            <div class="st-slider st-style2">
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-6 col-12 text-center mb-5">
                        <img src="{{ asset('img/produk_2.png') }}" class="img-fluid" alt="">
                        <h4 class="text-white mt-4">Sumotex Exterior</h4>
                        <p class="text-white" style="min-height: 140px">Sumotex Cat Tembok Exterior merupakan inovasi terbaik dikelasnya dengan kualitas tinggi yang memberikan perlindungan maksimal pada dinding luar hunian anda terhadap jamur, lumut, serta cuaca eksrim.</p>
                        <br>
                        <a href="#" class="btn btn-primary">Detail Produk</a>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12 text-center mb-5">
                        <img src="{{ asset('img/produk_3.png') }}" class="img-fluid" alt="">
                        <h4 class="text-white mt-4">Sumotex Interior</h4>
                        <p class="text-white" style="min-height: 140px">Sumotex Cat Tembok Interior merupakan inovasi dan teknologi terbaik dikelasnya dengan sentuhan warna warna cerah yang memberikan keindahan serta kenyamanan pada dekorasi hunian anda.</p>
                        <br>
                        <a href="#" class="btn btn-primary">Detail Produk</a>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12 text-center mb-5">
                        <img src="{{ asset('img/produk_1.png') }}" class="img-fluid" alt="">
                        <h4 class="text-white mt-4">Sumo Anti Mos</h4>
                        <p class="text-white" style="min-height: 140px">Anti Mos merupakn teknologi baru cat anti nyamuk dengan ekstrak alami dari bunga matahari, mampu mengusir hingga nyamuk mati,</p>
                        <br>
                        <a href="#" class="btn btn-primary">Detail Produk</a>
                    </div>
                </div>
            </div><!-- .st-slider -->
        </div><!-- .container -->
        <div class="st-height-b120 st-height-lg-b80"></div>
    </section>
    <!-- End Service Section -->

    <!-- Start Logo Carousel -->
    <div>
        <div class="st-height-b50 st-height-lg-b50"></div>
        <div class="container">
            <div class="st-slider st-style2 st-pricing-wrap">
                <div class="slick-container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0"  data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="4" data-add-slides="5">
                    <div class="slick-wrapper">
                        <div class="slick-slide-in">
                            <div class="st-logo-carousel st-style1">
                                <img src="{{ asset('img/depo.png') }}" alt="client1">
                            </div>
                        </div><!-- .slick-slide-in -->
                        <div class="slick-slide-in">
                            <div class="st-logo-carousel st-style1">
                                <img src="{{ asset('img/gne.png') }}" alt="client2">
                            </div>
                        </div><!-- .slick-slide-in -->
                        <div class="slick-slide-in">
                            <div class="st-logo-carousel st-style1">
                                <img src="{{ asset('img/castwell.png') }}" alt="client3">
                            </div>
                        </div><!-- .slick-slide-in -->
                        <div class="slick-slide-in">
                            <div class="st-logo-carousel st-style1">
                                <img src="{{ asset('img/relyon.png') }}" alt="client4">
                            </div>
                        </div><!-- .slick-slide-in -->
                    </div>
                </div><!-- .slick-container -->
                <div class="pagination st-style1 st-flex st-hidden"></div> <!-- If dont need Pagination then add class .st-hidden -->
                <div class="swipe-arrow st-style1"> <!-- If dont need navigation then add class .st-hidden -->
                    <div class="slick-arrow-left"><i class="fa fa-chevron-left"></i></div>
                    <div class="slick-arrow-right"><i class="fa fa-chevron-right"></i></div>
                </div>
            </div><!-- .st-slider -->
        </div>
        <div class="st-height-b50 st-height-lg-b50"></div>
    </div>
    <!-- End Logo Carousel -->

    <!-- Start Skill Section -->
    <section>
        <div class="st-height-b20 st-height-lg-b20"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <div class="st-slider st-style1">
                        <div class="slick-container" data-autoplay="0" data-loop="1" data-speed="800" data-autoplay-timeout="1000" data-center="0" data-slides-per-view="1">
                            <div class="slick-wrapper">
                                <div class="slick-slide-in">
                                    <div class="st-gallery-img st-style1 st-dynamic-bg" data-src="assets/img/skill-img.jpg"></div>
                                </div>
                            </div>
                        </div><!-- .slick-container -->
                        <div class="pagination st-style2"></div> <!-- If dont need Pagination then add class .st-hidden -->
                        <div class="swipe-arrow st-style1 st-hidden"> <!-- If dont need navigation then add class .st-hidden -->
                            <div class="slick-arrow-left"><i class="fa fa-angle-left"></i></div>
                            <div class="slick-arrow-right"><i class="fa fa-angle-right"></i></div>
                        </div>
                    </div><!-- .st-slider -->
                    <div class="st-height-b0 st-height-lg-b20"></div>
                </div><!-- .col -->
                <div class="col-lg-6">
                    <div class="st-vertical-middle">
                        <div class="st-vertical-middle-in">
                            <div class="st-skill-wrap">
                                <div class="st-skill-heading">
                                    <h2 class="st-skill-title">Cat Terbaik Tahun 2020</h2>
                                    <br>
                                    <br>
                                    <h6>20 Mei 2020 | Berita</h6>
                                    <div class="st-skill-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                                    <br>
                                    <a href=""><b><u>Baca Selengkapnya</u></b></a>
                                    <div class="st-height-b20 st-height-lg-b20"></div>
                                </div><!-- .st-skill-heading -->
                            </div>
                        </div>
                    </div>
                </div><!-- .col -->
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="st-height-b30 st-height-lg-b30"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="st-vertical-middle">
                        <div class="st-vertical-middle-in">
                            <div class="st-skill-wrap">
                                <div class="st-skill-heading">
                                    <h2 class="st-skill-title">Cat Terbaik Tahun 2021</h2>
                                    <br>
                                    <br>
                                    <h6>20 Mei 2020 | Berita</h6>
                                    <div class="st-skill-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                                    <br>
                                    <a href=""><b><u>Baca Selengkapnya</u></b></a>
                                    <div class="st-height-b20 st-height-lg-b20"></div>
                                </div><!-- .st-skill-heading -->
                            </div>
                        </div>
                    </div>
                </div><!-- .col -->
                <div class="col-lg-6 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <div class="st-slider st-style1">
                        <div class="slick-container" data-autoplay="0" data-loop="1" data-speed="800" data-autoplay-timeout="1000" data-center="0" data-slides-per-view="1">
                            <div class="slick-wrapper">
                                <div class="slick-slide-in">
                                    <div class="st-gallery-img st-style1 st-dynamic-bg" data-src="assets/img/skill-img.jpg"></div>
                                </div>
                            </div>
                        </div><!-- .slick-container -->
                        <div class="pagination st-style2"></div> <!-- If dont need Pagination then add class .st-hidden -->
                        <div class="swipe-arrow st-style1 st-hidden"> <!-- If dont need navigation then add class .st-hidden -->
                            <div class="slick-arrow-left"><i class="fa fa-angle-left"></i></div>
                            <div class="slick-arrow-right"><i class="fa fa-angle-right"></i></div>
                        </div>
                    </div><!-- .st-slider -->
                    <div class="st-height-b0 st-height-lg-b20"></div>
                </div><!-- .col -->
            </div>
        </div>
        <div class="st-height-b50 st-height-lg-b50"></div>
    </section>
    <!-- End Skill Section -->

    <!-- Start Project Section -->
    <section id="portfolio" class="st-parallax-shape-wpra">
        <div class="st-parallax-shape st-style1"></div>
        <div class="st-height-b50 st-height-lg-b50"></div>
        <div class="container">
            <div class="st-section-heading st-style1">
                <h2 class="st-section-heading-title">Galeri Produk</h2>
                <div class="st-section-heading-subtitle">Projek yang Menggunakan Produk Sumo</div>
            </div>
            <div class="st-height-b40 st-height-lg-b40"></div>
        </div>
        <div class="container">
            <div class="st-portfolio-wrapper">
                <div class="st-isotop-filter st-style1 text-center">
                    <ul class="st-mp0">
                        <li class="active mb-3"><a href="#" data-filter="*">Semua</a></li>
                        <li class="mb-3"><a href="#" data-filter=".external">External</a></li>
                        <li class="mb-3"><a href="#" data-filter=".internal">Internal</a></li>
                        <li class="mb-3"><a href="#" data-filter=".anti-mos">Anti Mos</a></li>
                    </ul>
                </div>
                <div class="st-isotop st-style1 st-port-col-3 st-has-gutter st-lightgallery">
                    <div class="st-grid-sizer"></div>
                    <div class="st-isotop-item external">
                        <a href="{{ asset('img/galeri_1.png') }}" class="st-project st-zoom st-lightbox-item">
                            <div class="st-project-img st-zoom-in"><img src="{{ asset('img/galeri_1.png') }}" alt="project1"></div>
                            <div class="st-plus"><span></span></div>
                        </a>
                    </div><!-- .st-isotop-item -->

                    <div class="st-isotop-item external">
                        <a href="{{ asset('img/galeri_2.png') }}" class="st-project st-zoom st-lightbox-item">
                            <div class="st-project-img st-zoom-in"><img src="{{ asset('img/galeri_2.png') }}" alt="project1"></div>
                            <div class="st-plus"><span></span></div>
                        </a>
                    </div><!-- .st-isotop-item -->

                    <div class="st-isotop-item external anti-mos">
                        <a href="{{ asset('img/galeri_3.png') }}" class="st-project st-zoom st-lightbox-item">
                            <div class="st-project-img st-zoom-in"><img src="{{ asset('img/galeri_3.png') }}" alt="project1"></div>
                            <div class="st-plus"><span></span></div>
                        </a>
                    </div><!-- .st-isotop-item -->

                    <div class="st-isotop-item internal ">
                        <a href="{{ asset('img/galeri_4.png') }}" class="st-project st-zoom st-lightbox-item">
                            <div class="st-project-img st-zoom-in"><img src="{{ asset('img/galeri_4.png') }}" alt="project1"></div>
                            <div class="st-plus"><span></span></div>
                        </a>
                    </div><!-- .st-isotop-item -->

                    <div class="st-isotop-item internal anti-mos">
                        <a href="{{ asset('img/galeri_5.png') }}" class="st-project st-zoom st-lightbox-item">
                            <div class="st-project-img st-zoom-in"><img src="{{ asset('img/galeri_5.png') }}" alt="project1"></div>
                            <div class="st-plus"><span></span></div>
                        </a>
                    </div><!-- .st-isotop-item -->

                    <div class="st-isotop-item internal anti-mos">
                        <a href="{{ asset('img/galeri_6.png') }}" class="st-project st-zoom st-lightbox-item">
                            <div class="st-project-img st-zoom-in"><img src="{{ asset('img/galeri_6.png') }}" alt="project1"></div>
                            <div class="st-plus"><span></span></div>
                        </a>
                    </div><!-- .st-isotop-item -->
                </div><!-- .isotop -->
            </div>
        </div>
        <div class="st-height-b120 st-height-lg-b80"></div>
    </section>
    <!-- End Project Section -->

    <!-- Start FunFact Aection -->
    <section class="st-dynamic-bg st-bg" data-src="{{ asset('img/section.png') }}">
        <div class="st-height-b50 st-height-lg-b50"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="st-funfact st-style1">
                        <div class="st-funfact-icon wow bounce" data-wow-duration="1s" data-wow-delay="0.7s"><i class="flaticon-rate"></i></div>
                        <h2 class="st-funfact-number st-counter">999</h2>
                        <div class="st-funfact-title">Satisfied customers</div>
                    </div>
                    <div class="st-height-b30 st-height-lg-b30"></div>
                </div><!-- .col -->
                <div class="col-lg-3">
                    <div class="st-funfact st-style1">
                        <div class="st-funfact-icon wow bounce" data-wow-duration="1s" data-wow-delay="0.9s"><i class="flaticon-code"></i></div>
                        <h2 class="st-funfact-number st-counter">999</h2>
                        <div class="st-funfact-title">Project Build</div>
                    </div>
                    <div class="st-height-b30 st-height-lg-b30"></div>
                </div><!-- .col -->
                <div class="col-lg-3">
                    <div class="st-funfact st-style1">
                        <div class="st-funfact-icon wow bounce" data-wow-duration="1s" data-wow-delay="0.8s"><i class="flaticon-laptop"></i></div>
                        <h2 class="st-funfact-number st-counter">100</h2>
                        <div class="st-funfact-title">Experts Worker</div>
                    </div>
                    <div class="st-height-b30 st-height-lg-b30"></div>
                </div><!-- .col -->
                <div class="col-lg-3">
                    <div class="st-funfact st-style1">
                        <div class="st-funfact-icon wow bounce" data-wow-duration="1s" data-wow-delay="1s"><i class="flaticon-win"></i></div>
                        <h2 class="st-funfact-number st-counter">20</h2>
                        <div class="st-funfact-title">Experience Years</div>
                    </div>
                    <div class="st-height-b30 st-height-lg-b30"></div>
                </div><!-- .col -->
            </div>
        </div>
        <div class="st-height-b20 st-height-lg-b20"></div>
    </section>
    <!-- End FunFact Aection -->

    <!-- Start Contact Section -->
    <section id="contact">
        <div class="st-height-b50 st-height-lg-b50"></div>
        <div class="container">
            <div class="st-section-heading st-style1">
                <h2 class="st-section-heading-title">Hubungi Kami</h2>
            </div>
            <div class="st-height-b50 st-height-lg-b50"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div id="st-alert"></div>
                    <form action="assets/php/mail.php.html" class="row st-contact-form" method="post"  id="contact-form">
                        <div class="col-lg-12">
                            <div class="st-form-field">
                                <input type="text" id="name" name="name" required>
                                <label>Nama Lengkap</label>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-6">
                            <div class="st-form-field">
                                <input type="text" id="subject" name="email" required>
                                <label>Email</label>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-6">
                            <div class="st-form-field">
                                <input type="text" id="phone" name="phone" required>
                                <label>Phone</label>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-12">
                            <div class="st-form-field">
                                <textarea cols="30" rows="10" id="msg" name="msg" required></textarea>
                                <label>Pesan</label>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-12">
                            <button class="st-btn st-style1 st-color1 st-size-medium" type="submit" id="submit" name="submit">Tinggalkan Pesan</button>
                            <div class="empty-space col-lg-b30"></div>
                        </div><!-- .col -->
                    </form>
                    <div class="st-height-b30 st-height-lg-b30"></div>
                </div><!-- .col -->
                <div class="col-lg-4">
                    <div class="st-contact-info">
                        <h2 class="st-contact-info-title">Kantor Pusat</h2>
                        <ul class="st-contact-info-list st-mp0">
                            <li><i class="fas fa-map-marker-alt"></i>Jl. Margomulyo Blok J No. 19,
                                <br>Pergudangan Margomulyo Permai,
                                <br>Surabaya, Jawa Timur - Indonesia
                            </li>
                            <li><i class="fas fa-phone-volume"></i>+60 16 996 1133</li>
                            <li><i class="fas fa-phone-volume"></i>+60 16 996 1133</li>
                            <li><i class="fas fa-envelope"></i><a href="#">contact@sumowarna.id</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="st-height-b90 st-height-lg-b50"></div>
    </section>
    <!-- End Contact Section -->
    <hr>

</div>

<!-- Start Footer -->
<footer class="st-site-footer st-sticky-footer">
    <div class="st-main-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="st-footer-widget">
                        <div class="st-text-field">
                            <img src="{{ asset('img/logo.png') }}" alt="Sumowarna" class="st-white-logo">
                            <img src="{{ asset('img/logo.png') }}" alt="Sumowarna" class="st-dark-logo">
                            <div class="st-height-b25 st-height-lg-b25"></div>
                        </div>
                    </div>
                </div><!-- .col -->
                <div class="col-lg-6">
                    <div class="st-footer-widget">
                        <h2 class="st-footer-widget-title">Tentang Kami</h2>
                        <div class="st-footer-text">Lorem ipsum dolor sit consectetur adipisicing sed do eiusmod tempor incididunt ut labore. Lorem Ipsum is simply dummy.</div>
                    </div>
                </div><!-- .col -->
                <div class="col-lg-3">
                    <div class="st-footer-widget">
                        <h2 class="st-footer-widget-title">Sosial Media</h2>
                        <div class="st-height-b25 st-height-lg-b25"></div>
                        <ul class="st-social-btn st-style1 st-mp0">
                            <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-square"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                            <li><a href="#"><i class="fab fa-dribbble-square"></i></a></li>
                        </ul>
                    </div>
                </div><!-- .col -->
            </div>
        </div>
    </div>
    <div class="st-copyright-wrap">
        <div class="container">
            <div class="st-copyright-in">
                <div class="st-left-copyright">
                    <div class="st-copyright-text">Copyright {{ date('Y') }}. Design by Sumowarna</div>
                </div>
                <div class="st-right-copyright">
                    <div id="st-backtotop"><i class="fas fa-angle-up"></i></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->

<!-- Start Video Popup -->
<div class="st-video-popup">
    <div class="st-video-popup-overlay"></div>
    <div class="st-video-popup-content">
        <div class="st-video-popup-layer"></div>
        <div class="st-video-popup-container">
            <div class="st-video-popup-align">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="about:blank"></iframe>
                </div>
            </div>
            <div class="st-video-popup-close"></div>
        </div>
    </div>
</div>
<!-- End Video Popup -->

<!-- Scripts -->
<script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="assets/js/isotope.pkg.min.js"></script>
<script src="assets/js/jquery.slick.min.js"></script>
<script src="assets/js/mailchimp.min.js"></script>
<script src="assets/js/counter.min.js"></script>
<script src="assets/js/lightgallery.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/main.js"></script>
</html>
