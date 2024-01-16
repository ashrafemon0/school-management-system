<?php

namespace App\Http\Controllers\backend\Marks;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\StudentExamModel;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class MarksController extends Controller
{
    public function StudentMarksAdd(){

        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = StudentExamModel::all();


        return view('admin.backend.Marks.marks_add',$data);
    }
}
