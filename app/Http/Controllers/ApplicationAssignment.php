<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\ApplicationAssignment;

class ApplicationAssignment extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }
    public function viewSubmissions($id)
    {
        $applicants = ApplicationAssignment::with(['applications'=> function($q){
            $q->with('user')->where('add_to_count', 1)->whereHas('circle', function($x){
                $x->where('head_id', auth()->id());
            });
        }])->where('assignment_id', $id)->get();

        return view('admin.applicantsassignment',compact('applicants'));
    }
    public function markAssignment(Request $request, $id)
    {
        $getAssignment = ApplicationAssignment::find($id);
        $getAssignment->score = $request->score;
        if($getAssignment->save()){

            $notification = array(
                'message' => 'Score Assigned Successfully!',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        $notification = array(
            'message' => 'Score Can\'t be  Assigned at this time, Please try again later.',
            'alert-type' => 'error'
        );
        return back()->with($notification);
    }

    public function index()
    {
        //
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
