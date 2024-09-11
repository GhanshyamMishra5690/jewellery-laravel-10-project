<?php

namespace App\Services;

use App\Models\Admin;
use App\Traits\ImageUploadTrait; 
use App\Models\Wishlist;

class WishlistService
{   
    public static function addToWishlist(int $productId): array
    {
        $userId = getUserId(); 
        $wishlistItem = Wishlist::where('user_id', $userId)->where('product_id', $productId)
                                ->first();

        if ($wishlistItem) {
            return [
                'success' => false,
                'message' => __('messages.empty_wishlist_items'),
            ];
        }

        // Add new item to wishlist
        Wishlist::create([
            'user_id' => $userId,
            'product_id' => $productId,
        ]);

        return [
            'success' => true,
            'message' => __('messages.add_wishlist_items'),
        ];
    }

    /**
     * Remove an item from the wishlist.
     *
     * @param int $productId
     * @return array
     */
    public static function removeFromWishlist(int $productId): array
    {
        $userId = getUserId();

        $wishlistItem = Wishlist::where('user_id', $userId)
                                ->where('product_id', $productId)
                                ->first();

        if ($wishlistItem) {
            $wishlistItem->delete();
            return [
                'success' => true,
                'message' => __('messages.remove_wishlist_items'),
            ];
        }

        return [ 
            'success' => false,
            'message' => __('messages.notFound_wishlist_items'),
        ];
    }

    /**
     * Get all items in the user's wishlist.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getWishlistItems()
    {
        $userId = getUserId();
        return Wishlist::with('product','user')->where('user_id', $userId)->orderBy('created_at', 'desc')->paginate('10');
        
    }
}
