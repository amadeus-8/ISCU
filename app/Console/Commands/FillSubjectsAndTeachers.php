<?php

namespace App\Console\Commands;

use App\Models\Subject;
use App\Models\TeacherSubject;
use App\Models\User;
use Illuminate\Console\Command;

class FillSubjectsAndTeachers extends Command
{
    /**
     * Constants for roles
     */
    const ROLE_TEACHER = 'TEACHER';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fill:subjects';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        date_default_timezone_set('Asia/Almaty');

        $start_time = time();

        $time_now = date("H:i:s", $start_time);

        echo "Script started at: $time_now \n";

        $teachers = User::where('role', self::ROLE_TEACHER)->get();
        $subjects = Subject::all();

        echo "Updating table... \n";

//        $subject_id = 1;
//        $subjects_count = Subject::all()->count();

        $i = 0;
        while($i < 2) {
            foreach ($subjects as $subject) {
                $teacher_subject = new TeacherSubject();
                $teacher_subject->subject_id = $subject->id;
                $teacher_subject->save();
            }
            $i++;
        }

        $subjects_count = TeacherSubject::all()->count();
        $subject_id = 1;

        while ($subject_id < $subjects_count) {
            foreach ($teachers as $teacher) {
                TeacherSubject::where('subject_id', $subject_id)->update(['teacher_id' => $teacher->id]);
                $subject_id++;
            }
        }

        $end_time = time();

        $time_after = date("H:i:s", $end_time);

        echo "Script ended at: $time_after \n";
    }
}
