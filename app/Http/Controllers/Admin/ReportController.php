<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\User;
use Session;

class ReportController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function ShowReportForm()
    {
        //-------เลือก province ของไอดีที่มีอยู่
        $province = $this->get_province(); 
       //dd($province);
        return view('admin.reports.ShowReportForm',['province' => $province]);
    }
    private function get_province()
    {
        $data = DB::table('users')
            ->select('province')
            ->where('province','<>', 'ceo')->get();
        //dd($data);
        return $data;
    }
}
