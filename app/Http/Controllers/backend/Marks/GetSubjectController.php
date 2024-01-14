<?php

namespace App\Http\Controllers\backend\Marks;

use App\Http\Controllers\Controller;
use App\Models\SubjectAssign;
use Illuminate\Http\Request;

class GetSubjectController extends Controller
{
    public function GetSubject(Request $request){

        $class_id = $request->class_id;
        $allData = SubjectAssign::with(['FeeClass'])->where('class_id',$class_id)->get();
//        dd($allData->toArray());

        return response()->json($allData);

    }
}
