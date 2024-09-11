<?php

namespace App\Http\Controllers\Frontend\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ring;
class PaymentController extends Controller
{
    public function index(){
         $orderDetails = session()->get('order_details');
         
         return view('payment.payment', compact('orderDetails'));
      
     }
    
     public function response(){
         if(session()->has('status')){
            return redirect('/');
         }
        return view('payment.response');
     }

}
