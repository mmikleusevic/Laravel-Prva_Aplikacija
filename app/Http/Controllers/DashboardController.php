<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Role;
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
        foreach($users as $user){

        }
        return view('dashboard',compact('users'));
    }
    public function assignRole(Request $request)
    {
            $user_id=$request->input('user_id');
            $role_id=$request->input('role_id');
                $user = User::find($user_id);
                $role = Role::find($role_id);
                $user->roles()->detach();                    
                $user->roles()->attach($role);
                return redirect('/dashboard');
    }
    public function storeUser(Request $request)
	{
        User::create($request->all());
		return redirect('/dashboard');
	}
}
