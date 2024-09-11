@extends('layouts.main')


@section('content')
<main class="main-wrapper">

    <!-- Start Checkout Area  -->
    <div class="axil-checkout-area axil-section-gap">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group input-group form-check">
                            <input type="checkbox" id="default_address" name="default_address">
                            <label for="checkbox1">Use default Address</label>
                        </div>
                        
                    </div> 
                </div> 
            </div>
            <form  id="shipping_address" action="{{route('checkout.submit')}}" method="POST">
                @csrf
                <input type="hidden" name="cart_id" value="{{$cart_id}}"> 
                <div class="row">
                    <div class="col-lg-6"> 
                        <div class="axil-checkout-billing">
                            <h4 class="title mb--40">Billing details</h4>
                            
                            <div class="form-group">
                                <label>First Name <span>*</span></label>
                                <input type="text" name="name" value="{{$userInfo->name}}">
                            </div>
                            <div class="form-group">
                                <label>Country/ Region <span>*</span></label>
                                <select id="Region" name="country_id">
                                    @foreach (getCountry() as $row)
                                    <option value="{{$row['id']}}">{{$row['country_name']}}</option>
                                    @endforeach
                                     
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Street Address <span>*</span></label>
                                <input type="text" name="street_address" class="mb--15" value="">     
                            </div>
                            <div class="form-group">
                                <label>Town/ City <span>*</span></label>
                                <input type="text" name="city" value="">
                            </div>
                            <div class="form-group">
                                <label>State <span>*</span></label>
                                <input type="text" name="state" value="">
                            </div> 
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="axil-order-summery order-checkout-summery">
                            <h5 class="title mb--20">Your Order</h5>
                            <div class="summery-table-wrap">
                                <table class="table summery-table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $subTotal = 0;
                                        @endphp
                                        @if (isset($data['cart_items']) && count($data['cart_items']) > 0)
                                            @foreach ($data['cart_items'] as $item)
                                            <input type="hidden" name="price[]" value="{{$item->product_price}}"> 
                                            <input type="hidden" name="product_id[]" value="{{$item->product_id}}"> 
                                            <input type="hidden" name="quantity[]" value="{{$item->quantity}}"> 
                                            @php
                                                $subTotal +=   $item->quantity * $item->product_price;
                                            @endphp
                                            <tr data-order-id="{{$item->cart_item_id}}">
                                                <td>{{$item->name}} <span class="quantity">x {{$item->quantity}}</span></td>
                                                <td>{{ number_format($item->quantity * $item->product_price, 2)}}</td>
                                            </tr>
                                            @endforeach
                                        @endif
                                        <tr class="order-subtotal">
                                            <td>Subtotal</td>
                                            <input type="hidden" name="subTotal" value="{{$subTotal}}"> 
                                            <td>${{number_format($subTotal, 2)}}</td>
                                        </tr>
                                         
                                        <tr class="order-total">
                                            <td>Total</td>
                                            <td class="order-total-amount">${{number_format($subTotal, 2)}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="order-payment-method">
                                <div class="single-payment">
                                    <div class="input-group">
                                        <input type="radio" id="radio4" name="payment_method" value="BANK">
                                        <label for="radio4">Direct bank transfer</label>
                                    </div>
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                </div>
                                <div class="single-payment">
                                    <div class="input-group">
                                        <input type="radio" id="radio5" name="payment_method" value="COD">
                                        <label for="radio5">Cash on delivery</label>
                                    </div>
                                    <p>Pay with cash upon delivery.</p>
                                </div>
                                <div class="single-payment">
                                    <div class="input-group justify-content-between align-items-center">
                                        <input type="radio" id="radio6" name="payment_method" checked value="Paypal">
                                        <label for="radio6">Paypal</label>
                                        <img src="assets/images/others/payment.png" alt="Paypal payment">
                                    </div>
                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                </div>
                            </div>
                            <button type="submit" class="axil-btn btn-bg-primary checkout-btn">Process to Checkout</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Checkout Area  -->

</main>
@endsection