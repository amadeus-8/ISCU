<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AcademicRank extends Model
{
    use HasFactory;

    public function getRank($id) {
        $academic_rank = DB::table('staff')
            ->join('academic_ranks', 'staff.academic_rank_id', 'academic_ranks.id')
            ->where('staff.user_id', '=', $id)
            ->first();

        return $academic_rank->description_ru ?? '';
    }
}
