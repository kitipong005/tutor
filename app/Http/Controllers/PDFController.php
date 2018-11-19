<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use PDF;
use App\Register;
use DB;
use DateTime;
use Carbon\Carbon;

class PDFController extends Controller
{
    //-------------- bill student-----------------
    public function generate_pdf(Request $req)
    {
        $c_table = 5;
        $id = $req->id;
        $result = $this->get_data_std($id);
        //dd($result);
        //-----------sum price ---------------------
        $price = ($result[0]->price1) + ($result[0]->price2) + ($result[0]->price3);

        //-----------get date now-------------
        $dates = Carbon::now()->toDateString();

        //$dates = $dates . substr(1, 10);
        //dd($tomorrow);
        //---- data for bill------------------
        $data = [
            'fname' => $result[0]->FirstName_Std,
            'lname' => $result[0]->LastName_Std,
            'sum' => $price,
            'std' => $result[0]->std,
            'allsum' => $result[0]->c_3,
            'thai' => $result[0]->ThaiMoney,
            'pay' => $result[0]->Pay,
            'id_card' => $result[0]->ID_Card,
            'id_slip' => $result[0]->ID_Slip,
            'credit_bank' => $result[0]->Credit_Bank,
            'amount' => $result[0]->Amount,
            'bank' => $result[0]->Bank,
            'dates' => $dates
        ];
        $course = [
            'course_n' => [
                $result[0]->course_1, $result[0]->course_2, $result[0]->course_3
            ],
            'course_d' => [
                $result[0]->detail_1, $result[0]->detail_2, $result[0]->detail_3
            ],
            'course_p' => [
                $result[0]->price1, $result[0]->price2, $result[0]->price3
            ],

        ];
        //dd($course);
        $pdf = PDF::loadView('pdf', $data, $course);
        return @$pdf->stream();
    }

    private function get_data_std($id)
    {
        $data = DB::select('SELECT rs.FirstName_Std,rs.LastName_Std,rs.id,rs.course_1, sj.detail as detail_1, rs.price1, rs.course_2, sj2.detail as detail_2, rs.price2,  rs.course_3, sj3.detail as detail_3, rs.price3 
                    ,rs.std, rs.c_3,rs.ThaiMoney, rs.Pay, rs.ID_Card, rs.ID_Slip, rs.Credit_Bank, rs.Amount, rs.Bank   
                    from register rs LEFT JOIN subjects sj on rs.course_1 = sj.id LEFT JOIN subjects sj2 on rs.course_2 = sj2.id LEFT JOIN subjects sj3 on rs.course_3 = sj3.id
                    where rs.id = ?', [$id]);
        return $data;
    }


}
