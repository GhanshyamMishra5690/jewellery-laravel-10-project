@extends('auth.app')


@section('auth_content')
<div class="axil-signin-area">
 
    <div class="signin-header">
        <div class="row align-items-center">
            <div class="col-xl-4 col-sm-6">
                <a href="index.html" class="site-logo"><img src="{{asset('user/assets/images/logo/logo.png')}}" alt="logo"></a>
            </div>
            <div class="col-md-2 d-lg-block d-none">
                <a href="forgot-password.html" class="back-btn"><i class="far fa-angle-left"></i></a>
            </div>
            <div class="col-xl-6 col-lg-4 col-sm-6">
                <div class="singin-header-btn">
                    <p>Already a member? <a href="{{route('login')}}" class="sign-in-btn">Sign In</a></p>
                </div>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <div class="axil-signin-banner bg_image bg_image--10">
                <h2 class="title">We Offer the Best Products</h2>
            </div>
        </div>
        <div class="col-lg-6 offset-xl-2">
            <div class="axil-signin-form-wrap">
                <div class="axil-signin-form">
                    <h3 class="title mb--35">Reset Password</h3>
                    <form method="POST" action="{{ route('admin.reset.password') }}" class="singin-form" id="">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $email }}">
                        <div class="form-group">
                            <label>New password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __('Confirm Password') }}</label>
                            <input  type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                        </div>  
                        <div class="form-group">
                            <button type="submit" class="axil-btn btn-bg-primary submit-btn">Resrt Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection