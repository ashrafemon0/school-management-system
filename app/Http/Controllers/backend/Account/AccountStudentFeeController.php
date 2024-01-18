<?php

namespace App\Http\Controllers\backend\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountStudentFee;
use App\Models\StudentClass;
use App\Models\StudentFeeCategory;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class AccountStudentFeeController extends Controller
{
    public function AccountStudentFeeView(){
        $data['allData'] = AccountStudentFee::all();

        return view('admin.backend.Account.student_fee.student_fee_view',$data);

    }
    public function AccountStudentFeeAdd(){

        $data['classes'] = StudentClass::all();
        $data['years'] = StudentYear::all();
        $data['feeCategories'] = StudentFeeCategory::all();

        return view('admin.backend.Account.student_fee.student_fee_add',$data);
    }
    public function AccountStudentFeeGetStudent(){

    }

    public function AccountStudentFeeStore(){

    }
}
