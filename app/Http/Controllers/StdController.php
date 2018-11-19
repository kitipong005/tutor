<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Register;
use Psy\Util\Json;

class StdController extends Controller
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
    //---------------show รายชื่อนักเรียนที่ยังไม่ได้จ่ายเงิน--------------------
    public function ShowNameStdForm(Request $request)
    {
        //dd($request);
        $term = $request->course;
        if ($term != '0') {
            $detail = $this->get_term_detail($term);
            $subject = $this->get_subjects($term);
            return view('dataStd.NameStd', ['detail' => $detail, 'subject' => $subject]);
        } else {
            return back();
        }
    }

    //---------------show รายชื่อนักเรียนที่จ่ายเงิน--------------------
    public function ShowNameStdForm_Conf(Request $request)
    {
        //dd($request);
        $term = $request->course;
        if ($term != '0') {
            $detail = $this->get_term_detail($term);
            $subject = $this->get_subjects($term);
            return view('dataStd.NameStd_Conf', ['detail' => $detail, 'subject' => $subject]);
        } else {
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

    //---------- ดึงข้อมูลนักเรียนยังไม่ได้จ่ายเงินด้วย ajax--------------
    public function get_name_ajax(Request $req)
    {


        if ($req->ajax()) {
            $id = $req->get('subject_id');
            if (!empty($id)) {
                $data = DB::table('register')
                    ->where(function ($query) use ($id) {
                        $query->where('course_1', $id)
                            ->orwhere('course_2', $id)
                            ->orwhere('course_3', $id);
                    })
                    ->where('Status', 'no')
                    ->get();
            }
        }
        return json_encode($data);
    }

    //---------- ดึงข้อมูลนักเรียนที่จ่ายเงินด้วย ajax--------------
    public function get_name_ajax_conf(Request $req)
    {
        if ($req->ajax()) {
            $id = $req->get('subject_id');
            if (!empty($id)) {
                $data = DB::table('register')
                    ->where(function ($query) use ($id) {
                        $query->where('course_1', $id)
                            ->orwhere('course_2', $id)
                            ->orwhere('course_3', $id);
                    })
                    ->where('Status', 'yes')
                    ->orderBy('id', 'DESC')
                    ->get();
            }
        }
        return json_encode($data);
    }

    //-------- ยืนยันการชำระเงิน ------------------
    public function Payment_conf(Request $req)
    {
        $id = $req->id;
        $result = $this->Update_Payment($id);
        if ($result == true) {

            return back();
            Session()->flash('success', 'ยืนยันการจ่ายเงินเรียบร้อย !!!!');
        }


    }

    private function Update_Payment($id)
    {
        $result = DB::table('register')
            ->where('id', $id)
            ->where('Status', 'no')
            ->update(['Status' => 'yes']);
        return $result;
    }

    //-------------- แสดงข้อมูล นร ที่เลือก ---------------
    public function ShowEditNameStd(Request $request){
        $id = $request->id;
        $term = $request->term;
        $result = $this->get_data_std($id);
        if(!empty($result))
        {
            $detail = $this->get_term_detail($term);
            $subject = $this->get_subjects($term);
            //dd($subject);
            return view('dataStd.EditNameStd',['data'=>$result, 'term_detail' => $detail, 'subject' => $subject, 'term' => $term]);
        }
        else
        {
            return back()->with('status','No data Student !!!!!');
        }
    }
    //-------------- ดึงข้อมูลทั้งหมดของ นร ---------------
    private function get_data_std($id)
    {
        $result = DB::table('register')
            ->where('id',$id)
            ->get();
        return $result;
    }

    //------------- update name std ----------------
    public function update_data_std(Request $request)
    {
        //dd($request);
        DB::table('register')
            ->where('id',$request->id)
            ->update(['FirstName_Std' => $request->FirstName_Std,'LastName_Std' => $request->LastName_Std, 'NickName_Std' => $request->NickName_Std, 'Gender_Std' => $request->Gender_Std, 'Age_Std' => $request->Age_Std, 'Birth_Std' => $request->Birth_Std, 'School_Std' => $request->School_Std,
            'Class_Std' => $request->Class_Std, 'Major_Std' => $request->Major_Std, 'Email_Std' => $request->Email_Std, 'Tel_Std' => $request->Tel_Std, 'Line_Std' => $request->Line_Std, 'Address_Std' => $request->Address_Std, 'FirstName_Par' => $request->FirstName_Par, 'LastName_Par' => $request->LastName_Par,
            'Email_Par' => $request->Email_Par, 'Tel_Par' => $request->Tel_Par]);
        return redirect()->route('subj.name',['course'=>$request->Term_ID])->with('status','Edit Data Success');
    }

    //----------- Delete name std ------------------
    public function dalete_data_std(Request $request)
    {
        $id = $request->id;
        $result = DB::table('register')
            ->where('id',$id)
            ->where('Term_ID',$request->term)
            ->delete();
        if($result == true)
        {
            return redirect()->route('subj.name',['course'=>$request->term])->with('status','Delete Data Success');
        }
        else back();
    }
}
