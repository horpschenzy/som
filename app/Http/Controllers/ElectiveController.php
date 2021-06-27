<?php

namespace App\Http\Controllers;

use App\User;
use App\Member;
use App\Elective;
use App\StudentSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ElectiveController extends Controller
{

    public function studentelective()
    {
        $student_electives = User::with('member')->whereHas('electives')->with('electives')->where('user_type', 'STUDENT')->get();
        // dd($student_electives);
        return view('admin.studentelective', compact('student_electives'));
    }
    public function create()
    {
        return view('admin.elective');
    }

    public function show()
    {
        $restricted = Elective::where('type', 'RESTRICTED')->get();
        $specials = Elective::where('type', 'SPECIAL')->get();
        $studentrestricted = StudentSubject::where('user_id', Auth::id())->where('type', 'RESTRICTED')->first();
        $studentspecials = StudentSubject::where('user_id', Auth::id())->where('type', 'SPECIAL')->get();

        $specialids = [];
        if ($studentspecials) {
            foreach ($studentspecials as $studentspecial) {
                $specialids[] = $studentspecial->elective_id;
            }
        }
        return view('members.elective', compact('restricted', 'specials', 'studentrestricted', 'specialids'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'description'
        ]);

        $elective = new Elective;
        $elective->name = $request->input('name');
        $elective->type = $request->input('type');
        $elective->description = $request->input('description');

        if ($elective->save())

            $notification = array(
                'message' => 'Assignment Added Successfully!',
                'alert-type' => 'success'
            );

        return view('admin.elective')->with($notification);
    }

    public function memberstore(Request $request)
    {
        $validate  = Validator::make($request->all(), [
            'restricted' => 'required',
        ]);
        if ($validate->fails()) {
            $notification = array(
                'message' => $validate->messages()->first(),
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        $specials = Elective::where('type', 'SPECIAL')->get();
        $submited_specials = [];
        foreach ($specials as $key => $elective) {
            if ($request->has('special-' . $elective->id)) {
                $submited_specials[] = $elective->id;
            }
        }

        if(count($submited_specials) !=2){
            $notification = array(
                'message' => 'You can only select 2 special electives',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }


        $member = Member::where('user_id', Auth::id())->first();
        $check_if_registered = StudentSubject::where('user_id', Auth::id())->where('type', 'RESTRICTED')->first();
        if ($check_if_registered) {
            StudentSubject::where('user_id', Auth::id())->where('type', 'RESTRICTED')
                ->update(['elective_id' => $request->input('restricted')]);
            $check_if_registered_special = StudentSubject::where('user_id', Auth::id())->where('type', 'SPECIAL')->first();

            if ($check_if_registered_special) {
                StudentSubject::where('user_id', Auth::id())->where('type', 'SPECIAL')->delete();
            }
        } else {
            $elective = new StudentSubject;
            $elective->member_id = $member->id;
            $elective->user_id = Auth::id();
            $elective->elective_id = $request->input('restricted');
            $elective->type = 'RESTRICTED';
            $elective->save();
        }


        foreach ($submited_specials as $special) {
            $elective = new StudentSubject;
            $elective->member_id = $member->id;
            $elective->user_id = Auth::id();
            $elective->elective_id = $special;
            $elective->type = 'SPECIAL';
            $elective->save();
        }


        $notification = array(
            'message' => 'Elective Added Successfully!',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
