<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AcademicDegree extends Model
{
    use HasFactory;

    public function getDegree($id) {
        $academic_degree = DB::table('staff')
            ->join('academic_degrees', 'staff.academic_degree_id', 'academic_degrees.id')
            ->where('staff.user_id', '=', $id)
            ->first();

        return $academic_degree->title_ru ?? '';
    }
}
