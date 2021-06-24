<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Elective;

class ElectiveController extends Controller
{
    public function create()
    {
        return view('admin.elective');
    }

    public function show()
    {
        $restricted = Elective::where('type', 'RESTRICTED')->get();
        $specials = Elective::where('type', 'SPECIAL')->get();
        return view('members.elective', compact('restricted','specials'));
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

        dd($request);

        $this->validate($request,[
            'name' => 'required',
            'type' => 'required',
            'reg_no' => 'required',
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
}
