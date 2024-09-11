<div class="single-product-thumb">
    <div class="row">
      <div class="col-lg-7  ">
        <div class="row">
          <div class="col-lg-10 order-lg-2">
            <div
              class="single-product-thumbnail product-large-thumbnail axil-product thumbnail-badge zoom-gallery slick-initialized slick-slider"
            >
              <div class="slick-list">
                <div
                  class="slick-track"
                  style="
                    opacity: 1;
                    width: 1473px;
                    transform: translate3d(0px, 0px, 0px);
                  "
                >
                  <div
                    class="thumbnail slick-slide slick-current slick-active"
                    data-slick-index="0"
                    aria-hidden="false"
                    tabindex="0"
                    style="width: 491px"
                  >
                    <img
                      src="{{asset('storage/'.$products->setting_image)}}"
                      alt="{{$products->name}}"
                    />
                    <div class="label-block label-right">
                      {{-- <div class="product-badget">20% OFF</div> --}}
                    </div> 
                  </div>
                  <div
                    class="thumbnail slick-slide"
                    data-slick-index="1"
                    aria-hidden="true"
                    tabindex="-1"
                    style="width: 491px"
                  >
                    <img
                      src="{{asset('storage/'.$products->stone_image)}}"
                      alt="{{$products->name}}"
                    />
                    <div class="label-block label-right">
                      <div class="product-badget">20% OFF</div>
                    </div>
                    <div class="product-quick-view position-view">
                      <a
                        href="{{asset('storage/'.$products->setting_image)}}"
                        class="popup-zoom"
                        tabindex="-1"
                      >
                        <i class="far fa-search-plus"></i>
                      </a>
                    </div>
                  </div>
                  <div
                    class="thumbnail slick-slide"
                    data-slick-index="2"
                    aria-hidden="true"
                    tabindex="-1"
                    style="width: 491px"
                  >
                    <img
                      src="{{asset('storage/'.$products->stone_image)}}"
                      alt="{{$products->name}}"
                    />
                    <div class="label-block label-right">
                      {{-- <div class="product-badget">20% OFF</div> --}}
                    </div>
                    <div class="product-quick-view position-view">
                      <a
                        href="{{asset('storage/'.$products->setting_image)}}"
                        class="popup-zoom"
                        tabindex="-1"
                      >
                        <i class="far fa-search-plus"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2 order-lg-1">
            <div
              class="product-small-thumb small-thumb-wrapper slick-initialized slick-slider slick-vertical"
            >
              <div class="slick-list draggable" style="height: 558.281px">
                <div
                  class="slick-track"
                  style="
                    opacity: 1;
                    height: 280px;
                    transform: translate3d(0px, 0px, 0px);
                  "
                >
                  <div
                    class="small-thumb-img slick-slide slick-current slick-active"
                    data-slick-index="0"
                    aria-hidden="false"
                    tabindex="0"
                    style="width: 75px"
                  >
                    <img
                      src="{{asset('storage/'.$products->setting_image)}}"
                      alt="thumb image"
                    />
                  </div>
                  <div
                    class="small-thumb-img slick-slide slick-active"
                    data-slick-index="1"
                    aria-hidden="false"
                    tabindex="0"
                    style="width: 75px"
                  >
                    <img
                      src="{{asset('storage/'.$products->stone_image)}}"
                      alt="thumb image"
                    />
                  </div>
                  <div
                    class="small-thumb-img slick-slide slick-active"
                    data-slick-index="2"
                    aria-hidden="false"
                    tabindex="0"
                    style="width: 75px"
                  >
                    <img
                      src="{{asset('storage/'.$products->setting_image)}}"
                      alt="thumb image"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5  ">
        <div class="single-product-content">
          <div class="inner">
            {{-- <div class="product-rating">
              <div class="star-rating">
                <img src="assets/images/icons/rate.png" alt="Rate Images" />
              </div>
              <div class="review-link">
                <a href="#">(<span>1</span> customer reviews)</a>
              </div>
            </div> --}}
            <h3 class="product-title">{{$products->name}}</h3>
            <span class="price-amount">${{$products->setting_wholesaler_price}}</span>
            <ul class="product-meta">
              <!-- <li><i class="fal fa-check"></i>In stock</li>
              <li><i class="fal fa-check"></i>Free delivery available</li>
              <li>
                <i class="fal fa-check"></i>Sales 30% Off Use Code: MOTIVE30
              </li> -->
            </ul>
            <p class="description">
              {{$products->setting_description}}
            </p>
  
            <div class="product-variations-wrapper">
              <!-- Start Product Variation  -->
              <div class="product-variation">
                <h6 class="title">Colors:</h6>
                <div class="color-variant-wrapper">
                  <ul class="color-variant mt--0">
                    <li class="color-extra-01 active">
                      <span><span class="color"></span></span>
                    </li>
                    <li class="color-extra-02">
                      <span><span class="color"></span></span>
                    </li>
                    <li class="color-extra-03">
                      <span><span class="color"></span></span>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- End Product Variation  -->
  
              <!-- Start Product Variation  -->
              <div class="product-variation">
                <h6 class="title">Size:</h6>
                <ul class="range-variant">
                  <li>xs</li>
                  <li>s</li>
                  <li>m</li>
                  <li>l</li>
                  <li>xl</li>
                </ul>
              </div>
              <!-- End Product Variation  -->
            </div>
  
            <!-- Start Product Action Wrapper  -->
            <div class="product-action-wrapper d-flex-center">
              <!-- Start Quentity Action  -->
              <div class="pro-qty">
                  <span class="product-dec qtybtn" >-</span>
                  <input type="text" name="quantity_qty" id="quantity_qty" class="get-cart-field" value="1" min="1">
                  <span class="product-inc qtybtn" >+</span>
              </div>
              <!-- End Quentity Action  -->
  
              <!-- Start Product Action  -->
              <ul class="product-action d-flex-center mb--0">
                <li class="add-to-cart">
                  <a href="#" onclick="addToCart('{{$products->id}}','ADD')" class="axil-btn btn-bg-primary"
                    >Add to Cart</a
                  >
                </li>
                <li class="wishlist">
                  <a href="#" onclick="addWishList('{{$products->id}}')" class="axil-btn wishlist-btn"
                    ><i class="far fa-heart"></i
                  ></a>
                </li>
              </ul>
              <!-- End Product Action  -->
            </div>
            <!-- End Product Action Wrapper  -->
          </div>
        </div>
      </div>
    </div>
  </div>
  