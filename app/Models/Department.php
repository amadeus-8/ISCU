<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Department extends Model
{
    use HasFactory;

    public function getDepartment($id) {
        $department = DB::table('departments')
            ->join('subjects', 'departments.id', 'subjects.department_id')
            ->where('departments.id', '=', $id)
            ->first();

        return $department->title_short_ru ?? '';
    }
}
