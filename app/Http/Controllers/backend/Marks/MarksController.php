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

<<<<<<< HEAD
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = StudentExamModel::all();
=======
        $data['classes'] = StudentClass::all();
        $data['years'] = StudentYear::all();
        $data['exam'] = StudentExamModel::all();
>>>>>>> 001e104fcc67b0e7fd5ec022ebe34f7b2afc3527

        return view('admin.backend.Marks.marks_add',$data);
    }
}
