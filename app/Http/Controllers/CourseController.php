<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Term;
use DB;
use Auth;
use Symfony\Component\HttpFoundation\Session\Session;

class CourseController extends Controller
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

    public function Show_TermAddForm()
    {
        return view('term_add');
    }
    //------------- เพิ่มคอร์สเรียน และ วิขา --------------------
    public function TermAdd(Request $request, Term $term)
    {
        //dd($request);
        $this->validate($request, [
            'term_id' => ['required','checkbackslash'],
            'user_id' => 'required|max:255|nullable',
            'detail' => 'required|max:255|nullable',
            'province' => 'required|max:255|nullable',
            'subject' => 'required|max:255|nullable',
            'price' => 'required|max:255|nullable',
        ]);
        $term = new Term();
        //dd(request('term_id'));
        $term->term_id = request('term_id').Auth::user()->province;
        $term->user_id = request('user_id');
        $term->detail = request('detail');
        $term->province = request('province');
        $term->subject = request('subject');
        $term->price = request('price');
        //dd($term->subject, $term->price);
        $results = DB::table('terms')
            ->select('term_id')
            ->where('term_id', $term->term_id)
            ->where('user_id', $term->user_id)
            ->distinct()
            ->get();

        //--------------- เช็คว่ามีการสร้างคอร์สเรียนซ้ำกันหรือไม่---------------------------
         //----------------- กรณีไม่ซ้ำ -----------------
        if (count($results) < 1) {
            //------- นำข้อมูลไปใส่ที่ DB-terms-------------
            $data = DB::table('terms')
                ->insert([
                    ['term_id' => $term->term_id, 'user_id' => $term->user_id, 'detail' => $term->detail, 'province' => $term->province, 'created_at' => $term->created_at]
                ]);
            if ($data == true) {
                $result = $this->Subjects_Add($term);
                if ($result == true) {
                    Session()->flash('success', 'ทำการเพิ่มคอร์สการเรียนสำเร็จแล้ว');
                    return back();
                } else {
                    Session()->flash('message', 'คอร์สนี้มีอยู่แล้ว !!!');
                    return back();
                }

            }
        } else {
            Session()->flash('message', 'คอร์สนี้มีอยู่แล้ว !!!');
            return back();
        }

        //dd($results);
    }
    //------- นำข้อมูลไปใส่ที่ DB-subjects-------------
    private function Subjects_Add($term)
    {
        $count = count($term->subject);
        $chk = 0;
        for ($i = 0; $i < $count; $i++) {
            $data = DB::table('subjects')
                ->insert([
                    ['term_id' => $term->term_id, 'detail' => $term->subject[$i], 'price' => $term->price[$i]]
                ]);
            if ($data == true) {
                $chk++;
            } else {
                break;
            }
        }
        //----- ตรวจสอบจำนวนแถว
        if ($count == $chk) {
            return true;
        } else {
            return false;
        }

    }
    //----------- แสดงเทอมที่ต้องการลบ ------------------
    public function Show_TermDelForm()
    {
        $id = Auth::user()->id;
        $term = $this->get_term_id($id);
        return view('term_dal', ['term' => $term]);
    }

    private function get_term_id($id)
    {
        $data = DB::table('terms')
            ->select('term_id', 'detail')
            ->where('user_id', $id)->get();
        //dd($data);
        return $data;
    }

    public function destroy_Term($id)
    {
        //dd($id);
        DB::table('terms')
            ->where('term_id',$id)
            ->delete();
        return back()->with('status','ลบรายชื่อเทอมเรียบร้อยแล้ว !!!');
    }


}
