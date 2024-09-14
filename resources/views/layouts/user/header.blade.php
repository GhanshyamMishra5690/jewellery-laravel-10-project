<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Natural Diamond and Lab Grown Diamond | The Surat Diamond</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/sal.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor/base.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{asset('admin/plugins/toastr/toastr.min.css') }}"> 
    @stack('styles')
    <style>
        .invalid-error{
            color: red !important;
            font-size: 14px !important;
            padding: 0 8px;
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
    <script>
        var baseUrl = '{{ url('/') }}'; 
    </script>
</head>


