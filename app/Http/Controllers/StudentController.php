<?php

namespace App\Http\Controllers;

use App\Models\StudentCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function createCourse(Request $request)
    {
        $rules = [
            'user_id' => 'required',
            'course_id' => 'required',
            'teacher_id' => 'required'
        ];

        $validator = Validator::make($request->all()['course'], $rules);

        if (!$validator->fails()) {

            $student_course = new StudentCourse();
            $student_course->user_id = $request['course']['user_id'];
            $student_course->subject_id = $request['course']['course_id'];
            $student_course->teacher_id = $request['course']['teacher_id'];
            $student_course->status = $request['type'] === 'save' ? 'pending' : 'waiting';
            $student_course->save();

            return response()->json([
                'success' => true,
//                'course'  => $student_course,
            ]);
        } else {
            return $validator->errors();
        }
    }
}
