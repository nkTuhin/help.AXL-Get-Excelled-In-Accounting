<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserRequest;
use DB;
use Illuminate\Database\Eloquent\Model;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $userrequest = UserRequest::all()->toArray();
        $userrequest = UserRequest::orderBy('created_at', 'desc')->get();

        // return view('adminhome')->withUserRequest($userrequest);
        return view('adminhome',compact('userrequest'));
    }




    public function deleteUserRequest($id) {

        $userrequest = UserRequest::find($id);

        DB::table('user_requests')->where('id',$id)->delete();

        return redirect()->route('admin.dashboard');


    }
}
