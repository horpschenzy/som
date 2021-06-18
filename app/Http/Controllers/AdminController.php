<?php

namespace App\Http\Controllers;

use App\Livestream;
use App\Payment;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->isSupervisor()) {
            $members = Member::where('centre', $user->supervisor_location)->count();
            $paidmembers = Payment::whereHas('user.member', function ($query) use ($user) {
                $query->where('centre', $user->supervisor_location);
            })->distinct('user_id')->count();
            $revenuengn = Payment::whereHas('user.member', function ($query) use ($user) {
                $query->where('centre', $user->supervisor_location);
            })->sum('requested_amount');
        } else {
            $members = Member::count();
            $paidmembers = Payment::distinct('user_id')->count();
            $revenuengn = Payment::sum('requested_amount');
        }

        return view('admin.index', compact('members', 'paidmembers', 'revenuengn'));
    }

    public function announcement(){
        return view('admin.announcement');
    }

    public function regstudent()
    {
        $user = Auth::user();
        if ($user->isSupervisor()) {

            $members = Member::where('centre', $user->supervisor_location)->join('payments', 'members.user_id', '=', 'payments.user_id')
                ->select('members.surname', 'members.firstname', 'members.othername', 'members.phonenumber', 'members.email', 'members.marital_status', 'members.gender', 'members.is_born_again', 'members.born_again_time', 'members.is_spirit_filled', 'members.current_church', 'members.reason', 'members.expectation', 'members.centre', 'members.address', 'members.payment', 'members.paymenttype', 'members.region', DB::raw('SUM(payments.requested_amount) as total_payments'))
                ->groupBy('members.surname', 'members.firstname', 'members.othername', 'members.phonenumber', 'members.email', 'members.marital_status', 'members.gender', 'members.is_born_again', 'members.born_again_time', 'members.is_spirit_filled', 'members.current_church', 'members.reason', 'members.expectation', 'members.centre', 'members.address', 'members.payment', 'members.paymenttype', 'members.region', 'payments.requested_amount')
                ->get();

            $paidmembers = Payment::whereHas('user.member', function ($query) use ($user) {
                $query->where('centre', $user->supervisor_location);
            })->get();
        } else {
            $members = Member::join('payments', 'members.user_id', '=', 'payments.user_id')
                ->select('members.surname', 'members.firstname', 'members.othername', 'members.phonenumber', 'members.email', 'members.marital_status', 'members.gender', 'members.is_born_again', 'members.born_again_time', 'members.is_spirit_filled', 'members.current_church', 'members.reason', 'members.expectation', 'members.centre', 'members.address', 'members.payment', 'members.paymenttype', 'members.region', DB::raw('SUM(payments.requested_amount) as total_payments'))
                ->groupBy('members.surname', 'members.firstname', 'members.othername', 'members.phonenumber', 'members.email', 'members.marital_status', 'members.gender', 'members.is_born_again', 'members.born_again_time', 'members.is_spirit_filled', 'members.current_church', 'members.reason', 'members.expectation', 'members.centre', 'members.address', 'members.payment', 'members.paymenttype', 'members.region', 'payments.requested_amount')
                ->get();
            $paidmembers = Payment::all();
        }

        return view('admin.regstudent', compact('members', 'paidmembers'));
    }

    public function paidstudent()
    {
        $user = Auth::user();
        if ($user->isSupervisor()) {
            $members = Member::where('centre', $user->supervisor_location)->get();
            $paidmembers = Payment::whereHas('user.member', function ($query) use ($user) {
                $query->where('centre', $user->supervisor_location);
            })->get();
        } else {
            $members = Member::all();
            $paidmembers = Payment::all();
        }
        return view('admin.paidstudent', compact('members', 'paidmembers'));
    }


    public function unpaidstudent()
    {
        $user = Auth::user();
        if ($user->isSupervisor()) {

            $members = Member::where('centre', $user->supervisor_location)->join('payments', 'members.user_id', '!=', 'payments.user_id')
                ->select('members.surname', 'members.firstname', 'members.othername', 'members.phonenumber', 'members.email', 'members.marital_status', 'members.gender', 'members.is_born_again', 'members.born_again_time', 'members.is_spirit_filled', 'members.current_church', 'members.reason', 'members.expectation', 'members.centre', 'members.address', 'members.payment', 'members.paymenttype', 'members.region', DB::raw('SUM(payments.requested_amount) as total_payments'))
                ->groupBy('members.surname', 'members.firstname', 'members.othername', 'members.phonenumber', 'members.email', 'members.marital_status', 'members.gender', 'members.is_born_again', 'members.born_again_time', 'members.is_spirit_filled', 'members.current_church', 'members.reason', 'members.expectation', 'members.centre', 'members.address', 'members.payment', 'members.paymenttype', 'members.region', 'payments.requested_amount')
                ->get();

            $paidmembers = Payment::whereHas('user.member', function ($query) use ($user) {
                $query->where('centre', $user->supervisor_location);
            })->get();
        } else {
            $members = Member::join('payments', 'members.user_id', '!=', 'payments.user_id')
                ->select('members.surname', 'members.firstname', 'members.othername', 'members.phonenumber', 'members.email', 'members.marital_status', 'members.gender', 'members.is_born_again', 'members.born_again_time', 'members.is_spirit_filled', 'members.current_church', 'members.reason', 'members.expectation', 'members.centre', 'members.address', 'members.payment', 'members.paymenttype', 'members.region', DB::raw('SUM(payments.requested_amount) as total_payments'))
                ->groupBy('members.surname', 'members.firstname', 'members.othername', 'members.phonenumber', 'members.email', 'members.marital_status', 'members.gender', 'members.is_born_again', 'members.born_again_time', 'members.is_spirit_filled', 'members.current_church', 'members.reason', 'members.expectation', 'members.centre', 'members.address', 'members.payment', 'members.paymenttype', 'members.region', 'payments.requested_amount')
                ->get();
            $paidmembers = Payment::all();
    }
             return view('admin.unpaidstudent', compact('members', 'paidmembers'));
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

    public function test()
    {
        return view('admin.test');
    }

    public function result()
    {
        return view('admin.result');
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
