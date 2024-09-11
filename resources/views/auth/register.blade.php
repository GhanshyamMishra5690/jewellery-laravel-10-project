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
                    <h3 class="title">We Offer the Best Products</h3>
                </div>
            </div>
            <div class="col-lg-6 offset-xl-2">
                
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h3 class="title">Sign Up to eTrade.</h3> 
                        @if (Session::has('error-message'))
                            <p class="alert alert-danger" role="alert">{{ Session::get('error-message') }}</p>
                        @endif
                        <form method="POST" action="{{ route('user_signup') }}" class="singin-form" enctype="multipart/form-data" id="registerFormValidate">
                            @csrf 
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>{{ __('Username') }}</label>
                                        <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <span class="invalid-error" id="name-error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>{{ __('Email') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <span class="invalid-error" id="email-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">
                                       <span  class="invalid-error" id="password-error"></span>
                                    </div> 
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>{{ __('Confirm Password') }}</label>
                                        <input id="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation"  autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <span class="invalid-error" id="password_confirmation-error"></span>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>{{ __('Phone No') }}</label>
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <span class="invalid-error" id="phone-error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>{{ __('User Type') }}</label>
                                        <select class="select" name="userType" id="userType">
                                            <option value="">Select User Type</option>
                                            @foreach (config('constants.USER_TYPES') as $key => $value)
                                                @if ($key != 'ADMIN')
                                                  <option value="{{$value}}">{{$key}}</option>
                                                @endif 
                                            @endforeach 
                                        </select> 
                                        <span class="invalid-error" id="userType-error"></span>
                                    </div>
                                </div> 
                            </div>  
                            <div class="row">
                                <div class="col-lg-5" > 
                                    <div id="show_document_container" style="{{ $errors->has('document') ? '' : 'display: none;' }}" class="mt-4">
                                        <label class="title mb-3" style="font-size:14px;color: #777777;">Upload Document</label>
                                        <input type="file" name="document" id="document" class="file-upload"/>
                                        @error('document')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <span class="invalid-error" id="document-error"></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group mt-3" style="margin-bottom: 10px !important;">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <button type="submit" id="submitRegister" class="axil-btn btn-bg-primary submit-btn btn-sm">{{ __('Submit') }}</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection