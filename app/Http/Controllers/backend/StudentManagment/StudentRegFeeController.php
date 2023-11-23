<?php

namespace App\Http\Controllers\backend\StudentManagment;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentFeeCategoryAmount;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentRegFeeController extends Controller
{
    public function StudentRegFeeView(){
        $data['studentClass'] = StudentClass::all();
        $data['studentYear'] = StudentYear::all();
        return view('admin.backend.student.student_reg_fee.registration_fee_view',$data);
    }

    public function RegFeeClassWiseGet(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;

        if ($year_id != ''){
            $where[] = ['year_id','like',$year_id.'%'];
        }
        if ($class_id != ''){
            $where[] = ['class_id','like',$class_id.'%'];
        }
        $allStudent = AssignStudent::with(['discount'])->where($where)->get();
//        dd($allStudent->toArray());
        $html['thsource'] = '<th>SL NO</th>>';
        $html['thsource'] .= '<th>ID NO</th>>';
        $html['thsource'] .= '<th>Student Name</th>>';
        $html['thsource'] .= '<th>Roll No</th>>';
        $html['thsource'] .= '<th>Reg Fee</th>>';
        $html['thsource'] .= '<th>Discount</th>>';
        $html['thsource'] .= '<th>Student Fee</th>>';
        $html['thsource'] .= '<th>Action</th>>';

        foreach ($allStudent as $key => $v){
            $registrationFee = StudentFeeCategoryAmount::where('fee_category_id','1')->where('class_id',$v->class_id)->first();
//            dd($registrationFee->toArray());
            $color = 'success';
            $html[$key]['tdsource'] = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registrationFee->fee_category_amount.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';

            $originalFee = (float)$registrationFee->fee_category_amount;
            $discount = (float)$v['discount']['discount'];
            $discountableFee = $discount/100*$originalFee;
            $finalFee = $originalFee-$discountableFee;

            $html[$key]['tdsource'] .= '<td>'.$finalFee.'Tk'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blank" href="'.route("student.registration.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'">Fee Slip</a>';
            $html[$key]['tdsource'] .='</td>';
        }
        return response()->json(@$html);
    }

    public function RegFeePaySlip(){

    }
}
