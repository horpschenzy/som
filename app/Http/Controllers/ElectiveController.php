<?php

namespace App\Http\Controllers;

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
        return view('admin.studentelective');

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
        return view('members.elective', compact('restricted','specials', 'studentrestricted', 'specialids'));
    }

    public function store(Request $request)
    {

        $this->validate($request,[
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

    public function memberstore(Request $request) {

        // dd($request->all());


        $validate  = Validator::make($request->all(), [
            'restricted' => 'required',
            'special1' => 'required',
            'special2' => 'required',
        ], [
            'special1.required' => 'Kindly select at least one special elective from the first group.',
            'special2.required' => 'Kindly select at least one special elective from the first group.',
        ]);
        if($validate->fails()){
            $notification = array(
                'message' => $validate->messages()->first(),
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        // $specials = $request->specials;
        $member = Member::where('user_id', Auth::id())->first();
        $check_if_registered = StudentSubject::where('user_id', Auth::id())->where('type', 'RESTRICTED')->first();
        if ($check_if_registered) {
            StudentSubject::where('user_id', Auth::id())->where('type', 'RESTRICTED')
                                         ->update(['elective_id'=>$request->input('restricted')]);
            $check_if_registered_special = StudentSubject::where('user_id', Auth::id())->where('type', 'SPECIAL')->first();

            if ($check_if_registered_special) {
                StudentSubject::where('user_id', Auth::id())->where('type', 'SPECIAL')->delete();
            }
        }
        else{
            $elective = new StudentSubject;
            $elective->member_id = $member->id;
            $elective->user_id = Auth::id();
            $elective->elective_id = $request->input('restricted');
            $elective->type = 'RESTRICTED';
            $elective->save();
        }

        // if ($specials) {
            // foreach ($specials as $special) {
                $elective = new StudentSubject;
                $elective->member_id = $member->id;
                $elective->user_id = Auth::id();
                $elective->elective_id = $request->special1;
                $elective->type = 'SPECIAL';
                $elective->save();

                $elective = new StudentSubject;
                $elective->member_id = $member->id;
                $elective->user_id = Auth::id();
                $elective->elective_id = $request->special2;
                $elective->type = 'SPECIAL';
                $elective->save();
            // }
        // }

        $notification = array(
            'message' => 'Course Added Successfully!',
            'alert-type' => 'success'
        );

        return back()->with($notification);




    }
}
