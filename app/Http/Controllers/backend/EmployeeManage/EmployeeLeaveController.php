<?php

namespace App\Http\Controllers\backend\EmployeeManage;

use App\Http\Controllers\Controller;
use App\Models\EmployeeLeave;
use Illuminate\Http\Request;

class EmployeeLeaveController extends Controller
{
    public function EmployeeLeaveView(){

        $data[''] = EmployeeLeave::all();
        return view('admin.backend.employee.employee_leave.employee_leave_view');
    }
}
