<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Interfaces\Locations;
use App\Member;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Paystack;
use App\Payment;
use App\Interfaces\PaymentAmounts;
use App\Interfaces\PaymentStatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function __construct()
    {
    }

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
        try {
            return Paystack::getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback(Request $request)
    {

        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))->get('https://api.paystack.co/transaction/verify/'.$request->reference);
        // $paymentDetails = Paystack::getPaymentData();
        $paymentDetails = $response->json(); 

        $payment = Payment::where('transactionId', $paymentDetails['data']['id'])->first();

        if($payment) {
            return false;
        }
        parse_str(explode('?', $paymentDetails['data']['metadata']['referrer'])[1], $metadata);


        $payment = new Payment;
        $payment->transactionId = $paymentDetails['data']['id'];
        $payment->status = $paymentDetails['status'];
        $payment->customeremail = $paymentDetails['data']['customer']['email'];
        $payment->gateway_response = $paymentDetails['data']['gateway_response'];
        $payment->paid_at = $paymentDetails['data']['paid_at'];
        $payment->channel = $paymentDetails['data']['channel'];
        $payment->requested_amount = $paymentDetails['data']['requested_amount'];
        $payment->currency = $paymentDetails['data']['currency'];
        $payment->user_id = $metadata['user_id'];
        $payment->firstname = $metadata['first_name'];
        $payment->surname = $metadata['last_name'];
        $payment->description = $metadata['paymenttype'];

        $payment->save();


        if ($payment->status) {
            $amounts_to_pay = getAmountToPay();
            $amount_left = is_array($amounts_to_pay) ? $amounts_to_pay[count($amounts_to_pay) - 1] : $amounts_to_pay;
            // $initial_payment_cutoff = Carbon::createFromFormat('d/m/Y', env('INITIAL_PAYMENT_CUTOFF'));
            // $final_payment_cutoff = Carbon::createFromFormat('d/m/Y', env('FINAL_PAYMENT_CUTOFF'));

            if ($amount_left == 0) {
                User::where('id', $payment->user_id)->update([
                    'access' => 1
                ]);
                Member::where('user_id', $payment->user_id)->update([
                    'payment_status' => PaymentStatus::PAID
                ]);
            } elseif ($amount_left <= PaymentAmounts::SMALL_INSTALLMENT) {
                User::where('id', $payment->user_id)->update([
                    'access' => 0
                ]);
                Member::where('user_id', $payment->user_id)->update([
                    'payment_status' => PaymentStatus::PARTLY_PAID
                ]);
            }
        }


        return redirect('/member/profile')->with('success', ' Payment Successful - Kindly update your profile');
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    public function giveUsersDueAccess()
    {
        $users = User::with(['member', 'payments'])->whereHas('member', function($q){
            $q->where('region', '!=', 'IN');
        })->get();
        $manual_access = DB::table('access_log')->get()->pluck('user_id')->toArray();
        $bad = 0;
        foreach ($users as $key => $user) {
            if(in_array($user->id,$manual_access) || $user->name == 'Beatrice Babalola'){
                $user->name." - Already has access <br/>";
                continue;
            }
            $total_payments = $user->payments->sum('requested_amount');
            $amounts_to_pay = getAmountToPay($user->id);
            $amount_left = is_array($amounts_to_pay) ? $amounts_to_pay[count($amounts_to_pay) - 1] : $amounts_to_pay;

            $user_should_have_access = $amount_left == 0 ? true : false;
            if ($user->access) {
                if (!$user_should_have_access) {
                    User::where('id',$user->id)->update([
                        'access' => 0
                    ]);
                    echo "<b>Revoked Access</b> for <b>" . $user->name . "</b> because only payment of <b>" . number_format(($total_payments / 100)) . "</b> was found<br/>";
                }
                /* else{
                    echo "Payment updated for ".$user->name." <br/>";
                    Member::where('user_id', $user->id)->update([
                        'payment_status' => PaymentStatus::PAID
                    ]);
                } */
            } else {
                if ($user_should_have_access) {
                    User::where('id',$user->id)->update([
                        'access' => 1
                    ]);
                    Member::where('user_id', $user->id)->update([
                        'payment_status' => PaymentStatus::PAID
                    ]);
                    echo "<b>Gave Access</b> to <b>" . $user->name . "</b> because a payment of <b>" . number_format(($total_payments / 100)) . "</b> was found<br/>";
                }
            }
        }
    }

    public function backfill()
    {
        /* 'surname' => 'Shigbaja',
              'firstname' => 'Sunday Promise',
              'phonenumber' => '7065650547',
              'email' => 'shigbaja.sp@gmail.com',
              'centre' => 'Osogbo',
              'payment' => '600000',
              'payment_type' => 'Installment',
              'updated_at' => '06-03-21 16:33',
              'transactionId' => 'attempted paying 3000 but abandoned',
              'paidAt' => '',
              'amounts_payed' => '', */
        $user_controller = new FrontendController();
        foreach ($this->backup_data as $key => $data) {
            $data = (object) $data;
            //Check if user account exists, if not, create
            $user = User::with(['member', 'payments'])->where('email', $data->email)->first();
            switch ($data->payment) {
                case '800000':
                    $actual_value = PaymentAmounts::ONE_OFF;
                    # code...
                    break;
                case '8,250':
                    $actual_value = PaymentAmounts::ONE_OFF;
                    # code...
                    break;
                case '300000':
                    $actual_value = PaymentAmounts::SMALL_INSTALLMENT;
                    # code...
                    break;
                case '3,000':
                    $actual_value = PaymentAmounts::SMALL_INSTALLMENT;
                    # code...
                    break;
                case '3,150':
                    $actual_value = PaymentAmounts::SMALL_INSTALLMENT;
                    # code...
                    break;
                case '600000':
                    $actual_value = PaymentAmounts::BIG_INSTALLMENT;
                    # code...
                    break;
                case '6,000':
                    $actual_value = PaymentAmounts::BIG_INSTALLMENT;
                    # code...
                    break;
                case '6,250':
                    $actual_value = PaymentAmounts::BIG_INSTALLMENT;
                    # code...
                    break;
                default:
                    $actual_value = $data->payment;
                    break;
            }
            if (!$user) {
                $new_user = [
                    'firstname' => $data->firstname,
                    'surname' => $data->surname,
                    'phonenumber' => $data->phonenumber,
                    'email' => $data->email,
                    'centre' => $data->centre,
                    'payment' => $data->payment,
                    'paymenttype' => $data->payment_type,
                    'region' => in_array($data->centre, ["US", "Europe", "Asia", "UAE"]) ? 'IN' : 'NG',
                    'password' => $data->email
                ];
                dump("Creating new user ", $new_user);
                $user_controller->store(new Request($new_user));
                $user = User::with(['member', 'payments'])->where('email', $data->email)->first();
            }
            $total_payments = $user->payments->sum('requested_amount');
            $needs_payment = false;
            switch ($data->transactionId) {
                case 'Successful':
                    if ($total_payments != $actual_value) {
                        dump('Successful' . '---' . $total_payments . '---' . $actual_value);
                        $needs_payment = true;
                    }
                    break;
                case 'seen/3000':
                    $actual_value = PaymentAmounts::SMALL_INSTALLMENT;
                    if ($total_payments != $actual_value) {
                        dump('seen/3000' . '---' . $total_payments . '---' . $actual_value);
                        $needs_payment = true;
                    }
                    break;

                case 'seen/6250':
                    $actual_value = PaymentAmounts::BIG_INSTALLMENT;
                    if ($total_payments != $actual_value) {
                        dump('seen/6250' . '---' . $total_payments . '---' . $actual_value);
                        $needs_payment = true;
                    }

                    break;

                default:
                    dump('eww' . '---' . $data->transactionId . '---' . $total_payments . '---' . $actual_value);
                    break;
            }
            if ($needs_payment) {
                dump("Creating new payment ", $data, $actual_value);
                $payment = new Payment;
                $payment->transactionId = '';
                $payment->status = 'Approved';
                $payment->customeremail = $data->email;
                $payment->gateway_response = '';
                $payment->paid_at = '';
                $payment->channel = 'backfill';
                $payment->requested_amount = $actual_value;
                $payment->currency = 'NGN';
                $payment->user_id = $user->id;
                $payment->firstname = $data->firstname;
                $payment->surname = $data->surname;
                $payment->description = $data->payment_type;

                $payment->save();


                if ($actual_value >= PaymentAmounts::ONE_OFF) {
                    User::where('id', $payment->user_id)->update([
                        'access' => 1
                    ]);
                    Member::where('user_id', $payment->user_id)->update([
                        'payment_status' => PaymentStatus::PAID
                    ]);
                } else if ($actual_value >= PaymentAmounts::BIG_INSTALLMENT) {
                    User::where('id', $payment->user_id)->update([
                        'access' => 1
                    ]);
                    Member::where('user_id', $payment->user_id)->update([
                        'payment_status' => PaymentStatus::PARTLY_PAID
                    ]);
                } else {
                    User::where('id', $payment->user_id)->update([
                        'access' => 0
                    ]);
                    Member::where('user_id', $payment->user_id)->update([
                        'payment_status' => PaymentStatus::UNPAID
                    ]);
                }
            }


            //Check if member exists, if not create

            //
        }

        /* $members = Member::all();
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

        }*/
    }
}
