<?php

namespace App\Http\Controllers\Frontend\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class AddToCartController extends Controller
{

    public function viewCart(){ 
        if(!auth()->check()) {
             
            Session::flash('info', __('messages.login_to_add_cart'));
            return redirect('/');             
        } 
        $cartDetails = getCartDetails();
         
        return view('cart', compact('cartDetails'));
    }


    public function createCart(Request $request)
    {
        DB::beginTransaction();
        if (!auth()->check()) {
            return response()->json([
                'info' => true,
                'message' => __('messages.login_to_add_cart')
            ]);
        }
        try {  
            $userId =  auth()->user()->id;
            $productId = $request->input('product_id'); 
            $quantity =  1; 
            $cart = Cart::where('user_id', $userId)->first();  
           
            if ($cart) { 
                $cartItem = $cart->cartItems()->where('product_id', $productId)->first();
               
                if ($cartItem) {
                    return response()->json([
                        'info' => true,
                        'message' => __('messages.item_exists_cart'),
                    ]); 
                } else {  
                    $this->addCartItems($request->all(), $cart->id);
                }
            } else { 
                $cartId = Cart::create([
                    'user_id' => $userId,
                ])->id; 
                $this->addCartItems($request->all(), $cartId);
            } 
            DB::commit(); 
            return response()->json([
                'success' => true,
                'message' => __('messages.items_added_cart'),
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500);
        }
       
    }
    protected function addCartItems(array $data, int $cartId)
    {
        
        $productId = $data['product_id'];
        $productPrice = $data['product_price'];
        $quantity ='1'; 
        $existingItem = CartItem::where('cart_id', $cartId)
                                ->where('product_id', $productId)
                                ->first();
    
        if ($existingItem) { 
            $existingItem->quantity = $quantity;
            return $existingItem->save();
        } else {
            // Create new cart item
            return CartItem::create([
                'cart_id' => $cartId,
                'product_id' => $productId,
                'product_price' => $productPrice,
                'quantity' => $quantity,
            ]);
             
        }
    }

    
    
    public function checkCart(Request $request)
    {
        // $userId = $request->get('user_id');
        // $productId = $request->input('product_id'); 
        // $cart = Cart::where('user_id', $userId)->first();

        // if ($cart) {
        //     $cartItem = $cart->items()->where('product_id', $productId)->first(); 
        //     return true;
        // }
        
    }
    
    public function updateQuantity(Request $request)
    {
        $quantity = $request->input('quantity');
        $cart_item_id = $request->input('cart_item_id');
        $cartItem = CartItem::where('id', $cart_item_id)->first();
        if ($cartItem) {
           $cartItem->quantity = $quantity; 
           $cartItem->save(); 
           return response()->json([
               'success' => true,
               'message' => 'Cart item updated successfully!',
           ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Item not found in cart.',
        ]);
    }
    
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    public function getItemTotal(){
        if(!auth()->check()){
            return response()->json(['total' =>  0]);
        } else {
           
            $userId = auth()->user()->id;
            $cart = Cart::where('user_id', $userId)->first(); 
            if (!$cart) {
                return response()->json(['total' => 0]); 
            }
            $cartTotal = CartItem::where('cart_id', $cart->id)->count();
            return response()->json(['total' => $cartTotal]);

        } 
    }

    public function clearCart(Request $request){
        $userId = auth()->id();
        $cart = Cart::where('user_id', $userId)->first(); 
        if ($cart) {
            $cartItems = CartItem::where('cart_id', $cart->id)->delete();
            if($cartItems){
                return response()->json([
                    'success' => true,
                    'message' =>__('messages.clear_added_cart')
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => __('messages.no_items_cart')
                ]);
            }
            
        } else {
            return response()->json([
                'success' => false,
                'message' => __('messages.no_items_cart')
            ]);
        }
    }
}


 