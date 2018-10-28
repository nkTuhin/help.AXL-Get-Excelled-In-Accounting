<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    |Admin Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function __construct() {

        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function viewAdminLoginForm() {

        return view('auth.adminlogin');

    }

    public function login(Request $request) {
        
        // validation
        $this->validate($request, [

            'email' => 'required|email',
            'password' => 'required|min:6'

        ]);

        //login admin 
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));

    }

    public function logout() {

        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
