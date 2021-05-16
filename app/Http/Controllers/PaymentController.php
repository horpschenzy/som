<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\member;
use Illuminate\Support\Facades\Redirect;
use Paystack;
use App\payment;


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
        $paymentDetails = Paystack::getPaymentData();



        $data = new payment;
        $data->transactionId = $paymentDetails['data'] ['id'];
        $data->status = $paymentDetails['status'];
        $data->customeremail = $paymentDetails['data']['customer']['email'];
        $data->gateway_response = $paymentDetails['data']['gateway_response'];
        $data->paid_at = $paymentDetails['data']['paid_at'];
        $data->channel = $paymentDetails['data']['channel'];
        $data->requested_amount = $paymentDetails['data']['requested_amount'];
        $data->currency = $paymentDetails['data']['currency'];

        $data->save();

        return redirect('/payment')->with('success', ' payment Completed');
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}

