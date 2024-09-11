@extends('auth.app')


@section('auth_content')
<div class="axil-signin-area">

    <!-- Start Header -->
    <div class="signin-header">
        <div class="row align-items-center">
            <div class="col-xl-4 col-sm-6">
                <a href="index.html" class="site-logo"><img src="{{asset('user/assets/images/logo/logo.png')}}" alt="logo"></a>
            </div>
            <div class="col-md-2 d-lg-block d-none">
                <a href="{{route('login')}}" class="back-btn"><i class="far fa-angle-left"></i></a>
            </div>
            <div class="col-xl-6 col-lg-4 col-sm-6">
                <div class="singin-header-btn">
                    <p>Already a member?</p>
                    
                   
                    
                    <a href="{{route('login')}}" class="sign-up-btn axil-btn btn-bg-secondary">Sign In  </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->

    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <div class="axil-signin-banner bg_image bg_image--10">
                <h3 class="title">We Offer the Best Products</h3>
            </div>
        </div>
        <div class="col-lg-6 offset-xl-2">
            <div class="axil-signin-form-wrap">
                <div class="axil-signin-form">
                    <h3 class="title">Forgot Password?</h3>
                    <p class="b2 mb--55">Enter the email associated with your account to reset your password.</p>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->has('email'))
                        <div class="alert alert-danger mt-1">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.forgot.post') }}" class="singin-form" id="">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                             <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="axil-btn btn-bg-primary submit-btn">Send Password Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection