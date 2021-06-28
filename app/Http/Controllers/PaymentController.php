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
    private $backup_data;

    public function __construct()
    {
        $this->backup_data = [
            0 => [
                'surname' => 'Shigbaja',
                'firstname' => 'Sunday Promise',
                'phonenumber' => '7065650547',
                'email' => 'shigbaja.sp@gmail.com',
                'centre' => 'Osogbo',
                'payment' => '600000',
                'payment_type' => 'Installment',
                'updated_at' => '06-03-21 16:33',
                'transactionId' => 'attempted paying 3000 but abandoned',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            1 => [
                'surname' => 'Gafarou',
                'firstname' => 'Motunrayo',
                'phonenumber' => '7031262621',
                'email' => 'gafamui702@gmail.com',
                'centre' => 'Agricola',
                'payment' => '800000',
                'payment_type' => 'oneoff',
                'updated_at' => '06-03-21 16:33',
                'transactionId' => 'not  seen',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            2 => [
                'surname' => 'Olaleye',
                'firstname' => 'Dammie',
                'phonenumber' => '8160215922',
                'email' => 'sammy_sammie@yahoo.com',
                'centre' => 'Ondo',
                'payment' => '315000',
                'payment_type' => 'installment',
                'updated_at' => '06-05-21 8:51',
                'transactionId' => 'not  seen',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            3 => [
                'surname' => 'Ikuyinminu',
                'firstname' => 'Oladimeji',
                'phonenumber' => '9032507887',
                'email' => 'ioladimejielijah@gmail.com',
                'centre' => 'Ondo',
                'payment' => '800000',
                'payment_type' => 'oneoff',
                'updated_at' => '06-03-21 16:33',
                'transactionId' => 'not seen',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            4 => [
                'surname' => 'Olayode',
                'firstname' => 'Israel',
                'phonenumber' => '8067755960',
                'email' => 'israelolayode@gmail.com',
                'centre' => 'Others',
                'payment' => '300000',
                'payment_type' => 'Installment',
                'updated_at' => '06-03-21 16:33',
                'transactionId' => 'not seen',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            5 => [
                'surname' => 'Ategbe',
                'firstname' => 'Kehinde',
                'phonenumber' => '8143564789',
                'email' => 'franciskenny36@gmail.com',
                'centre' => 'Agricola',
                'payment' => '300000',
                'payment_type' => 'Installment',
                'updated_at' => '06-03-21 16:33',
                'transactionId' => 'not successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            6 => [
                'surname' => 'Odewale',
                'firstname' => 'Dayo',
                'phonenumber' => '8032165785',
                'email' => 'dayoodewale12@gmail.com',
                'centre' => 'Ile-Ife',
                'payment' => '800000',
                'payment_type' => 'oneoff',
                'updated_at' => '06-03-21 16:33',
                'transactionId' => 'not successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            7 => [
                'surname' => 'Olagunju',
                'firstname' => 'Amos Gbenga',
                'phonenumber' => '7030373615',
                'email' => 'olagunjuoluwagbemiga@gmail.com',
                'centre' => 'Others',
                'payment' => '800000',
                'payment_type' => 'oneoff',
                'updated_at' => '06-03-21 16:33',
                'transactionId' => 'not successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            8 => [
                'surname' => 'Okoruwa',
                'firstname' => 'Joshua',
                'phonenumber' => '2.35E+12',
                'email' => 'okoruwajoshua96@gmail.com',
                'centre' => 'Agricola',
                'payment' => '800000',
                'payment_type' => 'oneoff',
                'updated_at' => '06-03-21 16:33',
                'transactionId' => 'Successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            9 => [
                'surname' => 'Okoruwa',
                'firstname' => 'Melody',
                'phonenumber' => '8059198494',
                'email' => 'melodyokoruwa@gmail.com',
                'centre' => 'Agricola',
                'payment' => '300000',
                'payment_type' => 'installment',
                'updated_at' => '06-03-21 21:59',
                'transactionId' => 'Successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            10 => [
                'surname' => 'Olatunbosun',
                'firstname' => 'John',
                'phonenumber' => '7063673967',
                'email' => 'johnolatunbosun@gmail.com',
                'centre' => 'ikeja',
                'payment' => '800000',
                'payment_type' => 'oneoff',
                'updated_at' => '06-03-21 16:33',
                'transactionId' => 'Successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            11 => [
                'surname' => 'Adebayo',
                'firstname' => 'Adebiyi',
                'phonenumber' => '9056581376',
                'email' => 'biyiadebayo8@gmail.com',
                'centre' => 'ikeja',
                'payment' => '825000',
                'payment_type' => 'oneoff',
                'updated_at' => '06-05-21 5:10',
                'transactionId' => 'Successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            12 => [
                'surname' => 'Oladapo',
                'firstname' => 'Opeyemi',
                'phonenumber' => '7063528874',
                'email' => 'opeyemioladapo2@gmail.com',
                'centre' => 'Ile-Ife',
                'payment' => '300000',
                'payment_type' => 'Installment',
                'updated_at' => '06-03-21 16:33',
                'transactionId' => 'Successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            13 => [
                'surname' => 'Akindele',
                'firstname' => 'Noah',
                'phonenumber' => '8068071694',
                'email' => 'akindeleallahdey@gmail.com',
                'centre' => 'Ile-Ife',
                'payment' => '800000',
                'payment_type' => 'oneoff',
                'updated_at' => '06-03-21 16:33',
                'transactionId' => 'Successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            14 => [
                'surname' => 'Faseyi',
                'firstname' => 'Lukman Oluwole John',
                'phonenumber' => '7065579049',
                'email' => 'kenhaghills@gmail.com',
                'centre' => 'Ile-Ife',
                'payment' => '800000',
                'payment_type' => 'oneoff',
                'updated_at' => '06-03-21 16:33',
                'transactionId' => 'Successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            15 => [
                'surname' => 'Okonkwo',
                'firstname' => 'Nkiruka',
                'phonenumber' => '8034922645',
                'email' => 'nkiruka.okonkwo12@gmail.com',
                'centre' => 'Lekki',
                'payment' => '800000',
                'payment_type' => 'oneoff',
                'updated_at' => '06-03-21 16:33',
                'transactionId' => 'Successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            16 => [
                'surname' => 'Ogundipe',
                'firstname' => 'Christianah',
                'phonenumber' => '9099601545',
                'email' => 'Christianahogundipe8@gmail.com',
                'centre' => 'Lekki',
                'payment' => '300000',
                'payment_type' => 'installment',
                'updated_at' => '06-03-21 16:33',
                'transactionId' => 'Successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            17 => [
                'surname' => 'Oluwadare',
                'firstname' => 'Oluyemisi',
                'phonenumber' => '8168042998',
                'email' => 'dunmoladare@gmail.com',
                'centre' => 'Lekki',
                'payment' => '800000',
                'payment_type' => 'oneoff',
                'updated_at' => '06-03-21 16:33',
                'transactionId' => 'Successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            18 => [
                'surname' => 'oyebade',
                'firstname' => 'segun',
                'phonenumber' => '8036560011',
                'email' => 'bezaleelconcepts@gmail.com',
                'centre' => 'Lekki',
                'payment' => '800000',
                'payment_type' => 'oneoff',
                'updated_at' => '06-04-21 11:50',
                'transactionId' => 'Successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            19 => [
                'surname' => 'Omotosho',
                'firstname' => 'Gabriel',
                'phonenumber' => '8137565403',
                'email' => 'omotoshogabriel15@gmail.com',
                'centre' => 'Osogbo',
                'payment' => '800000',
                'payment_type' => 'oneoff',
                'updated_at' => '06-03-21 16:33',
                'transactionId' => 'Successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            20 => [
                'surname' => 'Osunwusi',
                'firstname' => 'Tomisin',
                'phonenumber' => '2.35E+12',
                'email' => 'tosinosunwusi@gmail.com',
                'centre' => 'Osogbo',
                'payment' => '800000',
                'payment_type' => 'oneoff',
                'updated_at' => '06-03-21 16:33',
                'transactionId' => 'Successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            21 => [
                'surname' => 'Jaiyeola',
                'firstname' => 'Oludotun',
                'phonenumber' => '8182602156',
                'email' => 'oludotunj@gmail.com',
                'centre' => 'Others',
                'payment' => '625000',
                'payment_type' => 'installment',
                'updated_at' => '06-05-21 8:22',
                'transactionId' => 'Successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            22 => [
                'surname' => 'Makinde',
                'firstname' => 'Babatunde',
                'phonenumber' => '8068546978',
                'email' => 'youngmak2013@gmail.com',
                'centre' => 'Agricola',
                'payment' => '600000',
                'payment_type' => 'Installment',
                'updated_at' => '06-03-21 16:33',
                'transactionId' => 'seen/3000',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            23 => [
                'surname' => 'Olusi',
                'firstname' => 'Joseph',
                'phonenumber' => '8167033173',
                'email' => 'jayolusi@gmail.com',
                'centre' => 'ikeja',
                'payment' => '800000',
                'payment_type' => 'oneoff',
                'updated_at' => '06-03-21 16:33',
                'transactionId' => 'seen/6250',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            24 => [
                'surname' => 'Solabi',
                'firstname' => 'Akinyemi',
                'phonenumber' => '7031277110',
                'email' => 'trendzexpress@gmail.com',
                'centre' => 'Agricola',
                'payment' => '800000',
                'payment_type' => 'oneoff',
                'updated_at' => '06-03-21 16:33',
                'transactionId' => '',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            26 => [
                'surname' => 'Cornelius',
                'firstname' => 'Onduru',
                'phonenumber' => '8177037320',
                'email' => 'corneltee@gmail.com',
                'centre' => 'Lekki',
                'payment' => '8,250',
                'payment_type' => 'oneoff',
                'updated_at' => '',
                'transactionId' => 'Successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            27 => [
                'surname' => 'Adebisola',
                'firstname' => 'Ogunseye',
                'phonenumber' => '8060033267',
                'email' => 'adebisolaogunseye001@gmail.com',
                'centre' => 'Ikeja',
                'payment' => '6,250',
                'payment_type' => 'Installment',
                'updated_at' => '',
                'transactionId' => 'Successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            28 => [
                'surname' => 'Melody',
                'firstname' => 'Okoruwa',
                'phonenumber' => '8059198494',
                'email' => 'melodyokoruwa@gmail.com',
                'centre' => 'Agricola',
                'payment' => '6,000',
                'payment_type' => 'Installment',
                'updated_at' => '',
                'transactionId' => 'Successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            29 => [
                'surname' => 'Adeola',
                'firstname' => 'Iwarere ',
                'phonenumber' => '7069544773',
                'email' => 'iwarereadeola@gmail.com',
                'centre' => 'Agricola',
                'payment' => '8,250',
                'payment_type' => 'oneoff',
                'updated_at' => '',
                'transactionId' => 'Successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            30 => [
                'surname' => 'Onome',
                'firstname' => 'Omatsola ',
                'phonenumber' => '9020013964',
                'email' => 'omatsolateminiyi@gmail.com',
                'centre' => 'Agricola',
                'payment' => '8,250',
                'payment_type' => 'oneoff',
                'updated_at' => '',
                'transactionId' => 'Successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
            31 => [
                'surname' => 'Olawumi',
                'firstname' => 'Adeyeye ',
                'phonenumber' => '7065217506',
                'email' => 'olaadore@gmail.com',
                'centre' => 'Akure',
                'payment' => '8,250',
                'payment_type' => 'oneoff',
                'updated_at' => '',
                'transactionId' => 'Successful',
                'paidAt' => '',
                'amounts_payed' => '',
            ],
        ];
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
    public function handleGatewayCallback()
    {

        $paymentDetails = Paystack::getPaymentData();

        $payment = new Payment;
        $payment->transactionId = $paymentDetails['data']['id'];
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


        if ($payment->status) {
            $amount_left = getAmountToPay($payment->user_id);
            $initial_payment_cutoff = Carbon::createFromFormat('d/m/Y', env('INITIAL_PAYMENT_CUTOFF'));
            $final_payment_cutoff = Carbon::createFromFormat('d/m/Y', env('FINAL_PAYMENT_CUTOFF'));

            if ($amount_left == 0) {
                User::where('id', $payment->user_id)->update([
                    'access' => 1
                ]);
                Member::where('user_id', $payment->user_id)->update([
                    'payment_status' => PaymentStatus::PAID
                ]);
            } elseif ($amount_left <= PaymentAmounts::SMALL_INSTALLMENT && Carbon::now()->lessThan($final_payment_cutoff)) {
                User::where('id', $payment->user_id)->update([
                    'access' => 1
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
        $users = User::with(['member', 'payments'])->get();
        $bad = 0;
        foreach ($users as $key => $user) {
            $total_payments = $user->payments->sum('requested_amount');
            $user_should_have_access = $total_payments >= PaymentAmounts::BIG_INSTALLMENT ? true : false;
            if ($user->access) {
                if (!$user_should_have_access) {
                    User::where('id',$user->id)->update([
                        'access' => 0
                    ]);
                    echo "<b>Revoked Access</b> for <b>" . $user->name . "</b> because only payment of <b>" . number_format(($total_payments / 100)) . "</b> was found<br/>";
                }
            } else {
                if ($user_should_have_access) {
                    User::where('id',$user->id)->update([
                        'access' => 1
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
