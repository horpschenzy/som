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


    $initial_payment_cutoff = Carbon::createFromFormat('d/m/Y', env('INITIAL_PAYMENT_CUTOFF') );
    $final_payment_cutoff = Carbon::createFromFormat('d/m/Y', env('FINAL_PAYMENT_CUTOFF') );

    // $total_payment_before_cutoff = Payment::whereDate('created_at', '<=', $initial_payment_cutoff)->where('customeremail', $user->email)->orWhere('user_id',$user->id)->sum('requested_amount');
    // $total_payment_after_cutoff = Payment::whereDate('created_at', '>', $initial_payment_cutoff)->where('customeremail', $user->email)->orWhere('user_id',$user->id)->sum('requested_amount');
    $total_payment =intval( Payment::where('customeremail', $user->email)->orWhere('user_id',$user->id)->sum('requested_amount') );

    $cuttoff_passed = Carbon::now()->greaterThan( $initial_payment_cutoff);

    $one_off = $cuttoff_passed ? PaymentAmounts::ONE_OFF_LATE : PaymentAmounts::ONE_OFF;

    
    if(!$total_payment){ 
        if($user->member->paymenttype == 'oneoff'){
            $amount = [$one_off];
        }
        else{
            $amount = $cuttoff_passed ? [$one_off] : [ PaymentAmounts::SMALL_INSTALLMENT , $one_off];
        }
    }
    else{

        if($cuttoff_passed) { 
            if($total_payment == PaymentAmounts::SMALL_INSTALLMENT){
                $amount = [PaymentAmounts::ONE_OFF];
            }
            elseif($total_payment == PaymentAmounts::TWO_SMALL_INSTALLMENTS || $total_payment == PaymentAmounts::ONE_OFF || $total_payment == PaymentAmounts::ONE_OFF_LATE || $total_payment ==  PaymentAmounts::ONE_OFF + PaymentAmounts::SMALL_INSTALLMENT){
                $amount = 0;
                
            }
        }
        else {
            if($total_payment == PaymentAmounts::SMALL_INSTALLMENT){
                $amount = [PaymentAmounts::SMALL_INSTALLMENT];
            }
            elseif($total_payment == PaymentAmounts::TWO_SMALL_INSTALLMENTS || $total_payment == PaymentAmounts::ONE_OFF){
                $amount = 0;
            }
        }
    }


    return $amount;
}