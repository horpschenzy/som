<?php

namespace App\Http\Controllers;

use App\Interfaces\UserTypes;
use Illuminate\Http\Request;
use App\Livestream;
use App\Member;
use App\User;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
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
            $members = Member::where('centre', $user->supervisor_location)->get();
            $livestream = Livestream::all();
            $users = User::where('user_type', 'STUDENT')->whereHas('member', function ($query) use ($user) {
                $query->where('centre', $user->supervisor_location);
            })->get();
        } else {
            $livestream = Livestream::all();
            $members = Member::all();
            $users = User::where('user_type', 'STUDENT')->get();
        }
        return view('admin.attendance', compact('livestream', 'members', 'users'));
    }

    public function attendanceresult()
    {
        return view('admin.attendanceresult');
    }

    public function mark()
    {
        return view('admin.mark');
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
