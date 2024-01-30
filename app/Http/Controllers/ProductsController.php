<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StudentClass;
use App\Models\StudentFeeCategory;
use App\Models\StudentFeeCategoryAmount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Check if the user is logged in and has a student_id
//        if ($user && $user->student_id) {
//            // Fetch data based on the student_id
//            $data['User'] = User::where('id', $user->id)->get();
//            $data['studentClass'] = StudentClass::where('student_id', $user->student_id)->get();
//            $data['FeeCategory'] = StudentFeeCategory::where('student_id', $user->student_id)->get();
//            $data['FeeCategoryAmount'] = StudentFeeCategoryAmount::where('student_id', $user->student_id)->get();
//        } else {
//            // If user is not logged in or does not have a student_id, show all data
//            $data['User'] = User::all();
//            $data['studentClass'] = StudentClass::all();
//            $data['FeeCategory'] = StudentFeeCategory::all();
//            $data['FeeCategoryAmount'] = StudentFeeCategoryAmount::all();
//        }
        $products = Product::all();

        return view('admin.backend.payment.products',compact('products'));
    }

    public function cart()
    {
        return view('admin.backend.payment.cart');
    }
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "product_name" => $product->product_name,
                "photo" => $product->photo,
                "price" => $product->price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }
}
