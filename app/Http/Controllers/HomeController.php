<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;

class HomeController extends Controller
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
        return view('home');
    }

    public function userProfile()
    {
        return view('admin.user.profile');
    }

    public function userChangePassword()
    {
        return view('admin.user.setting');
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'min:6|required',
            'confirm_password' => 'required_with:new_password|same:new_password|min:6',
        ]);

        $uid = Auth::user()->id;
        $user = User::where('id', $uid)->first();
        if($request->new_password == $request->confirm_password)
        {
            if (Hash::check($request->current_password, $user->password)) {
                User::where('id', $uid)->update([
                    'password' => Hash::make($request->new_password),
                ]);

                return redirect('/settings')->with('add', 'PassWord Updated');
            }else{
                return redirect('/settings')->with('ups', 'Wrong Current Password');
            }
        }else{
            return redirect('/settings')->with('ups', 'PassWord Confirmation Failed');
        }

    }
}
