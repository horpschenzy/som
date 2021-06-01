<?php

namespace App\Http\Controllers;

use App\User;
use App\member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $member = Member::where('email',$user->email)->first();
        return view('frontend.payment', compact('user','member'));

    }

    public function globalpayment()
    {

        return view('frontend.paymentusd');

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

    public function invoice()
    {

        return view('frontend.invoice');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request, [

            'surname' => 'required',
            'firstname' => 'required',
            'phonenumber' => 'required',
            'email' => 'required|unique:members,email',
            'centre' => 'required',
            'payment' => 'required',
            'paymenttype' => 'required',
            'password',

        ]);


        $data = new member;
        $data->surname = $request->input('surname');
        $data->firstname = $request->input('firstname');
        $data->email = $request->input('email');
        $data->phonenumber = $request->input('phonenumber');
        $data->password = $request->input('password');
        $data->centre = $request->input('centre');
        $data->payment = $request->input('payment');
        $data->paymenttype = $request->input('paymenttype');
        if ($request->has('other_location')) {
            $data->other_location = $request->input('other_location');
        }


        $data->save();

        $user = new User;
        $user->name = $request->surname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $this->generateRegistrationNumber($user);

        $this->logUserIn(['email' => $user->email, 'password' => $request->password]);

        return redirect('/payment')->with('success', 'kindly complete your registration by making payment');
    }

    private function generateRegistrationNumber(User $user)
    {
        $user_id = $user->id;
        if ($user_id < 10) {
            $member_id = "00" . $user_id;
        } elseif ($user_id > 9 && $user_id < 100) {
            $member_id = "0" . $user_id;
        }
        else{
            $member_id = $user_id;
        }
        $user->reg_no = "SOM/2021/".$member_id;
        $user->save();
    }

    private function logUserIn($credentials){
        $auth = Auth::attempt($credentials);
    }


    public function globalstore(Request $request)
    {
        $this->validate($request, [

            'surname' => 'required',
            'firstname' => 'required',
            'phonenumber' => 'required',
            'email' => 'required|unique:members,email',
            'centre' => 'required',
            'payment' => 'required',
            'paymenttype' => 'required',
            'password',


        ]);


        $data = new member;
        $data->surname = $request->input('surname');
        $data->firstname = $request->input('firstname');
        $data->email = $request->input('email');
        $data->password = $request->input('password');
        $data->phonenumber = $request->input('phonenumber');
        $data->centre = $request->input('centre');
        $data->payment = $request->input('payment');
        $data->paymenttype = $request->input('paymenttype');
        $data->save();

        $user = new User;
        $user->name = $request->surname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $this->generateRegistrationNumber($user);

        return redirect('/globalpayment')->with('success', 'kindly complete your registration by making payment');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
