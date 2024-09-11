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
    {{-- <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/sal.css')}}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/magnific-popup.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/base.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('user/assets/css/style.min.css')}}">
<style>
    .invalid-error{
        color: red !important;
        font-size: 14px !important;
        padding: 0 8px;
    }
</style>
</head>


<body>
    <div class="axil-signin-area">

        <div class="signin-header">
            <div class="row align-items-center">
                <div class="col-sm-4">
                    <a href="#" class="site-logo"><img src="{{asset('user/assets/images/logo/logo.png')}}" alt="logo"></a>
                </div>
                <div class="col-sm-8">
                    <div class="singin-header-btn">
                        <p>Existing Member?</p>
                        <a href="{{url('/login')}}" class="axil-btn btn-bg-secondary sign-up-btn">{{ __('Login') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->

        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="axil-signin-banner bg_image bg_image--10">
                    <h3 class="title">We Offer the Best Products {{ $user->otp->otp }}</h3>
                </div>
            </div>
            <div class="col-lg-6 offset-xl-2 mt-5">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form mt-5">
                        <h5 class="title">Please enter the one time password to verify your account </h5> 
                         
                        <form method="POST" action="{{ route('otp.verify.submit') }}" class="singin-form" enctype="multipart/form-data" id="otpVerification">
                            @csrf 
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        
                                       
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <input id="otp" type="number" class="form-control @error('otp') is-invalid @enderror" name="otp"  >
                                        <label style="float: right;color:red;">OTP Expires in: <span id="countdown"></span></label>
                                        @error('otp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                        <span class="invalid-error" id="otp-error"></span>
                                    </div>
                                </div> 
                            </div> 
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <button type="submit" id="submitRegister" class="axil-btn btn-bg-primary submit-btn btn-sm">{{ __('Validate') }}</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
 <script src="{{ asset('user/assets/js/vendor/modernizr.min.js') }}"></script> 
 <script src="{{ asset('user/assets/js/vendor/jquery.js') }}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
 <script src="{{asset('admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
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
 <script src="{{ asset('admin/helper.js') }}"></script> 
 
<script>
    var fullRedirectUrl = '{{ url('otp-expiry') }}/' + '{{ $user->otp->id }}/'+ '{{ $user->otp->otp }}';
    console.log(fullRedirectUrl);
        document.addEventListener('DOMContentLoaded', function () {
        // Parse the expiration time passed from Laravel
        var expiresAt = new Date('{{ $expiresAt }}').getTime();
 
        // Set up the countdown timer
        var timer = setInterval(function () {
            var now = new Date().getTime(); // Get the current time
            var distance = expiresAt - now; // Calculate the remaining time

            // Calculate minutes and seconds remaining
            var minutes = Math.floor((distance % (1000 * 3600)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the countdown in the element with ID 'countdown'
            document.getElementById('countdown').innerHTML = minutes + "m " + seconds + "s ";

            // Check if the countdown has finished
            if (distance < 0) {
                clearInterval(timer); // Stop the timer
                document.getElementById('countdown').innerHTML = "EXPIRED"; // Display expired message

                var fullRedirectUrl = '{{ url('otp-expiry') }}/' + '{{ $user->otp->id }}/'+ '{{ $user->otp->otp }}';
                window.location.href = fullRedirectUrl; 
            }
        }, 1000); // Run the function every second
    }); 
</script>
</body> 
</html>