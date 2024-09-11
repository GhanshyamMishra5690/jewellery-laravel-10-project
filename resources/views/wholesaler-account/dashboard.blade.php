@extends('layouts.main')


@section('content')

<main class="main-wrapper">
    <!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="index.html">Welcome , </a></li>
                            <li class="axil-breadcrumb-item active" aria-current="page"> {{ auth()->user()->name }}</li>
                        </ul>
                        <h1 class="title">Wholesaler  Account</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="inner">
                        
                        <div class="bradcrumb-thumb">
                            @if (empty(auth()->user()->avatar))
                            <img src="{{asset('user/assets/images/avatar.jpg')}}" alt="Image" class="img-responsive profile-logo" width="50px" id="saler-user-img">
                            @else 
                            <img src="{{ asset('storage/'.auth()->user()->avatar)}}" alt="Image" class="img-responsive profile-logo" width="50px" id="saler-user-img">
                            @endif 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->

    <div class="axil-dashboard-area axil-section-gap">
        <div class="container">
            <div class="axil-dashboard-warp">
               
                <div class="row">
                    <div class="col-xl-3 col-md-4">
                        <aside class="axil-dashboard-aside">
                            <nav class="axil-dashboard-nav">
                                <div class="nav nav-tabs" role="tablist">
                                    <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-dashboard" role="tab" aria-selected="true"><i class="fas fa-th-large"></i>Dashboard</a>
                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-orders" role="tab" aria-selected="false" tabindex="-1"><i class="fas fa-shopping-basket"></i>Orders</a>
                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-downloads" role="tab" aria-selected="false" tabindex="-1"><i class="fas fa-file-download"></i>Downloads</a>
                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-address" role="tab" aria-selected="false" tabindex="-1"><i class="fas fa-home"></i>Addresses</a>
                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-account" role="tab" aria-selected="false" tabindex="-1"><i class="fas fa-user"></i>Account Details</a>
                                    <a class="nav-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                            <i class="fal fa-sign-out"></i> {{ __('Logout') }}   </a> 
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </nav>
                        </aside>
                    </div>
                    <div class="col-xl-9 col-md-8">
                         <div id="responseHandler"></div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel">
                                <div class="axil-dashboard-overview">
                                    <div class="welcome-text">Hello <b>{{ auth()->user()->name }}</b>  </div>
                                    <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-orders" role="tabpanel">
                                <div class="axil-dashboard-order">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Order</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">#6523</th>
                                                    <td>September 10, 2020</td>
                                                    <td>Processing</td>
                                                    <td>$326.63 for 3 items</td>
                                                    <td><a href="#" class="axil-btn view-btn">View</a></td>
                                                </tr>
                                                
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-downloads" role="tabpanel">
                                <div class="axil-dashboard-order">
                                    <div class="table-responsive">
                                        <table class="table"> 
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Verification Done</th>
                                                    <td><a href="download/{{ asset('storage/'.auth()->user()->document)}}" class="axil-btn view-btn"><i class="fas fa-file-download"></i> Download</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="tab-pane fade" id="nav-address" role="tabpanel">
                                
                                @include('wholesaler-account.accounts.address-tab')
                            </div>
                            <div class="tab-pane fade" id="nav-account" role="tabpanel">
                                @include('wholesaler-account.accounts.account-tab')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Axil Newsletter Area  -->
    <div class="axil-newsletter-area axil-section-gap pt--0">
        <div class="container">
            <div class="etrade-newsletter-wrapper bg_image bg_image--11">
                <div class="newsletter-content">
                    <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open"></i>Newsletter</span>
                    <h2 class="title mb--40 mb_sm--30 text-white">Get weekly update</h2>
                    <div class="input-group newsletter-form">
                        <div class="position-relative newsletter-inner mb--15">
                            <input placeholder="example@gmail.com" type="text">
                        </div>
                        <button type="submit" class="axil-btn mb--15">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .container -->
    </div>
 
</main>
@endsection

