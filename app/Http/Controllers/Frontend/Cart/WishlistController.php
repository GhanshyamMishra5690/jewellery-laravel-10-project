<?php

namespace App\Http\Controllers\Frontend\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Services\WishlistService;
class WishlistController extends Controller
{
    public function index(){
        if(!auth()->check()) {
             
            Session::flash('info', __('messages.login_to_add_wishlist'));
            return redirect('/');             
        } 
      $wishlist = $wishlistItems = WishlistService::getWishlistItems();  
       return view('wishlist', compact('wishlist'));
    }
     
    public function addToWishlist(Request $request)
    {
        if (!auth()->check()) {
            return response()->json([
                'info' => true,
                'message' => __('messages.login_to_add_wishlist')
            ]);
        }
        $productId = $request->input('product_id');
        $response = WishlistService::addToWishlist($productId);

        return response()->json($response);
    }

    public function removeFromWishlist(Request $request)
    {       
        
        $productId = $request->input('product_id');
        $response = WishlistService::removeFromWishlist($productId); 
        return response()->json($response);
    }
 
}
