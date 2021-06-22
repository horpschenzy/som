<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Member;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Paystack;
use App\Payment;
use App\Interfaces\PaymentAmounts;
use App\Interfaces\PaymentStatus;
use Carbon\Carbon;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    // public function redirectToGateway()
    // {

    //     try{
    //         return Paystack::getAuthorizationUrl()->redirectNow();
    //     }catch(\Exception $e) {
    //         return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
    //     }
    // }

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

        $payment = new Payment;
        $payment->transactionId = $paymentDetails['data'] ['id'];
        $payment->status = $paymentDetails['status'];
        $payment->customeremail = $paymentDetails['data']['customer']['email'];
        $payment->gateway_response = $paymentDetails['data']['gateway_response'];
        $payment->paid_at = $paymentDetails['data']['paid_at'];
        $payment->channel = $paymentDetails['data']['channel'];
        $payment->requested_amount = $paymentDetails['data']['requested_amount'];
        $payment->currency = $paymentDetails['data']['currency'];
        $payment->user_id = $paymentDetails['data']['metadata']['user_id'];
        $payment->firstname = $paymentDetails['data']['metadata']['first_name'];
        $payment->surname = $paymentDetails['data']['metadata']['last_name'];
        $payment->description = $paymentDetails['data']['metadata']['paymenttype'];

        $payment->save();


        if($payment->status ){
            $amount_left = getAmountToPay($payment->user_id);
            $initial_payment_cutoff = Carbon::createFromFormat('d/m/Y', env('INITIAL_PAYMENT_CUTOFF') );
            $final_payment_cutoff = Carbon::createFromFormat('d/m/Y', env('FINAL_PAYMENT_CUTOFF') );

            if($amount_left == 0){
                User::where('id',$payment->user_id)->update([
                    'access' => 1
                ]);
                Member::where('user_id',$payment->user_id)->update([
                    'payment_status' => PaymentStatus::PAID
                ]);

            }
            elseif($amount_left <= PaymentAmounts::SMALL_INSTALLMENT && Carbon::now()->lessThan( $final_payment_cutoff)){
                User::where('id',$payment->user_id)->update([
                    'access' => 1
                ]);
                Member::where('user_id',$payment->user_id)->update([
                    'payment_status' => PaymentStatus::PARTLY_PAID
                ]);
            }

        }


        return redirect('/member/profile')->with('success', ' Payment Successful - Kindly update your profile');
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    public function backfill(){
        $members = Member::all();
        foreach($members as $member){
            $amount_left = getAmountToPay($member->user_id);
            echo $member->user_id.'-----'.$amount_left."<br/>";
            if($amount_left == 0){
                User::where('id',$member->user_id)->update([
                    'access' => 1
                ]);
                Member::where('user_id',$member->user_id)->update([
                    'payment_status' => PaymentStatus::PAID
                ]);
            }
            elseif( $amount_left <= PaymentAmounts::SMALL_INSTALLMENT && $amount_left > 0){
                User::where('id',$member->user_id)->update([
                    'access' => 1
                ]);
                Member::where('user_id',$member->user_id)->update([
                    'payment_status' => PaymentStatus::PARTLY_PAID
                ]);
            }
            elseif( $amount_left <= PaymentAmounts::BIG_INSTALLMENT && $amount_left > PaymentAmounts::SMALL_INSTALLMENT){
                User::where('id',$member->user_id)->update([
                    'access' => 0
                ]);
                Member::where('user_id',$member->user_id)->update([
                    'payment_status' => PaymentStatus::PARTLY_PAID
                ]);
            }

        }
    }
}

