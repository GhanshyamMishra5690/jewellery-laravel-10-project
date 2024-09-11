
@include('layouts.user.header')
<body class="sticky-header">  
<a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->
    <header class="header axil-header header-style-5">
    <div class="axil-header-top py-0 ">
        <div class="container-fluid px-4 ">
            <div class="d-flex row flex-wrap justify-content-between align-items-center">
                <div class="col px-sm-5 px-0">
                    
                    <div class="header-top-dropdown">
                        <div class="contact-detail">
                            <a href="tel:(+91)975-969-6961"><i class="fa-solid fa-phone" style="color: #ffffff;"></i></a> &nbsp;
                        </div>
                        <span class="pb-1 contact-detail d-xl-block d-none">(+91) 975-969-6961</span> &nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="contact-detail">
                            <a href="mailto:thesuratdiamond.com"><i class="fa-solid fa-envelope" style="color: #ffffff;"></i></a> &nbsp;
                        </div>
                        <span class="pb-1 contact-detail d-xl-block d-none">thesuratdiamond.com</span>
                    </div>
                </div>
                <div class="col flex-item px-0">
                    <div class="header-top-link">
                        
                        <span class="fs-5 d-flex justify-content-center align-items-center text-white "><i class="mt-1 d-none d-sm-inline fa-regular fa-gem" style="color: #ffffff;">&nbsp;&nbsp;</i> Never Find Better Than Us</span>
                    </div>
                </div>
                <div class="col px-sm-5 px-0 ">
                    <div class="header-top-link">
                        <ul class="quick-link align-items-center">
                            <li class="px-3" ><a target="_blank" href="https://www.instagram.com/developer_thanos/"><i class="fa-brands fa-square-facebook" style="color: #ffffff;"></i></a></li>
                            <li class="px-3"><a target="_blank" href="https://www.facebook.com/jointy.rost/"><i class="fa-brands fa-instagram" style="color: #ffffff;"></i></a></li>
                            <li class="px-3"><a target="_blank" href="https://youtube.com/"><i class="fa-brands fa-youtube" style="color: #ffffff;"></i></a></li>
                            <li class="px-3"><a target="_blank" href="https://youtube.com/"><i class="fa-brands fa-linkedin-in" style="color: #ffffff;"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- Start Mainmenu Area  -->
    <div id="axil-sticky-placeholder"></div>
    <div class="axil-mainmenu">
        <div class="container-fluid limit-width">
            <div class="header-navbar">
                <div class="header-brand">
                    <a href="{{ route('home') }}" class="logo logo-dark">
                        <img class="px-5" src="{{asset('user/assets/images/logo/logo.png')}}" alt="Site Logo">
                    </a>
                    <a href="{{ route('home') }}" class="logo logo-light">
                        <img class="px-5" src="{{asset('user/assets/images/logo/logo-light.png')}}" alt="Site Logo">
                    </a>
                </div>
                <!-- Start Mainmanu Nav -->
                <div class="header-main-nav">
                    <nav class="mainmenu-nav">
                        <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                        <div class="mobile-nav-brand">
                            <a href="{{ route('home') }}" class="logo">
                                <img src="{{asset('user/assets/images/logo/logo.png')}}" alt="Site Logo">
                            </a>
                        </div>
                        <ul class="mainmenu">
                            <li class="mx-0 menu-item-has-children">
                                <a href="#">Jewellery</a>
                                <ul class="axil-submenu">
                                    <li ><a href="index-1.html">Rings</a></li>
                                    <li><a href="index-2.html">Bracelet</a></li>
                                    <li><a href="index-3.html">Bangles</a></li>
                                    <li><a href="index-4.html">Pendent</a></li>
                                    <li><a href="index-5.html">Chain</a></li>
                                    <li><a href="index-7.html">Earings</a></li>
                                    <li><a href="index-7.html">Indian Mangsutar</a></li>
                                    <li><a href="index-7.html">Nose Pin</a></li>
                                    <li><a href="index-7.html">Watchs</a></li>
                                    <li><a href="https://new.axilthemes.com/demo/template/etrade-rtl/">Redesign Of Your Jewellery</a></li>
                                </ul>
                            </li>
                            <li class="mx-0 mx-4" ><a href="create-your-jewellery.html">Create your Jewellery</a></li>
                            <li class="mx-0 mx-4" ><a href="natural-diamond.html">Natural Diamond</a></li>
                            <li class="mx-0 mx-4" ><a href="lab-diamond.html">Lab Diamond</a></li>
                            <li class="mx-0 mx-4" ><a href="education.html">Education</a></li>
                            <li class="mx-0 mx-4" ><a href="business-opportunity">Business Opportunity</a></li>
                            <li class="mx-0 mx-4" ><a href="{{ route('about-us') }}">About Us</a></li>
                            <li class="mx-0 mx-4" ><a href="{{ route('contact-us') }}">Contact</a></li>
                        </ul> 
                    </nav>
                </div>
                <!-- End Mainmanu Nav -->

                <div class="header-action">
                    <ul class="action-list">
                        <li class="axil-search d-xl-block d-none">
                            <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                <i class="flaticon-magnifying-glass"></i>
                            </a>
                        </li>
                        <li class="axil-search d-xl-none d-block">
                            <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                <i class="flaticon-magnifying-glass"></i>
                            </a>
                        </li>
                        <li class="wishlist">
                            <a href="{{ route('wishlist.index')}}">
                                <i class="flaticon-heart"></i>
                            </a>
                        </li>
                       
                        @php
                            $cartDetails = getCartDetails(); 
                        @endphp
                        <li class="shopping-cart">
                            <a href="#" class="cart-dropdown-btn">
                                @if($cartDetails['product_count'] == 0)
                                <span class="cart-count"><span id="cartItemCount">0</span></span>
                                @else
                                  <span class="cart-count " id="cartItemCount">{{$cartDetails['product_count']}}</span>
                                @endif  
                                <i class="flaticon-shopping-cart"></i>
                            </a>
                        </li>
                        @if (Auth::guard('admin')->check())
                        <li>
                            <span style="cursor: pointer" onclick="event.preventDefault(); document.getElementById('admin_dasgboard').submit();">
                            <i class="flaticon-person"></i> My Dashboard
                            </span> 
                            <form id="admin_dasgboard" action="{{ route('dashboard') }}" method="GET" class="d-none">
                            </form>
                        </li>
                        @else
                        <li class="my-account">
                           
                            <a href="javascript:void(0)">
                                <i class="flaticon-person"></i>
                            </a>
                             
                            @php
                             
                        @endphp
                            <div class="my-account-dropdown">
                                <!-- <span class="title">QUICKLINKS</span> -->
                                @if (auth()->check()) 
                                <ul>
                                    @if(auth()->user()->userType ==config('constants.USER_TYPES.ADMIN'))
                                        <li>
                                            <a href="{{route('admin.dashboard')}}"> <i class="fa-regular fa-user"></i> My Account</a>
                                        </li>       
                                    @elseif (auth()->user()->userType ==config('constants.USER_TYPES.WHOLESALER'))
                                        <li>
                                            <a href="{{route('wholesaler.dashboard')}}"> <i class="fa-regular fa-user"></i> My Account</a>
                                        </li> 
                                    @else  
                                        <li>
                                            <a href="{{ route('user.dashboard') }}"> <i class="fa-regular fa-user"></i> My Account</a>
                                        </li> 
                                    @endif
                                   <li>
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <i class="fal fa-sign-out"></i> {{ __('Logout') }}
                                        </a> 
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                   </li>
                                </ul>
                                
                                @else 
                                <div class="login-btn">
                                    <a href="{{route('login')}}" class="axil-btn btn-bg-primary">Login</a>
                                </div>
                                <div class="reg-footer text-center">No account yet? <a href="{{route('register')}}" class="btn-link">REGISTER HERE.</a></div>
                                @endif
                                
                                
                            </div>
                        </li>
                        @endif
                        
                        <li class="axil-mobile-toggle">
                            <button class="menu-btn mobile-nav-toggler">
                                <i class="flaticon-menu-2"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>
<!-- End Header -->
@yield('content') 

@include('layouts.user.footer')
@include('layouts.user.footerScript')
