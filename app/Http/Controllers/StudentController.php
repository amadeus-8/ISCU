<?php

namespace App\Http\Controllers;

use App\Models\StudentCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $validator = Validator::make($request->all(), $rules);

        if (!$validator->fails()) {

            $student_course = new StudentCourse();
            $student_course->user_id = $request->user_id;
            $student_course->subject_id = $request->course_id;
            $student_course->teacher_id = $request->teacher_id;
            $student_course->status = 'pending';
            $student_course->save();

            return response()->json([
                'success' => true,
//                'course'  => $student_course,
            ]);
        } else {
            return $validator->errors();
        }
    }

    public function submitCourses(Request  $request) {
        $courses = $request->courses;

        DB::table('student_courses')
            ->whereIn('id', $courses)
            ->update(['status' =>'waiting']);

        $result = [
            'success' => true
        ];

        return response()->json($result);
    }

    public function getStudentCourses(Request $request) {
        $user_id = $request->id;
        $status = $request->status ?? 'pending';

        $courses = DB::table('student_courses')
            ->join('subjects', 'student_courses.subject_id', 'subjects.id')
            ->join('users', 'users.id', 'student_courses.teacher_id')
            ->where('user_id', $user_id)
            ->where('student_courses.status', $status)
            ->get(
                [
                    'student_courses.id',
                    'student_courses.status',
                    'subjects.title_ru',
                    'subjects.ects_credits',
                    'users.firstname',
                    'users.lastname',
                    'student_courses.status',
                ]
            );

        $results = [];

        $total_credits = 0;

        foreach ($courses as $course) {
            $total_credits = $total_credits + $course->ects_credits;
            $results[] = [
                'id' => $course->id,
                'teacher_name' => $course->firstname . " " . $course->lastname,
                'course_name' => $course->title_ru,
                'credits' => $course->ects_credits,
                'status' => $course->status,
                'total_students' => rand(20, 50)
            ];
        }

        $result = [
            'total_credits' => $total_credits,
            'student_courses' => $results
        ];

        return response()->json($result);
    }

    public function deleteCourse(Request $request) {
        $course_id = $request->id;

        DB::table('student_courses')
            ->where('id', $course_id)
            ->delete();

        $result = [
            'success' => true,
        ];

        return response()->json($result);
    }
}
