<?php

namespace App\Http\Controllers\backend\payment;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\StudentFeeCategory;
use App\Models\StudentPayment;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function StudentPaymentView(){

    }
    public function StudentCartAdd(){
        $data['users'] = User::all();
        $data['classes'] = StudentClass::all();
        $data['feeCategories'] = StudentFeeCategory::all();

        return view('admin.backend.payment.cart_add',$data);
    }
    public function StudentCartStore(Request $request)
    {

        // Handle the form data and save to the database if needed
        $data = new StudentPayment();
        $data->user_name = $request->user_name;
        $data->class_name = $request->class_name;
        $data->cat_name = $request->cat_name;
        $data->user_id = $request->user_id;
        $data->date = $request->date;
        $data->amount = $request->amount;
        $data->remark = $request->remark;
        $data->save();

        $notification = array(
            'message' => 'Add Cart Successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('student.payment.add')->with($notification);
    }
    public function StudentInformation(){

    }
    public function StudentHomeWork(){

    }

}
