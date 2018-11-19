<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
use App\User;
use Auth;

class AdminIndexController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $email = Session::get('email');
        $data_user = $this->get_data_user($email);
        Session()->put('data_user', $data_user);
        //-------เลือก term ของไอดีที่ login อยู่

        return view('admin.user.user');
    }

    private function get_data_user($email)
    {
        $data_user = DB::table('users')
            ->select('id', 'email', 'province')
            ->where('email', $email)->get();
        return $data_user;
    }

}
