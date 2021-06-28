<?php

namespace App\Http\Controllers;

use App\Interfaces\PaymentStatus;
use App\Livestream;
use App\Payment;
use App\Member;
use App\User;
use App\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    private $supervisor_location;
    private $supervisor_region;
    private $is_supervisor;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->populate_supervisor();
            return $next($request);
        });
    }

    private function populate_supervisor()
    {
        $user = Auth::user();
        if ($user->isSupervisor()) {
            $this->is_supervisor = true;
            switch ($user->supervisor_location) {
                case 'Others-ng':
                    $this->supervisor_region = 'NG';
                    $this->supervisor_location = 'Others';
                    break;
                case 'Others-in':
                    $this->supervisor_region = 'IN';
                    $this->supervisor_location = 'Others';
                    break;

                default:
                    $this->supervisor_location = $user->supervisor_location;
                    break;
            }
        } else {
            $this->is_supervisor = false;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function email()
    {
        return view('admin.email');
    }

    public function sendmail()
    {

        $users = User::all();

        foreach ($users as $user) {

            $details = [];
            $details['name'] = $user->name;
            $details['reg_no'] = $user->reg_no;
            $this->email = $user->email;
            Mail::send('emails.welcomemail', $details, function ($message) {
                $message->to($this->email)->subject('Welcome To School of Ministry 2021');
            });
        }
        return view('admin.email');
    }


    public function index()
    {
        if ($this->is_supervisor) {
            $members = Member::where('centre', $this->supervisor_location)->region($this->supervisor_region)->count();
            $paidmembers = Payment::whereHas('user.member', function ($query) {
                $query->where('centre', $this->supervisor_location);
                $query->region($this->supervisor_region);
            })->distinct('user_id')->count();
            $revenuengn = Payment::whereHas('user.member', function ($query) {
                $query->where('centre', $this->supervisor_location);
                $query->region($this->supervisor_region);
            })->sum('requested_amount');
        } else {
            $members = Member::count();
            $paidmembers = Payment::distinct('user_id')->count();
            $revenuengn = Payment::sum('requested_amount');
        }

        return view('admin.index', compact('members', 'paidmembers', 'revenuengn'));
    }

    public function announcement()
    {
        return view('admin.announcement');
    }

    public function regstudent()
    {
        if ($this->is_supervisor) {
            $members = Member::where('centre', $this->supervisor_location)->leftJoin('payments', 'members.user_id', '=', 'payments.user_id')
                ->join('users', 'users.id', '=', 'members.user_id')
                ->select(
                    'members.surname',
                    'members.firstname',
                    'members.othername',
                    'members.phonenumber',
                    'members.email',
                    'members.marital_status',
                    'members.gender',
                    'members.is_born_again',
                    'members.born_again_time',
                    'members.is_spirit_filled',
                    'members.current_church',
                    'members.reason',
                    'members.expectation',
                    'members.centre',
                    'members.address',
                    'members.payment',
                    'members.paymenttype',
                    'members.region',
                    'users.reg_no',
                    DB::raw('SUM(payments.requested_amount) as total_payments')
                )
                ->region($this->supervisor_region)
                ->groupBy('members.surname', 'members.firstname', 'members.othername', 'members.phonenumber', 'members.email', 'members.marital_status', 'members.gender', 'members.is_born_again', 'members.born_again_time', 'members.is_spirit_filled', 'members.current_church', 'members.reason', 'members.expectation', 'members.centre', 'members.address', 'members.payment', 'members.paymenttype', 'members.region', 'users.reg_no', 'payments.requested_amount')
                ->get();
            $paidmembers = Payment::whereHas('user.member', function ($query) {
                $query->where('centre', $this->supervisor_location);
                $query->region($this->supervisor_region);
            })->get();
        } else {
            $members = Member::leftJoin('payments', 'members.user_id', '=', 'payments.user_id')
                ->join('users', 'users.id', '=', 'members.user_id')
                ->select(
                    'members.surname',
                    'members.firstname',
                    'members.othername',
                    'members.phonenumber',
                    'members.email',
                    'members.marital_status',
                    'members.gender',
                    'members.is_born_again',
                    'members.born_again_time',
                    'members.is_spirit_filled',
                    'members.current_church',
                    'members.reason',
                    'members.expectation',
                    'members.centre',
                    'members.address',
                    'members.payment',
                    'members.paymenttype',
                    'members.region',
                    'users.reg_no',
                    DB::raw('SUM(payments.requested_amount) as total_payments')
                )
                ->groupBy('members.surname', 'members.firstname', 'members.othername', 'members.phonenumber', 'members.email', 'members.marital_status', 'members.gender', 'members.is_born_again', 'members.born_again_time', 'members.is_spirit_filled', 'members.current_church', 'members.reason', 'members.expectation', 'members.centre', 'members.address', 'members.payment', 'members.paymenttype', 'members.region', 'users.reg_no', 'payments.requested_amount')
                ->get();
            $paidmembers = Payment::all();
        }

        return view('admin.regstudent', compact('members', 'paidmembers'));
    }

    public function paidstudent()
    {
        if ($this->is_supervisor) {
            $paidmembers = Payment::with('member')->whereHas('user.member', function ($query) {
                $query->where('centre', $this->supervisor_location);
                $query->region($this->supervisor_region);
            })->get();
        } else {
            $paidmembers = Payment::with('member')->get();
        }
        return view('admin.paidstudent', compact('paidmembers'));
    }


    public function unpaidstudent()
    {
        if ($this->is_supervisor) {

            $members = Member::where('centre', $this->supervisor_location)->region($this->supervisor_region)->where('payment_status', '!=', PaymentStatus::PAID)->join('payments', 'members.user_id', '!=', 'payments.user_id')
                ->join('users', 'users.id', '=', 'members.user_id')
                ->select('users.reg_no','members.surname','members.user_id', 'members.payment', 'members.firstname', 'members.othername', 'members.phonenumber', 'members.email', 'members.marital_status', 'members.gender', 'members.is_born_again', 'members.born_again_time', 'members.is_spirit_filled', 'members.current_church', 'members.reason', 'members.expectation', 'members.centre', 'members.address', 'members.payment', 'members.paymenttype', 'members.region', DB::raw('SUM(payments.requested_amount) as total_payments'))
                ->groupBy('users.reg_no','members.surname','members.user_id', 'members.payment', 'members.firstname', 'members.othername', 'members.phonenumber', 'members.email', 'members.marital_status', 'members.gender', 'members.is_born_again', 'members.born_again_time', 'members.is_spirit_filled', 'members.current_church', 'members.reason', 'members.expectation', 'members.centre', 'members.address', 'members.payment', 'members.paymenttype', 'members.region')
                ->get();
        } else {
            $members = Member::join('payments', 'members.user_id', '!=', 'payments.user_id')
                ->join('users', 'users.id', '=', 'members.user_id')
                ->where('payment_status', '!=', PaymentStatus::PAID)
                ->select('users.reg_no', 'members.surname','members.user_id', 'members.payment', 'members.firstname', 'members.othername', 'members.phonenumber', 'members.email', 'members.marital_status', 'members.gender', 'members.is_born_again', 'members.born_again_time', 'members.is_spirit_filled', 'members.current_church', 'members.reason', 'members.expectation', 'members.centre', 'members.address', 'members.payment', 'members.paymenttype', 'members.region', DB::raw('SUM(payments.requested_amount) as total_payments'))
                ->groupBy('users.reg_no', 'members.surname','members.user_id', 'members.payment', 'members.firstname', 'members.othername', 'members.phonenumber', 'members.email', 'members.marital_status', 'members.gender', 'members.is_born_again', 'members.born_again_time', 'members.is_spirit_filled', 'members.current_church', 'members.reason', 'members.expectation', 'members.centre', 'members.address', 'members.payment', 'members.paymenttype', 'members.region')
                ->get();
        }
        return view('admin.unpaidstudent', compact('members'));
    }

    public function assignment()
    {
        return view('admin.assignment');
    }

    public function livestream()
    {
        $livestreams = Livestream::all();
        return view('admin.livestream', compact('livestreams'));
    }

    public function classroom()
    {
        $livestream = Livestream::where('status', 'started')->first();
        return view('admin.classroom', compact('livestream'));
    }

    public function showClassroom($id, $type)
    {
        $livestream = Livestream::where('status', 'started')->first();
        return view('admin.indexclassroom', compact('livestream', 'type'));
    }

    public function test()
    {
        return view('admin.test');
    }

    public function result()
    {
        return view('admin.result');
    }

    public function testresult()
    {
        $assignments = Assignment::all();
        return view('members.testresult', compact( 'assignments'));
    }

    public function transaction()
    {
        $payments = Payment::all();
        return view('admin.transaction', compact('payments'));
    }

    public function profile()
    {
        return view('admin.profile');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
