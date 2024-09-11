<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class CartHelper
{
    public static function showCart($cartId)
    {
        $cartItems = DB::table('cart_items')
            ->join('rings', 'cart_items.product_id', '=', 'rings.id')
            ->where('cart_items.cart_id', $cartId)
            ->select('cart_items.*', 'rings.name', 'rings.setting_user_price')
            ->get();

        $totalAmount = $cartItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });

        return [
            'cart_items' => $cartItems,
            'total_amount' => $totalAmount,
        ];
    }

    public static function getWishlist($cartId)
    {

    }
}