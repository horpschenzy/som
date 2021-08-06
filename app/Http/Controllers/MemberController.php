<?php

namespace App\Http\Controllers;

use App\User;
use App\Member;
use App\Livestream;
use App\Payment;
use App\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Exam;

class MemberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regno = Auth::user()->reg_no;
        $result = Exam::where('reg_no', $regno)->first();

        return view('members.index', compact('results'));
    }



    public function classroom()
    {
        $livestream = Livestream::where('status', 'started')->first();
        return view('members.classroom', compact('livestream'));
    }

    public function showClassroom($id, $type)
    {
        $livestream = Livestream::where('status', 'started')->first();
        return view('members.indexclassroom', compact('livestream','type'));
    }


    public function test()
    {
        $assignments = Assignment::with(['submissions' => function($q)
        {
            $q->where('member_id',Auth::id());
        }])->get();
        return view('members.test', compact('assignments'));
    }

    public function result()
    {
        $assignments = Assignment::with(['submissions' => function($q)
        {
            $q->where('member_id',Auth::id());
        }])->get();
        return view('members.result', compact('assignments'));

    }



    public function profile()
    {
        $user = Auth::user();
        return view('members.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|max:255',
            'surname' => 'required|max:255',
            'othername' => 'required|max:255',
            'phonenumber' => 'required|max:255',
            'address' => 'required|max:255',
            'marital_status' => 'required',
            'gender' => 'required',
            'is_born_again' => 'required',
            'born_again_time' => 'required|date',
            'is_spirit_filled' => 'required',
            'current_church' => 'required|max:255',
            'reason' => 'required|max:255',
            'expectation' => 'required',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024'
        ], [
            "is_born_again.required" => "The born again status field is required",
            "is_spirit_filled.required" => "The spirit filled status field is required"

        ]);

        if ($request->hasFile('profile_picture')) {
            $filenameWithExt = $request->file('profile_picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profile_picture')->getClientOriginalExtension();
            $fileNameToStore = time() . '.' . $extension;
            $path = $request->file('profile_picture')->storeAs('public/image', $fileNameToStore);
        } else {
            $fileNameToStore = "";
        }

        $member = Member::where('user_id', Auth::user()->id)->update([
            'firstname' => $request->firstname,
            'surname' => $request->surname,
            'othername' => $request->othername,
            'phonenumber' => $request->phonenumber,
            'address' => $request->address,
            'marital_status' => $request->marital_status,
            'gender' => $request->gender,
            'is_born_again' => $request->is_born_again == "yes" ? true : false,
            'born_again_time' => $request->born_again_time,
            'is_spirit_filled' => $request->is_spirit_filled == "yes" ? true : false,
            'current_church' => $request->current_church,
            'reason' => $request->reason,
            'expectation' => $request->expectation,
            'profile_picture' => $fileNameToStore
        ]);
        return redirect()->back()->with('success', "Profile updated successfully");
    }

    public function changePasswordView()
    {
        return view('members.change-password');
    }

    public function changePassword(Request $request)
    {
        $validated = $request->validate(
            [
                'old_password' => 'required|min:6',
                'new_password' => 'required|min:6',
                'new_password_confirmation' => 'required|min:6|same:new_password'
            ],
            [
                'new_password_confirmation.same' => 'Passwords do not match'
            ]
        );

        $user = Auth::user();

        if(Hash::check($request->old_password, $user->password)){
            User::where('id', $user->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
            return redirect()->back()->with('success', "Password changed successfully")->withInput();
        }
        else{
            return redirect()->back()->withErrors(['Incorrect password'])->withInput();
        }
    }

    public function transaction()
    {

        $user = Auth::user();
        $data = Payment::where('customeremail', $user->email)->first();
        return view('members.transaction', compact('data'));
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
        dd($request);
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
