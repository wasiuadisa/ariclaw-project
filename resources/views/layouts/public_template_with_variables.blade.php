<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
@yield('extra_meta')
    <title>{{ isset($pageTitle) ? ($pageTitle . ' |') : '' }} Ariclaw</title>
    <link rel="icon" href="{{ asset('storage/public_template/img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('storage/public_template/css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('storage/public_template/css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('storage/public_template/css/owl.carousel.min.css') }}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{ asset('storage/public_template/css/themify-icons.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('storage/public_template/css/flaticon.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('storage/public_template/css/magnific-popup.css') }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ asset('storage/public_template/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/public_template/css/gijgo.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/public_template/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/public_template/css/all.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('storage/public_template/css/style.css') }}">

@yield('extra_script')
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{ route('index') }}"> <img src="{{ asset('storage/public_template/img/logo.png') }}" alt="{{ config('app.name') }}"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('index') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('public_about') }}">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('public_faqs') }}">FAQs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('public_services') }}">Service</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('public_team') }}">Attorneys</a>
                                </li><?php /*
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Blog
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="blog.html"> blog</a>
                                        <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                        <a class="dropdown-item" href="elements.html">Elements</a>
                                    </div>
                                </li>*/ ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('public_contactus') }}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->


    @yield('main_content')


    <!-- footer part start-->
    <footer class="footer-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6 col-xl-3">
                    <div class="single-footer-widget footer_1">
                        <a href="index.html"> <img src="{{ asset('storage/public_template/img/footer-logo.png') }}" alt=""> </a>
                        <p>Created. Image moving living fowl earth fruitful. Two hath first you're doesn you
                            life above. Living give and earth light for appear moved their behold </p>
                        <div class="social_icon">
                            <a href="#"> <i class="ti-facebook"></i> </a>
                            <a href="#"> <i class="ti-twitter-alt"></i> </a>
                            <a href="#"> <i class="ti-instagram"></i> </a>
                            <a href="#"> <i class="ti-skype"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single-footer-widget">
                        <h4>Our Service</h4>
                        <ul>
                            <li><a href="#">Car accident</a></li>
                            <li><a href="#">Personal injury</a></li>
                            <li><a href="#">Family law</a></li>
                            <li><a href="#">Bank and financial</a></li>
                            <li><a href="#">Capital market</a></li>
                            <li><a href="#">Employment Law</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single-footer-widget footer_icon">
                        <h4>Contact Info</h4>
                        <p>4361 Morningview Lane Artland
                            Latimer, IA 50452</p>
                        <ul>
                            <li><a href="#"><i class="ti-mobile"></i>+02 - 32 365 2654</a></li>
                            <li><a href="#"><i class="ti-email"></i>ariclaw@law.com</a></li>
                            <li><a href="#"><i class="ti-world"></i> ariclawyerfirm.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single-footer-widget footer_3">
                        <h4>Instagram</h4>
                        <div class="footer_img">
                            <div class="single_footer_img">
                                <img src="{{ asset('storage/public_template/img/footer_img/footer_img_1.png') }}" alt="">
                                <a href="#"><i class="ti-instagram"></i></a>
                            </div>
                            <div class="single_footer_img">
                                <img src="{{ asset('storage/public_template/img/footer_img/footer_img_2.png') }}" alt="">
                                <a href="#"><i class="ti-instagram"></i></a>
                            </div>
                            <div class="single_footer_img">
                                <img src="{{ asset('storage/public_template/img/footer_img/footer_img_3.png') }}" alt="">
                                <a href="#"><i class="ti-instagram"></i></a>
                            </div>
                            <div class="single_footer_img">
                                <img src="{{ asset('storage/public_template/img/footer_img/footer_img_4.png') }}" alt="">
                                <a href="#"><i class="ti-instagram"></i></a>
                            </div>
                            <div class="single_footer_img">
                                <img src="{{ asset('storage/public_template/img/footer_img/footer_img_5.png') }}" alt="">
                                <a href="#"><i class="ti-instagram"></i></a>
                            </div>
                            <div class="single_footer_img">
                                <img src="{{ asset('storage/public_template/img/footer_img/footer_img_6.png') }}" alt="">
                                <a href="#"><i class="ti-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-md-12">
                                    <p class="footer-text m-0">
Template edited by <a href="#">Wasiu Adisa</a> | <a>Ariclaw</a> demo is developed by <a href="#" target="_blank">Wasiu Adisa</a></p>
                                    <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Services</a></li>
                                            <li><a href="#">Careers</a></li>
                                            <li><a href="#">FAQ</a></li>
                                        </ul>
                                    </div>
                                    <div class="footer_menu">
                                        <ul>@if (Auth::user())
                                            <li><a style="color: white;" href="{{ route('dashboard') }}">Admin Dashboard</a></li>@else
                                            <li><a style="color: white;" target="_blank" href="{{ route('login') }}">Admin Login</a></li>@endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <!-- Bootstrap 5 -->
    <div class="floating-button-div">
        <a id="button" class="btn btn-dark" style="top:40%;right:1%;position:fixed;z-index: 9999" href="../../../">Developer Website</a>
    </div>

    <!-- jquery plugins here-->
    <script src="{{ asset('storage/public_template/js/jquery-1.12.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('storage/public_template/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('storage/public_template/js/bootstrap.min.js') }}"></script>
    <!-- easing js -->
    <script src="{{ asset('storage/public_template/js/jquery.magnific-popup.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('storage/public_template/js/swiper.min.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('storage/public_template/js/masonry.pkgd.js') }}"></script>
    <!-- particles js -->
    <script src="{{ asset('storage/public_template/js/owl.carousel.min.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('storage/public_template/js/slick.min.js') }}"></script>
    <script src="{{ asset('storage/public_template/js/gijgo.min.js') }}"></script>
    <script src="{{ asset('storage/public_template/js/jquery.nice-select.min.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('storage/public_template/js/custom.js') }}"></script>
</body>

</html>