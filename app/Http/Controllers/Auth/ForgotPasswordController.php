<?php

namespace App\Http\Controllers\Auth;

use App\Mailing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function sendsPasswordResetEmails(Request $request)
    {
        $mailing = new Mailing();
        $checkAvailability = $mailing->canSendMail();
        if (!$checkAvailability) {
            Mailing::create(['mail_count' => 1, 'date' => date('Y-m-d')]);
            
        }else{
            if($checkAvailability->mail_count >= env('MAIL_LIMIT')){
                return back()->withErrors(['email' => __('Maximum emails reached for today. Kindly try again tomorrow')]);
            }
            Mailing::whereDate('date', date('Y-m-d'))->update(['mail_count' => $checkAvailability->mail_count + 1]);
        }
        
        $request->validate(['email' => 'required|email']);
 
        $status = Password::sendResetLink(
            $request->only('email')
        );
    
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }
}
