<?php

namespace App\Http\Controllers\backend\EmployeeManage;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeRegController extends Controller
{
    public function EmployeeRegView(){

        $data['allData'] = User::where('usertype','employee')->get();

        return view('admin.backend.employee.employee_reg.employee_reg_view',$data);
    }

    public function EmployeeAdd(){

        $data['designation'] = Designation::all();
        return view('admin.backend.employee.employee_reg.employee_reg_add',$data);
    }

    public function EmployeeStore(){

    }
}
