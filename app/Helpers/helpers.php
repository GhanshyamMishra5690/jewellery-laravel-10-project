<?php

 
use App\Models\Ring;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Country;
 
if (!function_exists('getUserId')) {
     function getUserId()
    {
        if (Auth::guard('admin')->check()) {
            return Auth::guard('admin')->user()->id;
        } else {
            if(auth()->check()){
                return auth()->user()->id;
            } else {
                return false;
            } 
        }
    }
}
if (!function_exists('getUserType')) {
    function getUserType()
   {
        if(auth()->user()->userType == $type){
            return true;
        }
        return false;
   }
}
if (!function_exists('getCurrentUserDetails')) {
    function getCurrentUserDetails()
    {
        if (auth()->check()) {
            $user = auth()->user()->first();
            $address = $user->addresses()->first();
            return [
                'type' => 'user',
                'details' => [
                    'user' => $user,
                    'address' => $address
                ]
            ];
        } else {
            return false; // No user is logged in
        }
    }
}   
if (!function_exists('getCartDetails')) {
    function getCartDetails()
{
    $userId = getUserId(); 
    $cart = Cart::where('user_id', $userId)->first(); 

    // If no cart found, return empty data
    if (!$cart) {
        return [
            'cart_items' => [],
            'cart_id' => null,
            'total_amount' => 0,
            'product_count' => 0,
        ];
    }

    // Get cart items with product details (rings in this case)
    $cartItems = $cart->cartItems()
        ->join('rings', 'cart_items.product_id', '=', 'rings.id')
        ->select('cart_items.*', 'cart_items.id as cart_item_id', 'rings.*')
        ->get();

    // Calculate total amount for all cart items
    $totalAmount = $cartItems->sum(function ($item) {
        return $item->quantity * $item->setting_user_price;
    });

    // Convert cart items to array format
    $cartItemsArray = $cartItems->toArray();

    // Get the total count of products in the cart
    $productCount = count($cartItemsArray);

    return [
        'cart_id' => $cart->id,
        'cart_items' => $cartItemsArray, // Return cart items as an array
        'total_amount' => $totalAmount,
        'product_count' => $productCount,
    ];
}

}


function getCountry(){
    return Country::get()->toArray();
}

if (!function_exists('productPrice')) {
    function productPrice($setting_w_price, $stone_w_price) {
        return number_format($setting_w_price + $stone_w_price, 2);
    }
}

if (!function_exists('userPrice')) {
    function userPrice($setting_price, $stone_price) {
        return number_format($setting_price + $stone_price, 2);
    }
}