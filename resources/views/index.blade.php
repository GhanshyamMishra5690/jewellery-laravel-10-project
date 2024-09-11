@extends('layouts.main')


@section('content')
<!-- Start Slider Area -->
<main class="main-wrapper">
    <div class="axil-main-slider-area main-slider-style-7 bg_image--8">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-8">
                    <div class="main-slider-content">
                        <span class="subtitle"><i class="fas fa-fire"></i>Hot Deal In Diamond</span>
                        <h1 class="title ts">The Surat Diamond </h1>
                        <p class="ts">Discover the perfect diamond that tells your unique story.</p>
                        <div class="shop-btn">
                            <a href="#" class="underline-none axil-btn btn-bg-secondary right-icon">Browse Collections<i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Area -->

    <!-- Start Axil Product Poster Area  -->
    {{-- <div class="axil-poster axil-section-gap pb--0">
        <div class="container">
            <div class="row g-lg-5 g-4">
                <div class="col-lg-6">
                    <div class="single-poster">
                        <a href="shop.html">
                            <img src="assets/images/product/poster/poster-08.jpg" alt="eTrade promotion poster">
                            <div class="poster-content content-left">
                                <div class="inner">
                                    <h3 class="title">Premimum <br> Quality.</h3><br>
                                    <span class="sub-title ">Collections <i class="fal fa-long-arrow-right"></i></span>
                                </div>
                            </div> 
                        </a>
                    </div> 
                </div>
                <div class="col-lg-6">
                    <div class="single-poster">
                        <a href="shop-sidebar.html">
                            <img src="assets/images/product/poster/poster-09.jpg" alt="eTrade promotion poster">
                            <div class="poster-content content-left">
                                <div class="inner">
                                    <span class="sub-title">Engagemennt Rings</span>
                                    <h3 class="title">Get Exclusive <br> Rings</h3>
                                </div>
                            </div> 
                        </a>
                    </div> 
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Axil Product Poster Area  -->

    <!-- Start New Arrivals Product Area  -->
    <div class="axil-new-arrivals-product-area fullwidth-container bg-color-white axil-section-gap pb--0">
        <div class="container ml--xxl-0">
            <div class="product-area pb--50">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"><i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i> This Week’s</span>
                    <h2 class="title">New Arrivals</h2>
                </div>
                <div class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                    @if (count($latest_product) > 0)
                      @foreach ($latest_product as $latest)
                      @php
                            $price = 0;
                            if(Auth::user() && auth()->user()->userType == config('constants.USER_TYPES.WHOLESALER')){
                                    $price = $latest->product_price ;
                            } else {
                                    $price = $latest->user_price ;
                            }
                        @endphp
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="#">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="{{asset('storage/'.$latest->setting_image)}}" alt="Product Images">
                                </a>
                                  {{-- <div class="label-block label-right">
                                    <div class="product-badget">20% OFF</div>
                                </div>  --}}
                                  <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="#" onclick="addWishList('{{$latest->id}}')"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="#" onclick="addToCart('{{$latest->id}}','{{$price}}','ADD')">Add to Cart</a></li>
                                        <li class="quickview"><a href="#" onclick="showProduct('{{$latest->slug}}')"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div> - 
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="{{ url("product-details", ['slug' => $latest->slug]) }}">{{$latest->name}}</a></h5>
                                    <div class="product-price-variant"> 
                                        @auth
                                            @if (auth()->user()->userType == config('constants.USER_TYPES.WHOLESALER') )
                                                <span class="price old-price">${{$latest->user_price}}</span>   
                                                <span class="price current-price">${{ $latest->product_price }}</span>
                                            @else
                                                <span class="price current-price">${{$latest->user_price}}</span>
                                            @endif 
                                        @else   
                                            <span class="price old-price">${{$latest->user_price}}</span>   
                                            <span class="price current-price">${{( $latest->product_price )}}</span>
                                        @endauth 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                      @endforeach
                    @else
                        <article class="blog blog--six mb--50 ">
                            <p class="text-center">No article found.</p>
                        </article>
                    @endif 
                </div>
            </div>
        </div>
    </div>
    <!-- End New Arrivals Product Area  -->
 
    <!-- Start Categorie Area  -->
    {{-- <div class="axil-categorie-area bg-color-white axil-section-gapcommon">
        <div class="container">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-primary"> <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i> Categories</span>
                <h2 class="title">Browse by Category</h2>
            </div>
            <div class="categrie-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
            
                <div class="slick-single-layout">
                    <div class="categrie-product" data-sal="zoom-out" data-sal-delay="400" data-sal-duration="500">
                        <a class="underline-none" class="underline-none" href="#">
                            <img class="img-fluid" src="assets/images/product/categories/jewelry-4.png" alt="product categorie">
                            <h6 class="cat-title">Pendent</h6>
                        </a>
                    </div>
                    <!-- End .categrie-product -->
                </div>
                 
            </div>
        </div>
    </div> --}}
    <!-- End Categorie Area  -->

    <!-- Start Testimonila Area  -->
    <div class="axil-testimoial-area axil-section-gap bg-vista-white">
        <div class="container">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-secondary"> <i class="fal fa-quote-left"></i>Testimonials</span>
                <h2 class="title">Users Feedback</h2>
            </div>
            <!-- End .section-title -->
            <div class="testimonial-slick-activation testimonial-style-one-wrapper slick-layout-wrapper--20 axil-slick-arrow arrow-top-slide">
                <div class="slick-single-layout testimonial-style-one">
                    <div class="review-speech">
                        <p>“ Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque voluptas veniam necessitatibus quia autem at quibusdam incidunt dolorum mollitia itaque ea vel sit eveniet laboriosam, adipisci soluta, fugiat nam iure. “</p>
                    </div>
                    <div class="media">
                        <div class="thumbnail">
                            <img src="assets/images/testimonial/image-1.png" alt="testimonial image">
                        </div>
                        <div class="media-body">
                            <span class="designation">Teacher</span>
                            <h6 class="title">Aman Khan</h6>
                        </div>
                    </div>
                    <!-- End .thumbnail -->
                </div>
                <!-- End .slick-single-layout -->
                <div class="slick-single-layout testimonial-style-one">
                    <div class="review-speech">
                        <p>“ Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa numquam nobis corporis voluptatum! Id earum consectetur, excepturi inventore corrupti nisi ipsum, corporis placeat ipsa atque maiores a neque, unde illum? “</p>
                    </div>
                    <div class="media">
                        <div class="thumbnail">
                            <img src="assets/images/testimonial/image-2.png" alt="testimonial image">
                        </div>
                        <div class="media-body">
                            <span class="designation">Professer</span>
                            <h6 class="title">Aman Khan</h6>
                        </div>
                    </div>
                    <!-- End .thumbnail -->
                </div>
                <!-- End .slick-single-layout -->
                <div class="slick-single-layout testimonial-style-one">
                    <div class="review-speech">
                        <p>“ Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed illo possimus perspiciatis ad officia repellat quis, placeat commodi, nihil odio distinctio esse neque modi aliquam nesciunt officiis tempore veniam deleniti. “</p>
                    </div>
                    <div class="media">
                        <div class="thumbnail">
                            <img src="assets/images/testimonial/image-3.png" alt="testimonial image">
                        </div>
                        <div class="media-body">
                            <span class="designation">Doctor</span>
                            <h6 class="title">Aman Khan</h6>
                        </div>
                    </div>
                    <!-- End .thumbnail -->
                </div>
                <!-- End .slick-single-layout -->
                <div class="slick-single-layout testimonial-style-one">
                    <div class="review-speech">
                        <p>“ Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime ducimus consectetur ratione perspiciatis fuga placeat odio. Explicabo commodi fugiat eligendi repellat facilis. Saepe omnis quo voluptatum quae, dolorem illo exercitationem! “</p>
                    </div>
                    <div class="media">
                        <div class="thumbnail">
                            <img src="assets/images/testimonial/image-2.png" alt="testimonial image">
                        </div>
                        <div class="media-body">
                            <span class="designation">Sciencetest</span>
                            <h6 class="title">Aman Khan</h6>
                        </div>
                    </div>
                    <!-- End .thumbnail -->
                </div>
                <!-- End .slick-single-layout -->

            </div>
        </div>
    </div>
    <!-- End Testimonila Area  -->

    <!-- Start Expolre Product Area  -->
    <div class="axil-product-area bg-color-white axil-section-gap pb--0">
        <div class="container">
            <div class="product-area pb--80">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"><i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i> Our Products</span>
                    <h2 class="title">Explore our Products</h2>
                </div>
                <div class="row row--15"> 
                    @if (count($products) > 0)
                       @foreach ($products as $product)
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="{{ url("product-details", ['slug' => $product->slug]) }}">
                                        <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500" src="{{asset('storage/'.$product->setting_image)}}" alt="Product Images">
                                    </a>
                                    <!-- <div class="label-block label-right">
                                        <div class="product-badget">15% OFF</div>
                                    </div> -->
                                    <!-- <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div> -->
                                </div>
                                 
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="{{ url("product-details", ['slug' => $product->slug]) }}">{{$product->name}}</a></h5>
                                            <div class="product-price-variant"> 
                                                @auth
                                                    @if (auth()->user()->userType == config('constants.USER_TYPES.USER') )
                                                      <span class="price old-price">${{$product->user_price}}</span> 
                                                    @else
                                                      <span class="price old-price">${{$product->user_price}}</span>   
                                                      <span class="price current-price">${{$product->product_price}}</span>
                                                    @endif 
                                                @else   
                                                    <span class="price old-price">${{$product->user_price}}</span>   
                                                    <span class="price current-price">${{$product->product_price}}</span>
                                                @endauth 
                                            </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                       @endforeach
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center mt--20 mt_sm--0">
                        <nav aria-label="Page navigation example">
                            <!-- Custom pagination in your Blade file -->
                            @if ($products->hasPages())
                            <ul class="pagination pagination-lg">
                                {{-- Previous Page Link --}}
                                @if ($products->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">Previous</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev">Previous</a>
                                    </li>
                                @endif
                            
                                {{-- Pagination Elements --}}
                                @foreach ($products->links()->elements as $element)
                                    {{-- "Three Dots" Separator --}}
                                    @if (is_string($element))
                                        <li class="page-item disabled">
                                            <span class="page-link">{{ $element }}</span>
                                        </li>
                                    @endif
                            
                                    {{-- Array Of Links --}}
                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            @if ($page == $products->currentPage())
                                                <li class="page-item active">
                                                    <span class="page-link">{{ $page }}</span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            
                                {{-- Next Page Link --}}
                                @if ($products->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next">Next</a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link">Next</span>
                                    </li>
                                @endif
                            </ul>
                            @endif

                          </nav>
                        {{-- <a href="#" class="axil-btn btn-bg-lighter btn-load-more">View All Products</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Expolre Product Area  -->


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
                        <button type="submit" class="axil-btn mb--15 ">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .container -->
    </div>
</main>
<div class="service-area">
    <div class="container">
        <div class="row row-cols-xl-4 row-cols-sm-2 row-cols-1 row--20">
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="assets/images/icons/service1.png" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Fast &amp; Secure Delivery</h6>
                        <p>Tell about your service.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="assets/images/icons/service2.png" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Ethical Practices</h6>
                        <p>Sustainable, fair and fine </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="assets/images/icons/service3.png" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Worldwide Shipping</h6>
                        <p>Shipped via insured post</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="assets/images/icons/service4.png" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Pro Quality Support</h6>
                        <p>24/7 Live support.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
<!-- Modal Structure -->
 <div class="modal fade quick-view-product show" id="productModal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-4">
                <h5 class="modal-title" id="">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times"></i></button>
            </div>
            <div class="modal-body" id="modal-body">
                <!-- Product details will be loaded here via AJAX -->
            </div>
        </div>
    </div>
</div>

<!-- End Axil Newsletter Area  -->
@endsection