@extends('auth.app')


@section('auth_content')

<div class="axil-signin-area">

    <div class="signin-header">
        <div class="row align-items-center">
            <div class="col-sm-4">
                <a href="#" class="site-logo"><img src="{{asset('user/assets/images/logo/logo.png')}}" alt="logo"></a>
            </div>
            <div class="col-sm-8">
                <div class="singin-header-btn">
                    <p>Not a member?</p>
                    <a href="{{url('/register')}}" class="axil-btn btn-bg-secondary sign-up-btn">{{ __('Register') }}</a>
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
                <div class="axil-signin-form w-75">
                    <h3 class="title">Sign in to eTrade.</h3>
                    @if (Session::has('error-message'))
                        <p class="alert alert-info">{{ Session::get('error-message') }}</p>
                    @endif
                    <form method="POST" action="{{ route('login') }}" class="singin-form" id="login_form">
                        @csrf 
                        <div class="form-group">
                            <label>{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> 
                        <div class="form-group d-flex align-items-center justify-content-between">
                            <button type="submit" class="axil-btn btn-bg-primary submit-btn">{{ __('Login') }}</button>
                            @if (Route::has('password.forgot'))
                            <a class="forgot-btn" href="{{ route('password.forgot', ['identifier' => 'regular_user']) }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection