<?php

namespace App\Http\Controllers\backend\Grade;

use App\Http\Controllers\Controller;
use App\Models\StudentGrade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function StudentMarksGrade(){
        $data['allData'] = StudentGrade::all();

        return view('admin.backend.Marks.marks_grade_view',$data);
    }
}
