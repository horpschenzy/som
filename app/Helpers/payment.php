<?php

use App\Payment;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\PaymentAmounts;
use Carbon\Carbon;

function getAmountToPay($user_id= null){
    if(is_null($user_id)){
        $user = Auth::user();
    }
    else{
        $user = User::find($user_id);
    }

    $total_payment = Payment::where('customeremail', $user->email)->orWhere('user_id',$user->id)->sum('requested_amount');
    $initial_payment_cutoff = Carbon::createFromFormat('d/m/Y', env('INITIAL_PAYMENT_CUTOFF') );
    $final_payment_cutoff = Carbon::createFromFormat('d/m/Y', env('FINAL_PAYMENT_CUTOFF') );

    if(!$total_payment){
        $amount = $user->member->payment;
    }
    else{
        switch ($user->member->paymenttype) {
            case 'oneoff':
                //Should not be possible, but if for some reason there is an edge case where there is a payment for a user and it is less that required
                $amount = $total_payment < PaymentAmounts::ONE_OFF ? PaymentAmounts::ONE_OFF - $total_payment : 0;
                break;
            case 'installment':
                if($total_payment == PaymentAmounts::SMALL_INSTALLMENT){
                    //Is today after inital cut off?
                    if(Carbon::now()->greaterThan( $initial_payment_cutoff) ){
                        $amount = PaymentAmounts::BIG_INSTALLMENT;
                    }
                    else{
                        $amount = PaymentAmounts::SMALL_INSTALLMENT;
                    }
                }
                elseif($total_payment == PaymentAmounts::BIG_INSTALLMENT){
                    $amount = PaymentAmounts::SMALL_INSTALLMENT;
                }
                elseif($total_payment == PaymentAmounts::TWO_SMALL_INSTALLMENTS){
                    $amount = PaymentAmounts::SMALL_INSTALLMENT;
                }
                elseif($total_payment == PaymentAmounts::TWO_INSTALLMENT_TOTAL || $total_payment == PaymentAmounts::THREE_INSTALLMENT_TOTAL ){
                    $amount = 0;
                }
                
                break;
            default:
                abort(400, "There is a problem verifying your payment. Please contact admin");
                break;
        }
    }


    return $amount;
}