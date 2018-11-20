<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Update;
use Auth;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        return view('mojView.update', compact('user'));
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
     * @param  \App\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function show(Update $update)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function edit(Update $update)
    {
        $user = Auth::user();
        return view('mojView.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Update $update)
    {
        $user = User::find(1);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->last_name = $request->input('last_name');
        $user->phone = $request->input('phone');
        $user->save();
        return redirect('/dashboard')->with('success', 'User updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function destroy(Update $update)
    {
        //
    }
}
