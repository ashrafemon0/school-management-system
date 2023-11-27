<?php

namespace App\Http\Controllers\backend\StudentManagment;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentFeeCategoryAmount;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use PDF;

class StudentTuitionFeeController extends Controller
{
    public function StudentTuitionFeeView(){
        $data['studentClass'] = StudentClass::all();
        $data['studentYear'] = StudentYear::all();
        return view('admin.backend.student.student_tuition_fee.tuition_fee_view',$data);
    }

    public function TuitionFeeClassWiseGet(Request $request){
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
        $html['thsource'] = '<th>SL NO</th>';
        $html['thsource'] .= '<th>ID NO</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Roll No</th>';
        $html['thsource'] .= '<th>Tuition Fee</th>';
//        $html['thsource'] .= '<th>Discount</th>';
        $html['thsource'] .= '<th>Student Fee</th>';
        $html['thsource'] .= '<th>Action</th>';

        foreach ($allStudent as $key => $v){
            $registrationFee = StudentFeeCategoryAmount::where('fee_category_id','2')->where('class_id',$v->class_id)->first();
//            dd($registrationFee->toArray());
            $color = 'success';
            $html[$key]['tdsource'] = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registrationFee->fee_category_amount.'</td>';
//            $html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';

            $originalFee = (float)$registrationFee->fee_category_amount;

//            $discount = (float)$v['discount']['discount'];
//            $discountableFee = $discount/100*$originalFee;
//            $finalFee = $originalFee-$discountableFee;

            $html[$key]['tdsource'] .= '<td>'.$originalFee.'Tk'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blank" href="'.route("student.tuition.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'&month='.$request->month.'">Fee Slip</a>';
            $html[$key]['tdsource'] .='</td>';
        }
        return response()->json(@$html);
    }

    public function TuitionFeePaySlip(Request $request){
        $class_id = $request->class_id;
        $student_id = $request->student_id;
        $allStudent['month'] = $request->month;

        $allStudent['details'] = AssignStudent::with(['student'])->where('class_id',$class_id)->where('student_id',$student_id)->first();
//        dd($allStudent['details']->toArray());

        $pdf = PDF::loadView('admin.backend.student.student_tuition_fee.tuitionFeePdf', $allStudent);
        return $pdf->stream('document.pdf');
    }
}
