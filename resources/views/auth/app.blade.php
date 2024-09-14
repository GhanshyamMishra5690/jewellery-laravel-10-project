<!doctype html>
<html class="no-js" lang="en">

 <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>eTrade || Sign In</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('user/assets/images/favicon.png')}}"> 
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
     
    <style>
        .error {
            color: red;
            font-size: 0.875em;
        }
        #loader {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            font-size: 27px;
        }
    </style>
</head>


<body>
    <div id="loader" style="display: none;">Loading...</div> 
    @yield('auth_content')
    
    <script src="{{ asset('user/assets/js/vendor/modernizr.min.js') }}"></script> 
    <script src="{{ asset('user/assets/js/vendor/jquery.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('user/assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/js.cookie.js') }}"></script> 
    <script src="{{ asset('user/assets/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/sal.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/counterup.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/waypoints.min.js') }}"></script> 
    <script src="{{ asset('user/assets/js/main.js') }}"></script>
    {{-- <script src="{{ asset('user/assets/js/main.js') }}"></script> --}}
    <script src="{{ asset('admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/helper.js') }}"></script> 
 
</body> 
</html>