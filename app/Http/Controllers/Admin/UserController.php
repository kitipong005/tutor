<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
use App\User;
use Auth;
use PDF;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //--------list user------------
    public function user()
    {
        $email = Session::get('email');
        $data_user = $this->get_data_user();
        //dd($data_user);
        return view('admin.user.user',['data'=>$data_user]);
    }
    //----------get data user-----------
    private function get_data_user()
    {
        $data_user = DB::table('users')
            ->where('province','<>','ceo' )->get();
        return $data_user;
    }
    //-------------add user------------------
    public function add_user()
    {
        return view('admin.user.adduser');
    }
    //--------------create user
    public function register(Request $request)
    {
        
        $this->validation($request);
        //dd($request);
        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'province' => $request->province
        ]);
        return back()->with('status','Success');
    }
    public function validation($request)
    {
        return $this->validate($request, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'province' => 'required|max:255',
        ]);
    }
}
