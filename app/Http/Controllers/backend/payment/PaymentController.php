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
    public function StudentPaymentAdd(){
        $data['users'] = User::all();
        $data['classes'] = StudentClass::all();
        $data['feeCategories'] = StudentFeeCategory::all();

        return view('admin.backend.payment.payment_add',$data);
    }
    public function StudentPaymentStore(Request $request)
    {
        // Validate the form data
        $request->validate([
            // ... your existing validation rules ...
            'payment_method' => 'required|in:credit_card,paypal', // Add more options as needed
        ]);

        // Handle the form data and save to the database if needed
        $data = new StudentPayment();
        $data->user_name = $request->user_name;
        $data->class_name = $request->class_name;
        $data->cat_name = $request->cat_name;
        $data->user_id = $request->user_id;
        $data->date = $request->date;
        $data->amount = $request->amount;
        $data->remark = $request->remark;

        // Check the selected payment method
        $paymentMethod = $request->input('payment_method');

        // Redirect to the corresponding payment page
        if ($paymentMethod === 'credit_card') {
            return redirect()->route('credit_card_payment_page');
        } elseif ($paymentMethod === 'paypal') {
            return redirect()->route('paypal_payment_page');
        }

        // Save the data to the database
        $data->save();
    }
    public function showCreditCardPaymentPage()
    {
        // Your logic to display the credit card payment page goes here
        return view('admin.backend.payment.credit_card_payment_page'); // Assuming you have a view file named credit_card_payment_page.blade.php
    }
    public function StudentInformation(){

    }
    public function StudentHomeWork(){

    }

}
