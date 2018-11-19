<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;





class IndexController extends Controller
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

    public function index()
    {
        $email = Session::get('email');
        $data_user = $this->get_data_user($email);
        Session()->put('data_user', $data_user);
        //-------เลือก term ของไอดีที่ login อยู่
        $id = $data_user[0]->id;
        $term = $this->get_term_id($id);

        return view('index', ['term' => $term]);
    }

    private function get_data_user($email)
    {
        $data_user = DB::table('users')
            ->select('id', 'email', 'province')
            ->where('email', $email)->get();
        return $data_user;
    }

    private function get_term_id($id)
    {
        $data = DB::table('terms')
            ->select('term_id', 'detail')
            ->where('user_id', $id)->get();
        //dd($data);
        return $data;
    }
}
