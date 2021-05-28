<?php

namespace App\Http\Controllers;

use App\Models\AcademicDegree;
use App\Models\AcademicRank;
use App\Models\Department;
use App\Models\RoleUser;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade as PDF;

class AdviserController extends Controller
{
    public function getTeachers()
    {
        $teachers = DB::table('users')
            ->join('role_user', 'users.id', 'role_user.user_id')
            ->where('role_user.role_id', '=', 3)
            ->orderBy('created_at', 'DESC')
            ->get();

        $result = [];

        foreach ($teachers as $teacher) {
            $result[] = [
                'id'              => $teacher->id,
                'first_name'      => $teacher->firstname,
                'last_name'       => $teacher->lastname,
                'patronymic'      => $teacher->patronymic,
                'academic_rank'   => (new AcademicRank())->getRank($teacher->id),
                'academic_degree' => (new AcademicDegree())->getDegree($teacher->id),
                'total_students' => rand(20, 50)
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
                    'success' => true,
                    "message" => "Студент успешно создан"
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
                    'success' => true,
                    "message" => "Учитель успешно создан"
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
                'success' => true,
                "message" => "Курс успешно создан"
            ]);
        } else {
            return $validator->errors();
        }
    }

    public function getStudentsList(Request $request)
    {
        $type = $request->type;

        if($type !== 'others') {
            $students = DB::table('student_courses')
                ->join('subjects', 'student_courses.subject_id', 'subjects.id')
                ->join('users', 'users.id', 'student_courses.user_id')
                ->where('student_courses.status', $type)
                ->groupBy('users.id')
                ->get(
                    [
                        'users.id',
                        'student_courses.status',
                        'users.firstname',
                        'users.lastname',
                    ]
                );
        }
        else {
            $users = DB::table('student_courses')
                ->groupBy('user_id')
                ->pluck('user_id')
                ->toArray();

            $students = DB::table('users')
                ->where('role', 'STUDENT')
                ->whereNotIn('id', $users)
                ->get();

//            $students = DB::table('student_courses')
//                ->join('subjects', 'student_courses.subject_id', 'subjects.id')
//                ->join('users', 'users.id', 'student_courses.user_id')
//                ->groupBy('users.id')
//                ->get(
//                    [
//                        'users.id',
//                        'student_courses.status',
//                        'users.firstname',
//                        'users.lastname',
//                    ]
//                );
        }

        $results = [];

        foreach ($students as $student) {
            $results[] = [
                'id' => $student->id,
                'firstname' => $student->firstname,
                'lastname' => $student->lastname
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

//        $courses = DB::table('student_courses')
//            ->join('subjects', 'student_courses.subject_id', 'subjects.id')
//            ->join('users', 'users.id', 'student_courses.teacher_id')
//            ->where('status', $type)
//            ->where('student_courses.user_id', $student_id)
//            ->get();

        $courses = DB::table('student_courses')
            ->join('subjects', 'student_courses.subject_id', 'subjects.id')
            ->join('users', 'users.id', 'student_courses.teacher_id')
            ->where('user_id', $student_id)
            ->where('student_courses.status', $type)
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
                'teacher' => $course->firstname . " " . $course->lastname,
                'name' => $course->title_ru,
                'credits' => $course->ects_credits,
                'status' => $course->status,
                'total_students' => rand(20, 50)
            ];
        }

        $response = [
            'firstname' => $student->firstname,
            'lastname' => $student->lastname,
            'total_credits' => $total_credits,
            'courses' => $results,
        ];

        return response()->json($response);
    }

    public function createPDF(Request $request) {

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

        $data = [
            'firstname' => $student->firstname,
            'lastname' => $student->lastname,
            'courses' => $results
        ];

        // share data to view
        view()->share('data', $data);
        $pdf = PDF::loadView('pdf_view', $data)->setPaper('a4', 'portrait');

        $content = $pdf->save('pdf_file.pdf', 'UTF-8')->download('pdf_file.pdf')->getOriginalContent();

        Storage::put('public/pdf/name.pdf', $content);

        return Storage::get('public/pdf/name.pdf');
    }

    public function confirmCourses(Request  $request) {
        $courses = $request->courses;

        DB::table('student_courses')
            ->whereIn('id', $courses)
            ->update(['status' =>'confirmed']);

        $result = [
            'success' => true,
            "message" => "Курсы успешно подтверждены"
        ];

        return response()->json($result);
    }

    public function deleteTeacher(Request $request) {
        $teacher_id = $request->id;

        DB::table('users')
            ->where('id', $teacher_id)
            ->delete();

        $result = [
            'success' => true,
            "message" => "Учитель успешно удален"
        ];

        return response()->json($result);
    }

    public function deleteCourse(Request $request) {
        $course_id = $request->id;

        DB::table('subjects')
            ->where('id', $course_id)
            ->delete();

        $result = [
            'success' => true,
            "message" => "Курс успешно удален"
        ];

        return response()->json($result);
    }
}
