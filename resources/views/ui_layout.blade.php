<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>co55</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/home.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl.theme.default.min.css')}}" rel="stylesheet">
</head>
<body class="nav_pad">

{{--NAVBAR--}}
<nav class="navbar fixed-top navbar-expand-lg dark-pg">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img alt="" class="logo position-relative p-0 m-0" src="{{asset('images/logo.png')}}">
        </a>
        <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler collapsed co-55"
                data-target="#navbarSupportedContent" data-toggle="collapse"
                type="button">
            <i aria-hidden="true" class="fas fa-bars blue"></i>
        </button>
        <div class="navbar-collapse collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto text-center text-capitalize">

                <li class="nav-item mx-1">
                    <a aria-current="page" class="nav_hover nav-link" href="{{ url('about-us') }}">About Us</a>
                </li>

                <li class="nav-item mx-1">
                    <div class="dropdown">
                        <a aria-current="page"
                           class="nav_hover nav-link dropdown-toggle d-lg-block d-none" href="{{ url('services') }}">Services</a>
                        <span aria-current="page"
                              class="nav-link text-white dropdown-toggle d-block d-lg-none">Services</span>
                        <div aria-labelledby="dropdownMenuButton"
                             class="dropdown-menu dark-pg py-3">
                            @foreach($services as $item)
                            <a class="dropdown-item nav_hover no" href="{{ url('services#'.$item->title) }}">{{$item->title}}</a>
                            @endforeach
                        </div>
                    </div>
                </li>

                <li class="nav-item mx-1">
                    <div class="dropdown">
                        <a aria-current="page"
                           class=" nav_hover nav-link dropdown-toggle d-lg-block d-none"
                           href="{{ url('locations') }}" id="dropdownMenuButton2">Locations</a>
                        <span aria-current="page"
                              class="nav-link text-white dropdown-toggle d-block d-lg-none">Locations</span>
                        <div aria-labelledby="dropdownMenuButton2"
                             class="dropdown-menu dark-pg py-3">
                            @foreach($locations as $item)
                            <a class="nav_hover dropdown-item" href="{{ url('locations/'.$item->id) }}">{{$item->title}}</a>
                            @endforeach
                        </div>
                    </div>
                </li>

                <li class="nav-item my-1 my-lg-0 mx-lg-1">
                    <a aria-current="page"
                       class="nav-link blue-bg mx-2 text-white d-flex justify-content-center
                    align-items-center p-1 h-100 nav-btn" href="{{ url('make-an-inquiry') }}">
                        <span class="px-2"><i class="fa-solid fa-mobile-screen pr-3"></i>Inquire Now</span>
                    </a>
                </li>

                <li class="nav-item my-1 my-lg-0 mx-lg-1">
                    <a aria-current="page"
                       class="nav-link nav-btn blue-bg mx-2 text-white d-flex justify-content-center
                    align-items-center p-1 h-100 nav-btn" href="{{url('/coLogin')}}">
                        <span class="px-2"><i class="fa-regular fa-user pr-3"></i>Log In</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>


@yield('content')


{{--FOOTER--}}
<div class="dark-image-bg">
    <div class="overlay">
        <div class="container">


            <div class="row justify-content-center pt-5">
                <div class="mb-4 mb-lg-0 col-lg-3 col-md-4 col-12 text-center text-md-left">
                    <a href="/">
                        <img alt="" src="{{asset('images/footer-logo.svg')}}" width="100">
                    </a>
                </div>
                <div class="d-none d-lg-flex col-md-3 col-lg-3 flex-column">
                    <p class="text-white">Locations</p>
                    @foreach($locations as $item)
                    <p class="text-white mb-1">{{$item->title}}<a class="co-55" href="{{ url('locations/'.$item->id) }}">&nbsp;&nbsp;View On Map</a></p>
                    @endforeach
                </div>
                <div class="col-lg-3 col-md-4 col-6 d-flex flex-column">
                    <p><a class="footer_hover" href="{{ url('services') }}">Services</a></p>
                    <p><a class="footer_hover" href="{{ url('faqs') }}">FAQs</a></p>
                    <p><a class="footer_hover" href="{{ url('careers') }}">Careers</a></p>
                </div>
                <div class="col-lg-3 col-md-4 col-6 d-flex flex-column">
                    <p><a class="footer_hover" href="{{ url('terms-and-conditions') }}">Terms<span class="d-none d-lg-inline"> and Conditions</span></a>
                    </p>
                    <p><a class="footer_hover" href="{{ url('privacy-policy') }}">Privacy<span class="d-none d-lg-inline"> Policy</span></a></p>
                    <p><a class="footer_hover" href="{{ url('contact-us') }}">Contact Us</a></p>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12 col-sm-12 py-3">
                    <hr class="bg-white">
                </div>
            </div>

            <div class="row justify-content-center pt-3 pb-5">
                <div class="col-lg-4 col-sm-12 order-lg-1 order-3">
                    <p class="text-white">
                        Copyright ©2023 All rights reserved. <br> Designed & developed by
                        <a class="co-55" target="_blank" href="https://intcore.com/">intcore.</a>
                    </p>
                </div>
                <div
                    class="col-lg-3 my-3 my-lg-0 col-sm-12 d-flex align-self-center justify-content-lg-center order-lg-2 order-2">
                    @foreach($links as $link)
                    <a target="_blank" class="mx-lg-3 mr-4 footer_hover" href="https://{{$link->body}}">
                        <img alt="" src="{{asset('images/'.$link->logo)}}" width="20" height="20">
                    </a>
                    @endforeach

                </div>
                <div class="col-lg-5 col-sm-12 d-flex align-self-center flex-column order-lg-3 order-1">
                    <div class="row d-flex justify-content-between">

                        <div class="col-sm-12 col-lg-6 my-2">
                            <i aria-hidden="true" class="text-white fas fa-mobile-alt"></i>
                            <a class="media_hover">+201004847171</a>
                        </div>

                        <div class="col-sm-12 col-lg-6 my-2">
                            <i aria-hidden="true" class="text-white fas fa-envelope-open"></i>
                            <a class="media_hover">info@co55eg.com</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/jquery-3.6.2.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script>
    $(document).ready(function () {
        function e() {
            window.screen.availWidth > 992 && ($(".custom-owl .owl-item.active:eq(1)").css({transform: "scale(1.1)"}), $(".custom-owl .owl-item.active").not(":eq(1)").css({transform: "scale(0.7)"}));
        }
        $(".owl-carousel-main").owlCarousel({
            loop: !0,
            margin: 10,
            responsiveClass: !0,
            dots: !1,
            nav: !0,
            autoplay: !1,
            autoplayTimeout: 1e4,
            autoWidth: !1,
            navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
            responsive: {0: {items: 1, nav: !0}, 600: {items: 2, nav: !0}, 1000: {items: 3, nav: !0}},
        }),
            setInterval(() => e(), 1),
            e();
    });
</script>
@stack('uiScripts')
</body>
</html>




