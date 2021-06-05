<?php

namespace App\Http\Controllers;

use App\Livestream;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
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
        return view('admin.transaction');
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
