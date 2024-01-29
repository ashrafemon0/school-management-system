<?php

namespace App\Http\Controllers\backend\payment;

use App\Http\Controllers\Controller;
use App\Models\order;
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
        $data = new order();
        $data->name = $request->user_name;
        $data->class_name = $request->class_name;
        $data->fee_category = $request->fee_category;
        $data->student_id = $request->student_id;
        $data->date = $request->date;
        $data->amount = $request->amount;
        $data->remarks = $request->remark;
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
