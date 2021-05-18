<?php

namespace App\Http\Controllers;

use App\Models\AcademicDegree;
use App\Models\AcademicRank;
use App\Models\Department;
use App\Models\RoleUser;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdviserController extends Controller
{
    public function getTeachers()
    {
        $teachers = DB::table('users')
            ->join('role_user', 'users.id', 'role_user.user_id')
            ->where('role_user.role_id', '=', 3)
            ->get();

        $result = [];

        foreach ($teachers as $teacher) {
            $result[] = [
                'id'              => $teacher->id,
                'first_name'      => $teacher->firstname,
                'last_name'       => $teacher->lastname,
                'patronymic'      => $teacher->patronymic,
                'academic_rank'   => (new AcademicRank())->getRank($teacher->id),
                'academic_degree' => (new AcademicDegree())->getDegree($teacher->id)
            ];
        }

        return response()->json($result);
    }

    public function getTeachersById(Request $request)
    {
        $teachers = DB::table('users')
            ->join('teacher_subjects', 'users.id', 'teacher_subjects.teacher_id')
            ->where('teacher_subjects.subject_id', $request->id)
            ->groupBy('teacher_subjects.teacher_id')
            ->get();

        $results = [];

        foreach ($teachers as $teacher) {
            $results[] = [
                'id'              => $teacher->id,
                'first_name'      => $teacher->firstname,
                'last_name'       => $teacher->lastname,
                'patronymic'      => $teacher->patronymic,
            ];
        }

        return response()->json($results);
    }

    public function getCourses()
    {
        $courses = DB::table('subjects')
            ->get();

        $results = [];

        foreach ($courses as $course) {
            $results[] = [
                'id' => $course->id,
                'name' => $course->title_ru,
                'description' => $course->description_ru,
                'department' => (new Department())->getDepartment($course->department_id),
                'credits' => $course->ects_credits,
                'lection' => $course->lection,
                'lab' => $course->lab,
                'practice' => $course->practice,
            ];
        }

        return response()->json($results);
    }

    public function createStudent(Request $request)
    {
        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'login' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if (!$validator->fails()) {
            $student = new User();
            $student->firstname = $request->firstname;
            $student->lastname = $request->lastname;
            $student->login = $request->login;
            $student->iin = $request->iin;
            $student->password = bcrypt('12345678');
            $student->role = 'STUDENT';

            if ($student->save()) {
                $role = new RoleUser();
                $role->role_id = 4;
                $role->user_id = $student->id;
                $role->save();

                return response()->json([
                    'success' => true
                ]);
            }
        }
        else {
            return $validator->errors();
        }
    }

    public function createTeacher(Request $request)
    {
        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'login' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if (!$validator->fails()) {
            $user = new User();
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->login = $request->login;
            $user->iin = $request->iin;
            $user->role = 'TEACHER';

            if ($user->save()) {
                $role = new RoleUser();
                $role->role_id = 3;
                $role->user_id = $user->id;
                $role->save();

                return response()->json([
                    'success' => true
                ]);
            }
        } else {
            return $validator->errors();
        }
    }

    public function createCourse(Request $request)
    {
        $rules = [
            'title' => 'required',
            'credits' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if (!$validator->fails()) {

            $subject = new Subject();
            $subject->title_ru = $request->title;
            $subject->ects_credits = $request->credits;
            $subject->save();

            return response()->json([
                'success' => true
            ]);
        } else {
            return $validator->errors();
        }
    }

    public function getStudentsList(Request $request)
    {
        $type = $request->type;

        $students = DB::table('student_courses')
            ->join('subjects', 'student_courses.subject_id', 'subjects.id')
            ->join('users', 'users.id', 'student_courses.user_id')
            ->where('status', $type)
            ->groupBy('users.id')
            ->get();

        $results = [];

        foreach ($students as $student) {
            $results[] = [
                'id' => $student->id,
                'firstname' => $student->firstname,
                'lastname' => $student->lastname
//                'course' => $student->title_ru,
//                'credits' => $student->ects_credits,
//                'status' => $student->status,
            ];
        }

        return response()->json($results);
    }

    public function getStudentInfo(Request $request)
    {
        $type = $request->type;

        $student_id = $request->id;

        $student = DB::table('users')
            ->where('id', $student_id)
            ->first();

        $courses = DB::table('student_courses')
            ->join('subjects', 'student_courses.subject_id', 'subjects.id')
            ->join('users', 'users.id', 'student_courses.teacher_id')
            ->where('status', $type)
            ->where('student_courses.user_id', $student_id)
            ->get();

        $results = [];

        foreach ($courses as $course) {
            $results[] = [
                'id' => $course->id,
                'teacher' => $course->firstname . " " . $course->lastname,
                'name' => $course->title_ru,
                'credits' => $course->ects_credits,
                'status' => $course->status,
            ];
        }

        $response = [
            'firstname' => $student->firstname,
            'lastname' => $student->lastname,
            'courses' => $results
        ];

        return response()->json($response);
    }

    public function test()
    {
        return (new User())->getUser();
    }
}
