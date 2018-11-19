<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Register;
use DateTime;
use Session;

class RegisterController extends Controller
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

    public function ShowRegisForm(Request $request)
    {
        //dd($request);
        $term = $request->course;
        $detail = $this->get_term_detail($term);
        $subject = $this->get_subjects($term);
        //dd($detail, $term, $subject);
        if ($subject != null) {
            return view('register', ['subject' => $subject, 'term' => $term, 'term_detail' => $detail]);
        } else {
            $request->session()->flash('message', 'ไม่มีข้อมูล');
            return back();
        }

    }

    public function register(Request $request)
    {
        //dd($request);
        $course_1 = $request->course_1;
        $course_2 = $request->course_2;
        $course_3 = $request->course_3;
        //--------explode price and id ------------
        if ($course_1 != 0) {
            $spilt = explode(",", $course_1);
            $course_1 = $spilt[1];
        }
        if ($course_2 != 0) {
            $spilt = explode(",", $course_2);
            $course_2 = $spilt[1];
        }
        if ($course_3 != 0) {
            $spilt = explode(",", $course_3);
            $course_3 = $spilt[1];
        }
        $result = $this->add_register($request, $course_1, $course_2, $course_3);
        if ($result == true) {
            Session()->flash('success', 'ลงทะเบียนนักเรียนสำเร็จ !!!!');
            return redirect('index');
        } else {
            Session()->flash('fails', 'กรุณาตรวจสอบข้อมูลให้เรียบร้อย !!!');
            return back();
        }
    }

    //--------- ดึงค่า subject ของเทอม -----------
    private function get_subjects($term)
    {
        $data = DB::table('subjects')
            ->select('id', 'detail', 'price')
            ->where('term_id', $term)
            ->distinct()
            ->get();
        return $data;
    }
    //--------- ดึงค่า detail ของเทอม -----------
    private function get_term_detail($term)
    {
        $data = DB::table('terms')
            ->select('detail')
            ->where('term_id', $term)
            ->distinct()
            ->get();
        return $data;
    }
    //---------- add data to register DB -------------------
    private function add_register($request, $course_1, $course_2, $course_3)
    {
        //dd($request, $course_1, $course_2, $course_3);
        $data = DB::table('register')
            ->insert([
                [
                    'FirstName_Std' => $request->FirstName_Std,
                    'LastName_Std' => $request->LastName_Std,
                    'NickName_Std' => $request->NickName_Std,
                    'Gender_Std' => $request->Gender_Std,
                    'Age_Std' => $request->Age_Std,
                    'Birth_Std' => $request->Birth_Std,
                    'School_Std' => $request->School_Std,
                    'Class_Std' => $request->Class_Std,
                    'Major_Std' => $request->Major_Std,
                    'Email_Std' => $request->Email_Std,
                    'Tel_Std' => $request->Tel_Std,
                    'Line_Std' => $request->Line_Std,
                    'Address_Std' => $request->Address_Std,
                    'FirstName_Par' => $request->FirstName_Par,
                    'LastName_Par' => $request->LastName_Par,
                    'Email_Par' => $request->Email_Par,
                    'Tel_Par' => $request->Tel_Par,
                    'Line_Par' => $request->Line_Par,
                    'course_1' => $course_1,
                    'price1' => $request->price1,
                    'course_2' => $course_2,
                    'price2' => $request->price2,
                    'course_3' => $course_3,
                    'price3' => $request->price3,
                    'std' => $request->std,
                    'c_1' => $request->c_1,
                    'c_2' => $request->c_2,
                    'c_3' => $request->c_3,
                    'ThaiMoney' => $request->ThaiMoney,
                    'Pay' => $request->Pay,
                    'ID_Card' => $request->ID_Card,
                    'ID_Slip' => $request->ID_Slip,
                    'Credit_Bank' => $request->Credit_Bank,
                    'Amount' => $request->Amount,
                    'Bank' => $request->Bank,
                    'Note' => $request->Note,
                    'Status' => $request->Status,
                    'Term_ID' => $request->Term_ID,
                    'User_id' => $request->User_id,
                    'province' => $request->province,
                    'created_at' => new DateTime()

                ]
            ]);
        return $data;
    }
}
