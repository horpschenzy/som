<?php

namespace App\Http\Controllers;

use App\User;
use App\member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.index');
    }

    public function courses()
    {
        return view('frontend.course');
    }

    public function about()
    {
        return view('frontend.about-us');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function login()
    {
        return view('frontend.login-register');
    }

    public function register()
    {
        return view('frontend.register-login');
    }

    public function payment()
    {

        return view('frontend.payment');

    }

    public function global()
    {
        return view('frontend.global-register');
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


        $this->validate($request,[

            'surname' => 'required',
            'firstname' => 'required',
            'phonenumber' => 'required',
           'email' => 'required|unique:members,email',
            'centre' => 'required',
           'payment' => 'required',
           'paymenttype' => 'required',

            ]);


            $data = new member;
            $data->surname = $request->input('surname');
            $data->firstname = $request->input('firstname');
            $data->email = $request->input('email');
            $data->phonenumber = $request->input('phonenumber');
            $data->centre = $request->input('centre');
            $data->payment = $request->input('payment');
            $data->paymenttype = $request->input('paymenttype');
            $data->save();

            $user  = new User;
            $user->username = $request->surname;
            $user->email   = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect('/payment')->with('success', 'kindly complete your registration by making payment');
    }


    public function globalstore(Request $request)
    {
        dd($request);
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
