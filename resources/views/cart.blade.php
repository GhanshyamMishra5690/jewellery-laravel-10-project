@extends('layouts.main')


@section('content')
<main class="main-wrapper">

    <!-- Start Cart Area  -->
    <div class="axil-product-cart-area axil-section-gap">
        <div class="container">
            <div class="axil-product-cart-wrap">
                <div class="product-table-heading">
                    <h4 class="title">Your Cart</h4>
                    <a href="#" class="cart-clear" onclick="clearCart()" >Clear Shoping Cart</a>
                </div>
                @if (isset($cartDetails['cart_items']) && count($cartDetails['cart_items']) > 0) 
                 <div class="table-responsive">
                    <table class="table axil-product-table axil-cart-table mb--40">
                        <thead>
                            <tr>
                                <th scope="col" class="product-remove"></th>
                                <th scope="col" class="product-thumbnail">Product</th>
                                <th scope="col" class="product-title"></th>
                                <th scope="col" class="product-price">Price</th>
                                <th scope="col" class="product-quantity">Quantity</th>
                                <th scope="col" class="product-subtotal">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody> 
                                @php
                                    $cart_subtotal = 0; 
                                @endphp 
                                @foreach ($cartDetails['cart_items'] as $cartItems) 
                                @php
                                    $cart_subtotal += $cartItems['product_price'] *  $cartItems['quantity']; 
                                @endphp
                                <tr data-item-id="{{ $cartItems['cart_item_id'] }}">
                                    <td class="product-remove"><a href="#" class="remove-wishlist"><i class="fal fa-times"></i></a></td>
                                    <td class="product-thumbnail">
                                        <a href="#"><img src="{{ asset('storage/'.$cartItems['setting_image']) }}" alt="Digital Product"></a>
                                    </td>
                                    <td class="product-title">
                                        <a href="#">{{ $cartItems['name'] }}</a>
                                    </td>
                                    <td class="product-price" data-title="Price">
                                        <span class="currency-symbol">$</span><span class="item-price">{{ $cartItems['product_price'] }}</span>
                                    </td>
                                    <td class="product-quantity" data-title="Qty">
                                        <div class="pro-qty">
                                            <span class="dec qtybtn" data-cart-id="{{ $cartItems['cart_item_id'] }}">-</span>
                                            <input type="number"  name="quantity_input" class="quantity_input" value="{{$cartItems['quantity']}}" min="1">
                                            <span class="inc qtybtn"data-cart-id="{{ $cartItems['cart_item_id'] }}" >+</span>
                                        </div>
                                    </td>
                                    <td class="product-subtotal" data-subtotal="{{ $cartItems['cart_item_id'] }}">
                                       {{-- ---{{$cartItems->setting_user_price}} --}}
                                        <span class="currency-symbol">$</span><span class="item-subtotal" id="item-subtotal">{{ number_format($cartItems['product_price'] * $cartItems['quantity'], 2)  }}</span>
                                    </td>
                                </tr> 
                                @endforeach 
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                        <div class="axil-order-summery mt--80">
                            <h5 class="title mb--20">Order Summary</h5>
                            <div class="summery-table-wrap">
                                <table class="table summery-table mb--30">
                                    <tbody> 
                                        <tr class="order-subtotal">
                                            <td>Subtotal</td>
                                            <td id="cart_subtotal">
                                                @if (isset($cart_subtotal))
                                                    {{number_format($cart_subtotal, 2)}}
                                                @else 
                                                 0
                                                @endif 
                                            </td>
                                        </tr>
                                         
                                    </tbody>
                                </table>
                            </div> 
                            <form action="{{ route('checkout') }}" method="POST">
                                @csrf
                                 
                                <button type="submit" class="axil-btn btn-bg-primary checkout-btn" >Process to Checkout</button>
                            </form>
                             
                        </div>
                    </div>
                </div>
                 @else 
                    <div class="col-md-12">
                        <!-- Empty Cart Message -->
                        <div class="card text-center">
                            <div class="card-body">
                                <h4 class="card-title">Your Cart is Empty</h4>
                                <p class="card-text">It looks like you haven't added any items to your cart yet.</p>
                                <a href="{{ route('home')}}" class="btn btn-primary">Start Shopping</a>
                            </div>
                        </div>
        
                        <!-- Optional Toastr Alert -->
                        <div class="alert alert-info mt-4">
                            <strong>Info:</strong> No items found in your cart. Browse our shop to add items.
                        </div>
                    </div>
                 @endif
                {{-- <div class="cart-update-btn-area">
                    <div class="input-group product-cupon">
                        <input placeholder="Enter coupon code" type="text">
                        <div class="product-cupon-btn">
                            <button type="submit" class="axil-btn btn-outline">Apply</button>
                        </div>
                    </div>
                    <div class="update-btn">
                        <a href="#" class="axil-btn btn-outline">Update Cart</a>
                    </div>
                </div> --}}
                
            </div>
        </div>
    </div>
    <!-- End Cart Area  -->

</main>
@endsection