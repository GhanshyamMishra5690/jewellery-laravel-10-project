<!doctype html>
<html class="no-js" lang="en"> 
    <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>eTrade || Coming Soon</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('user/assets/css/vendor/bootstrap.min.css')}}">   
    <link rel="stylesheet" href="{{asset('user/assets/css/style.min.css')}}"> 
    <style>
        ._failed{ border-bottom: solid 4px red !important; }
._failed i{  color:red !important;  }

._success {
    box-shadow: 0 15px 25px #00000019;
    padding: 45px;
    width: 100%;
    text-align: center;
    margin: 40px auto;
    border-bottom: solid 4px #28a745;
}

._success i {
    font-size: 55px;
    color: #28a745;
}

._success h2 {
    margin-bottom: 12px;
    font-size: 40px;
    font-weight: 500;
    line-height: 1.2;
    /* margin-top: 10px; */
}

._success p {
    margin-bottom: 0px;
    font-size: 18px;
    color: #495057;
    font-weight: 500;
}
    </style>
</head> 
<body> 
    <div class="comming-soon-area">

        <div class="row align-items-center">
            <div class="col-xl-4 col-lg-6">
                <div class="comming-soon-banner bg_image bg_image--13"></div>
            </div>
            <div class="col-lg-5 offset-xl-1">
                <div class="comming-soon-content">
                    <div class="brand-logo">
                        <img src="{{asset('user/assets/images/logo/logo-large.png')}}" alt="Logo">
                    </div>  
                    <div class="row justify-content-center">
                        @if(session('status') == 'success')
                            <div class="message-box _success">
                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                <h2> {{ session('message') }} </h2> 
                            </div> 
                            <div class="payment-details">
                                <h3>Payment Details</h3>
                                <p><strong>Payment ID:</strong> {{ $paymentId }}</p>
                                <p><strong>Order ID:</strong> {{ $orderId }}</p>
                                <p><strong>Payer Name:</strong> {{ $payerName }}</p>
                                <p><strong>Amount:</strong> {{ $amount }} {{ $currency }}</p>
                                <p><strong>Payment Date:</strong> {{ $paymentDate }}</p>
                            </div>
                        @endif 
                        @if(session('status') == 'error')
                            <div class="message-box _success _failed">
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                                <h2> {{ session('message') }}  </h2>  
                            </div>
                        @endif
                          
                     </div> 
                </div>
                
            </div>
        </div>
    </div> 
    <script>
        // Clear session data and redirect to the home page after 5 seconds
        setTimeout(function() {
            @if(session()->has('status'))
                @php
                    session()->forget('status');
                    session()->forget('message');
                @endphp
            @endif
            window.location.href = "{{ url('/') }}"; // Redirect to the home page
        }, 5000);
         // 5000 milliseconds = 5 seconds
    </script>
</body>
 </html>