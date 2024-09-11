
<!doctype html>
<html class="no.js')}}" lang="en">


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/coming-soon.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Jun 2024 13:40:00 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>eTrade || Coming Soon</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/font-awesome.css')}}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/slick-theme.css')}}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/sal.css')}}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/base.css')}}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/style.min.css')}}">

</head>


<body>
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

    <div class="comming-soon-area">

        <div class="row align-items-center">
            <div class="col-xl-4 col-lg-6">
                <div class="comming-soon-banner bg_image bg_image--13"></div>
            </div>
            <div class="col-lg-5 offset-xl-1">
                <div class="comming-soon-content">
                    <div class="brand-logo">
                        <img src="{{asset('user/assets/images/verify.jpg')}}" alt="Logo">
                    </div>
                    <h2 class="title">Verification Pending</h2>
                    <p class="text-red"> {{ Session::get('status') }}</p> 
                                {{Session::forget('status'); }}
                                {{  auth()->logout();}}
                </div>
            </div>
        </div>
    </div>

    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ asset('user/assets/js/vendor/modernizr.min.js')}}"></script>
    <!-- jQuery JS -->
    <script src="{{ asset('user/assets/js/vendor/jquery.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('user/assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{ asset('user/assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{ asset('user/assets/js/vendor/slick.min.js')}}"></script>
    <script src="{{ asset('user/assets/js/vendor/js.cookie.js')}}"></script> 
    <script src="{{ asset('user/assets/js/vendor/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('user/assets/js/vendor/jquery.ui.touch-punch.min.js')}}"></script>
    <script src="{{ asset('user/assets/js/vendor/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('user/assets/js/vendor/sal.js')}}"></script>
    <script src="{{ asset('user/assets/js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('user/assets/js/vendor/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('user/assets/js/vendor/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('user/assets/js/vendor/counterup.js')}}"></script>
    <script src="{{ asset('user/assets/js/vendor/waypoints.min.js')}}"></script>

    <!-- Main JS -->
    <script src="{{ asset('user/assets/js/main.js')}}"></script>

</body>


<!-- Mirrored from new.axilthemes.com/demo/template/etrade/coming-soon.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Jun 2024 13:40:00 GMT -->
</html>