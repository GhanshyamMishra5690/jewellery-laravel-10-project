<?php

namespace App\Http\Controllers\Frontend\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ring;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class CheckoutController extends Controller
{
    public function index(Request $request){

       
        if(!auth()->check()) {
            Session::flash('info', __('messages.login_to_add_cart'));
            return redirect('/');             
        }
         
        $cart = Cart::where('user_id', auth()->user()->id)->first(); 
        if(!$cart) {
            Session::flash('info',__('messages.empty_cart_items'));
            return redirect('/');             
        }
        $cart_id= $cart->id; 
        $cartItems = $cart->cartItems()
            ->join('rings', 'cart_items.product_id', '=', 'rings.id')
            ->select('cart_items.*','cart_items.id as cart_item_id', 'rings.*')
            ->get();

        $totalAmount = $cartItems->sum(function ($item) {
            return $item->quantity * $item->setting_user_price;
        });
        $productCount = $cartItems->count();
        $data =  [
            'cart_items' => $cartItems,
            'total_amount' => $totalAmount,
            'product_count' => $productCount,
        ]; 

        
        $user = getCurrentUserDetails(); 
        $userInfo = $user['details']['user'];
        $userAddress = $user['details']['address']; 
        
        return view('checkout', compact('userInfo','userAddress','data','cart_id'));
     }

     public function submitCheckout(Request $request){ 
         
            $orderId = DB::table('orders')->insertGetId([
                'user_id' => auth()->user()->id, 
                'order_number' => uniqid('ORDER_'),
                'total' => $request->get('subTotal'), // Assuming some total amount
                'status' => 'pending',
                'payment_status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $productIds = $request->input('product_id');
            $quantity = $request->input('quantity');
            $prices = $request->input('price');
            $subTotal = $request->input('subTotal');
            $payment_method = $request->input('payment_method');
            foreach ($productIds as $index => $productId) {
                DB::table('order_items')->insert([
                    'order_id' => $orderId,
                    'product_id' => $productId,
                    'quantity' => $quantity[$index],
                    'price' => $prices[$index], 
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            $cart = Cart::where('id', $request->get('cart_id'))->first();
            $cart->cartItems()->delete();
            $cart->delete(); 
            session()->put('order_details', [
                'order_id' => $orderId,
                'total_amount' => $subTotal,
                'payment_method' => $payment_method, 
            ]);
          
            return redirect()->route('payment.page');
        }
      
}
