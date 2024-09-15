<?php

namespace App\Http\Controllers\Frontend\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Order;
use App\Models\Payment;

class PaypalController extends Controller
{
    protected $apiContext;

    public function paypal(Request $request)
    {
    
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->setCurrency('USD');
       
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
               "return_url" => route('success'),
               "cancel_url" => route('cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->total_amount
                    ]
                ]
            ]
        ]); 
          
        if(isset($response['id']) && $response['id']!=null) {
            foreach($response['links'] as $link) {
                if($link['rel'] === 'approve') {
                    session()->put('total_amount', $request->total_amount);
                    session()->put('payment_method', $request->payment_method);
                    session()->put('order_id', $request->order_id); 
                    return redirect()->away($link['href']);
                }
            }
        } else {
            session()->flash('status', 'error');
            session()->flash('message', 'Payment creation failed. Please try again.');
            return redirect()->route('payment.response');
        }
    }
    
    public function success(Request $request)
    {
        
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $paypalResponse = $provider->capturePaymentOrder($request->token); 
       
        if(isset($paypalResponse['status']) && $paypalResponse['status'] == 'COMPLETED') {
            $order_id = session()->get('order_id');
            $this->storePayment($paypalResponse); 
            $order = Order::find($order_id);
            $order->status = Order::STATUS_PROCESSING;
            $order->save();
            session()->flash('status', 'success');
            session()->flash('message', 'Payment successful. Thank you for your order!');
            return view('payment.response', [
                'paymentId' => $paypalResponse['id'],
                'orderId' => $order_id,
                'payerName' => $paypalResponse['payer']['name']['given_name'] . ' ' . $paypalResponse['payer']['name']['surname'],
                'amount' => $paypalResponse['purchase_units'][0]['payments']['captures'][0]['amount']['value'],
                'currency' => $paypalResponse['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'],
                'paymentDate' => $paypalResponse['purchase_units'][0]['payments']['captures'][0]['create_time'],
            ]); 
        } else {
            session()->flash('status', 'error');
            session()->flash('message', 'Payment was cancelled. Please try again.');
            return redirect()->route('cancel');
        }
    }
    public function storePayment($paypalResponse){
        $isoDateTime = $paypalResponse['purchase_units'][0]['payments']['captures'][0]['create_time'];
        $dateTime = new \DateTime($isoDateTime); 
        $formattedDateTime = $dateTime->format('Y-m-d H:i:s');

        $paymentData = [
            'payment_id' => $paypalResponse['purchase_units'][0]['payments']['captures'][0]['id'],
            'payment_order_id' => $paypalResponse['id'],
            'order_id' => session()->get('order_id'),
            'amount' => $paypalResponse['purchase_units'][0]['payments']['captures'][0]['amount']['value'],
            'currency' => $paypalResponse['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'],
            'payer_name' => $paypalResponse['payer']['name']['given_name'] . ' ' . $paypalResponse['payer']['name']['surname'],
            'payer_email' => $paypalResponse['payer']['email_address'],
            'payment_status' => 'paid',
            'payment_method' => 'PayPal',
            'payment_date' => $formattedDateTime
        ]; 
       
       Payment::create($paymentData);
       session()->forget(['total_amount', 'payment_method', 'order_id']);
    } 

    public function cancel()
    {
        return view('payment.response');
    }

      
}
