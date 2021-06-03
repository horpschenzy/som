<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Member;
use Illuminate\Support\Facades\Redirect;
use Paystack;
use App\Payment;


class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {

        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentpayment();



        $payment = new Payment;
        $payment->transactionId = $paymentDetails['payment'] ['id'];
        $payment->status = $paymentDetails['status'];
        $payment->customeremail = $paymentDetails['payment']['customer']['email'];
        $payment->gateway_response = $paymentDetails['payment']['gateway_response'];
        $payment->paid_at = $paymentDetails['payment']['paid_at'];
        $payment->channel = $paymentDetails['payment']['channel'];
        $payment->requested_amount = $paymentDetails['payment']['requested_amount'];
        $payment->currency = $paymentDetails['payment']['currency'];

        $payment->save();



        return redirect('/payment')->with('success', ' Payment Successful');
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    public function getAmountToPay()
    {

    }
}

