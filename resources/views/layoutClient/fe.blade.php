<!DOCTYPE html>
<html lang="en">

<head>
    <title>Anta</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('images/icons/logo.') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/linearicons-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/MagnificPopup/magnific-popup.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <!--===============================================================================================-->
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>

<body class="animsition">

    <!-- Header -->
    <header>
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <!-- Topbar -->
            <div class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                        Miễn phí vận chuyển với đơn hàng trên 1.500.000 VNĐ
                    </div>

                    <div class="right-top-bar flex-w h-full">
                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            Hotline: 034548www
                        </a>
                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            Email: huogthuwww@gmail.com
                        </a>
                    </div>
                </div>
            </div>

            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop container">

                    <!-- Logo desktop -->
                    <a href="{{ route('home') }}" class="logo">
                        <img src="{{ asset('images/icons/Anta_logo.png') }}" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu text-6xl">
                            <li class="active-menu">
                                <a href="{{ route('home') }}">Trang chủ</a>
                            </li>
                            @foreach($categories as $category)
                            <li>
                                <div href="#">{{$category->name}}</div>
                                <ul class="sub-menu">
                                    @foreach($types as $type)
                                    <li><a href="{{route('client.type',['name'=>$category->name,'slug'=>$type->slug])}}">{{$type->name}}</a></li>
                                        @endforeach
                                </ul>
                            </li>
                            @endforeach
                            <li class="label1" data-label1="hot">
                                <a href="shoping-cart.html">up to 50%</a>
                            </li>

                            <li class="label1" data-label1="comming soon">
                                <a href="#">Anta kid</a>
                            </li>

                            <li>
                                <a href="#">Liên hệ</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>

                        <a href="{{ route('fe.cart.list') }}">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-notify="2"
                                id="cart">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                        </a>
                        <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 "
                            data-notify="2">
                            <i class="zmdi zmdi-favorite-outline"></i>
                        </a>
                        @if (Route::has('login'))
                            @auth
                                <span class="has-children">

                                    <button class=" text-sm underline"
                                        data-toggle="dropdown">{{ \Illuminate\Support\Facades\Auth::user()->name }}</button>
                                    <ul class="dropdown-menu btn-secondary">
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                    {{ __('Đăng xuất') }}
                                                </x-dropdown-link>
                                            </form>
                                        </li>
                                    </ul>
                                </span>
                            @else
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11"
                                        type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="zmdi zmdi-account"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        @if (Route::has('register'))
                                            <a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a>
                                        @endif
                                        @if (Route::has('register'))
                                            <a class="dropdown-item" href="{{ route('register') }}">Đăng kí</a>
                                        @endif
                                    </div>
                                </div>
                            @endauth
                        @endif

                    </div>
                </nav>
            </div>
        </div>
    </header>
        @section('content')
        @show
        <!-- Footer -->
        <footer class="bg3 p-t-75 p-b-32">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3 p-b-50">
                        <h4 class="stext-301 cl0 p-b-30">
                            CÁC DANH MỤC
                        </h4>
                        <ul>
                            @foreach($categories as $category)
                            <li class="p-b-10">
                                <a href="{{route('client.category',['name'=>$category->name])}}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
                                    {{$category->name}}
                                </a>
                            </li>
                            @endforeach
                            <li class="p-b-10">
                                <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                    Trẻ em <small>(comming soon)</small>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-6 col-lg-3 p-b-50">
                        <h4 class="stext-301 cl0 p-b-30">
                            Chính sách
                        </h4>

                        <ul>
                            <li class="p-b-10">
                                <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                    Chính sách vận chuyển
                                </a>
                            </li>

                            <li class="p-b-10">
                                <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                    Bảo hành/bảo trì
                                </a>
                            </li>

                            <li class="p-b-10">
                                <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                    Đổi/trả hàng
                                </a>
                            </li>

                            <li class="p-b-10">
                                <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                    Bảo mật thông tin
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-sm-6 col-lg-3 p-b-50">
                        <h4 class="stext-301 cl0 p-b-30">
                            Liên hệ
                        </h4>

                        <p class="stext-107 cl7 size-201">
                            Địa chỉ
                        </p>
                        <p class="stext-107 cl7 size-201">
                            SĐT
                        </p>
                        <p class="stext-107 cl7 size-201">
                            email
                        </p>

                        <div class="p-t-27">
                            <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                                <i class="fa fa-instagram"></i>
                            </a>

                            <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                                <i class="fa fa-zalo"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 p-b-50">
                        <h4 class="stext-301 cl0 p-b-30">
                            Đăng kí thông tin
                        </h4>

                        <form>
                            <div class="wrap-input1 w-full p-b-4">
{{--                                <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email"--}}
{{--                                    placeholder="Nhập địa chỉ email">--}}
                                <div class="focus-input1 trans-04"></div>
                            </div>

                            <div class="p-t-18">
                                <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                    Đăng ký
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="p-t-40">
                    <div class="flex-c-m flex-w p-b-18">
                        <a href="#" class="m-all-1">
                            <img src="{{asset('images/icons/icon-pay-01.png')}}" alt="ICON-PAY">
                        </a>

                        <a href="#" class="m-all-1">
                            <img src="{{asset('images/icons/icon-pay-02.png')}}" alt="ICON-PAY">
                        </a>

                        <a href="#" class="m-all-1">
                            <img src="{{asset('images/icons/icon-pay-03.png')}}" alt="ICON-PAY">
                        </a>

                        <a href="#" class="m-all-1">
                            <img src="{{asset('images/icons/icon-pay-04.png')}}" alt="ICON-PAY">
                        </a>

                        <a href="#" class="m-all-1">
                            <img src="{{asset('images/icons/icon-pay-05.png')}}" alt="ICON-PAY">
                        </a>
                    </div>

                    <p class="stext-107 cl6 txt-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | Made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="#" target="_blank">Huogthu</a> &amp;
                        distributed by
                        <a href="#" target="_blank">Team 10</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                    </p>
                </div>
            </div>
        </footer>


        <!-- Back to top -->
        <div class="btn-back-to-top" id="myBtn">
            <span class="symbol-btn-back-to-top">
                <i class="zmdi zmdi-chevron-up"></i>
            </span>
        </div>

        <!-- Modal1 -->
        <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
            <div class="overlay-modal1 js-hide-modal1"></div>

            <div class="container">
                <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                    <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                        <img src="images/icons/icon-close.png" alt="CLOSE">
                    </button>

                    <div class="row">
                        <div class="col-md-6 col-lg-7 p-b-30">
                            <div class="p-l-25 p-r-30 p-lr-0-lg">
                                <div class="wrap-slick3 flex-sb flex-w">
                                    <div class="wrap-slick3-dots"></div>
                                    <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                    <div class="slick3 gallery-lb">
                                        <div class="item-slick3" data-thumb="images/product-detail-01.jpg">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="images/product-detail-01.jpg" alt="IMG-PRODUCT">

                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                    href="images/product-detail-01.jpg">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="item-slick3" data-thumb="images/product-detail-02.jpg">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">

                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                    href="images/product-detail-02.jpg">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="item-slick3" data-thumb="images/product-detail-03.jpg">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">

                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                    href="images/product-detail-03.jpg">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-5 p-b-30">
                            <div class="p-r-50 p-t-5 p-lr-0-lg">
                                <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                    Lightweight Jacket
                                </h4>

                                <span class="mtext-106 cl2">
                                    $58.79
                                </span>

                                <p class="stext-102 cl3 p-t-23">
                                    Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris
                                    consequat
                                    ornare feugiat.
                                </p>

                                <!--  -->
                                <div class="p-t-33">
                                    <div class="flex-w flex-r-m p-b-10">
                                        <div class="size-203 flex-c-m respon6">
                                            Size
                                        </div>

                                        <div class="size-204 respon6-next">
                                            <div class="rs1-select2 bor8 bg0">
                                                <select class="js-select2" name="time">
                                                    <option>Choose an option</option>
                                                    <option>Size S</option>
                                                    <option>Size M</option>
                                                    <option>Size L</option>
                                                    <option>Size XL</option>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex-w flex-r-m p-b-10">
                                        <div class="size-203 flex-c-m respon6">
                                            Color
                                        </div>

                                        <div class="size-204 respon6-next">
                                            <div class="rs1-select2 bor8 bg0">
                                                <select class="js-select2" name="time">
                                                    <option>Choose an option</option>
                                                    <option>Red</option>
                                                    <option>Blue</option>
                                                    <option>White</option>
                                                    <option>Grey</option>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex-w flex-r-m p-b-10">
                                        <div class="size-204 flex-w flex-m respon6-next">
                                            <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>

                                                <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                    name="num-product" value="1">

                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>

                                            <button
                                                class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                                Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!--  -->
                                <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                                    <div class="flex-m bor9 p-r-10 m-r-11">
                                        <a href="#"
                                            class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                            data-tooltip="Add to Wishlist">
                                            <i class="zmdi zmdi-favorite"></i>
                                        </a>
                                    </div>

                                    <a href="#"
                                        class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                        data-tooltip="Facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>

                                    <a href="#"
                                        class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                        data-tooltip="Twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>

                                    <a href="#"
                                        class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                        data-tooltip="Google Plus">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--===============================================================================================-->
        <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
        <script>
            $(".js-select2").each(function() {
                $(this).select2({
                    minimumResultsForSearch: 20,
                    dropdownParent: $(this).next('.dropDownSelect2')
                });
            })
        </script>
        <!--===============================================================================================-->
        <script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
        <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
        <script src="{{ asset('js/slick-custom.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('vendor/parallax100/parallax100.js') }}"></script>
        <script>
            $('.parallax100').parallax100();
        </script>
        <!--===============================================================================================-->
        <script src="{{ asset('vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
        <script>
            $('.gallery-lb').each(function() { // the containers for all your galleries
                $(this).magnificPopup({
                    delegate: 'a', // the selector for gallery item
                    type: 'image',
                    gallery: {
                        enabled: true
                    },
                    mainClass: 'mfp-fade'
                });
            });
        </script>
        <!--===============================================================================================-->
        <script src="{{ asset('vendor/isotope/isotope.pkgd.min.js') }}"></script>
        <!--===============================================================================================-->
        {{-- <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script> --}}
        <script>
            // $('.js-addwish-b2').on('click', function(e) {
            //     e.preventDefault();
            // });

            // $('.js-addwish-b2').each(function() {
            //     var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            //     $(this).on('click', function() {
            //         swal(nameProduct, "is added to wishlist !", "success");

            //         $(this).addClass('js-addedwish-b2');
            //         $(this).off('click');
            //     });
            // });

            // $('.js-addwish-detail').each(function() {
            //     var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            //     $(this).on('click', function() {
            //         swal(nameProduct, "is added to wishlist !", "success");

            //         $(this).addClass('js-addedwish-detail');
            //         $(this).off('click');
            //     });
            // });

            /*---------------------------------------------*/

            // $('.js-addcart-detail').each(function() {
            //     var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            //     $(this).on('click', function() {
            //         swal(nameProduct, "is added to cart !", "success");
            //     });
            // });
        </script>
        <!--===============================================================================================-->
        {{-- <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script>
        $('.js-pscroll').each(function() {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function() {
                ps.update();
            })
        });
    </script> --}}
        <!--===============================================================================================-->
        <script src="{{ asset('js/main.js') }}"></script>
        @yield('js')
</body>

</html>
