@extends('layouts.main')


@section('content')
<main class="main-wrapper">

    <!-- Start Cart Area  -->
    <div class="axil-product-cart-area axil-section-gap">
        <div class="container">
            <div class="product-table-heading">
                <h4 class="title">My Wish List on eTrade</h4>
            </div>
            <div class="table-responsive">
                <table class="table axil-product-table axil-wishlist-table">
                    <thead>
                        <tr>
                            <th scope="col" class="product-remove"></th>
                            <th scope="col" class="product-thumbnail">Product</th>
                            <th scope="col" class="product-title"></th>
                            <th scope="col" class="product-price">Unit Price</th>
                            <th scope="col" class="product-stock-status">Stock Status</th>
                            <th scope="col" class="product-add-cart"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($wishlist) > 0)
                            @foreach ($wishlist as $list) 
                                <tr id="wishlist_row_{{$list->product->id}}">
                                    <td class="product-remove"><a href="#" onclick="removeWishlist('{{$list->product->id}}')" class="remove-wishlist" ><i class="fal fa-times"></i></a></td>
                                    <td class="product-thumbnail"><a href="{{ url("product-details", ['slug' => $list->product->slug]) }}"><img src="{{ asset('storage/'.$list->product->stone_image)}}" alt="Digital Product"></a></td>
                                    <td class="product-title"><a href="{{ url("product-details", ['slug' => $list->product->slug]) }}">{{$list->product->name}}</a></td>
                                    <td class="product-price" data-title="Price"><span class="currency-symbol">$</span>{{number_format($list->product->stone_wholesaler_price, 2)}}</td>
                                    <td class="product-stock-status" data-title="Status">In Stock</td>
                                    <td class="product-add-cart"><a href="#" onclick="addToCart('{{$list->product->id}}','REMOVE')" class="axil-btn btn-outline">Add to Cart</a></td>
                                </tr>
                            @endforeach
                        @else

                        @endif
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End Cart Area  -->

</main>
@endsection