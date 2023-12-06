<?php

namespace App\Http\Controllers\backend\EmployeeManage;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;

class EmployeeAttendanceController extends Controller
{
    public function EmployeeAttendanceView(){
        $data['allData'] = EmployeeAttendance::orderBy('id','desc')->get();

        return view('admin.backend.employee.employee_attendance.employee_attendance_view',$data);
    }

    public function EmployeeAttendanceAdd(){

        return view('admin.backend.employee.employee_attendance.employee_attendance_add');
    }
}
