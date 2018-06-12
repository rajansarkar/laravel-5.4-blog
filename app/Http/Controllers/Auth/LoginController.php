<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticate(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)){
            return redirect('/home');
        }else{
            //Session::put();
            Session::flash('loginErrMsg', 'Invalid Credential! Please insert correct information.');
            return redirect('/login');
        }
    }

    public function logout(){
        $redirectToPath = '/login';
        // if(Auth::user()->role == '0')
        //     {
        //     $redirectToPath = "/-superadmin";
        // }

        // if(Auth::user()->role == '5'){
        //     $redirectToPath = "/set-client-appointment";
        // }
        Auth::logout();
        return redirect($redirectToPath);
    }
}
