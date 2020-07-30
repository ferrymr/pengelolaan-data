<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shop</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Arimo:400,400i,700,700i%7CLato:300,300i,400,400i,700,700i,900%7COpen+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style-custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    @yield('styles')
</head>
<body class="productsgrid-page">
    
    <x-topbar>
        <a href="#">Menjadi Reseller</a> &nbsp;&nbsp; <a href="#">Konsultasi Kecantikan</a>
    </x-topbar>
    
    <!-- header -->
    <x-header />

    <!-- header mobile -->
    <x-header-mobile />

    <!-- main content -->
    <div class="main-content main-content-product no-sidebar">
        <div class="container">

            @yield('content')

        </div>
    </div>

    <!-- footer -->
    <x-footer />

    <!-- footer mobile -->
    <x-footer-mobile />

    <a href="#" class="backtotop"><i class="pe-7s-angle-up"></i></a>

    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>	
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.elevateZoom.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.actual.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel2.thumbs.min.js') }}"></script>
    <script src="{{ asset('assets/js/mobilemenu.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mCustomScrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/frontend-plugin.js') }}"></script>

    @yield('scripts')
</body>
</html>