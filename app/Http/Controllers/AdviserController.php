<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdviserController extends Controller
{
    public function getTeachers() {
        $teachers = DB::table('users')
            ->join('role_user', 'users.id', 'role_user.user_id')
            ->where('role_user.role_id', '=', 3)
            ->get();

        $result = [];

        foreach ($teachers as $teacher) {
            $result[] = array(
                'first_name' => $teacher->firstname,
                'last_name' => $teacher->lastname,
                'patronymic' => $teacher->patronymic
            );
        }

        return response()->json($result);
    }
}
