<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
class PaypalController extends Controller
{
    protected $apiContext;

    public function __construct()
    {
        
         $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('services.paypal.client_id'),
                config('services.paypal.secret')
            )
        );
       
        $this->apiContext->setConfig(config('services.paypal.settings'));
        
    }

    public function createPayment(Request $request)
    {
        $amount = new Amount();
        $amount->setTotal($request->input('total_amount'))
               ->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount)
                    ->setDescription('Payment for order');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('payment.execute'))
                     ->setCancelUrl(route('payment.cancel'));

        $payment = new Payment();
        $payment->setIntent('sale')
                ->setPayer(['payment_method' => 'paypal'])
                ->setTransactions([$transaction])
                ->setRedirectUrls($redirectUrls);
                dd($this->apiContext); die;
        try {
            $payment->create($this->apiContext);
        } catch (\Exception $ex) {
            return redirect()->route('checkout')->withErrors('Could not create payment. Please try again.');
        }

        return redirect()->away($payment->getApprovalLink());
    }

    public function executePayment(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            $result = $payment->execute($execution, $this->apiContext);
        } catch (\Exception $ex) {
            return redirect()->route('checkout')->withErrors('Could not execute payment. Please try again.');
        }

        // Save payment details and update order status in your database

        return redirect()->route('payment.success');
    }

    public function cancelPayment()
    {
        return redirect()->route('checkout')->withErrors('Payment was cancelled.');
    }

    public function paymentSuccess()
    {
        return view('payment.success');
    }
    
}
