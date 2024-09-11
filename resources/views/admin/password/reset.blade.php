<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .hidden {
            display: none;
        }

        .login-page,
        .register-page {
            height: 90vh !important;
        }

        .login-box,
        .register-box {
            width: 500px !important;
        }

        .login-card-body,
        .register-card-body {
            border-radius: 10px !important;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">

        <!-- /.login-logo -->
        <div class="card">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Session::has('error-message'))
                <p class="alert alert-info">{{ Session::get('error-message') }}</p>
            @endif
            <div class="card-body" >
                <div class="login-logo">
                    <a href="#"><b>Forget Password</b></a>
                </div>
                <form method="POST" action="{{ route('admin.reset.password') }}" class="singin-form" id="">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <div class="form-group">
                        <label>{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control " name="password"  required>
                       
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
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn btn-primary ">{{ __('Reset Password') }}</button>
                        
                    </div>
                </form>  
            </div> 
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/helper.js') }}"></script> 
 
</body>

</html>
