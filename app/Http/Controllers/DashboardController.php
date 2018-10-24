<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard',compact('users'));
    }
    public function assignRole(Request $request)
    {
        $user = User::where('email',$request['email'])->first();
        $user->roles()->detach();
        if($request['role_user']){
            $user->roles()->attach(Role::where('name','User')->first());
        }
        if($request['role_admin']){
            $user->roles()->attach(Role::where('name','Admin')->first());
        }
        return redirect('/dashboard');
    }
    public function storeUser()
	{
		$this->validate(request(), [

			'name' => 'required',
            'email' => 'required',
            'password' => 'required',

		]);

		auth()->user()->publish(
    		new Post(request(['title','body','password']))
    	);

    	session()->flash('message', 'Your user has been added.');

		return redirect('/dashboard');
	}
}
