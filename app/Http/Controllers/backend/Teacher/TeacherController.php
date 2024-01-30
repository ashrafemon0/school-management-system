<?php

namespace App\Http\Controllers\backend\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function LessonPlanView(){
        $TeacherData = Teacher::all();

        return view('admin.backend.Teacher.teacher_view',compact('TeacherData'));
    }
    public function AddLessonPlan(){

        return view('admin.backend.Teacher.teacher_add');
    }

    public function StoreLessonPlan(Request $request){


        $data = new Teacher();
        $data->day = $request->day;
        $data->assembly = $request->assembly;
        $data->table_work = $request->table_work;
        $data->group_work = $request->group_work;
        $data->adl_activity = $request->adl_activity;
        $data->massy_play = $request->massy_play;
        $data->snack_time = $request->snack_time;
        $data->table_work_2 = $request->table_work_2;
        $data->physical_exercise = $request->physical_exercise;
        $data->save();

        $notification = array(
            'message' => 'Lesson Plan Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('lesson.plan.view')->with($notification);
    }
}
