<?php

namespace App\Console\Commands;

use App\Models\Student;
use App\Models\User;
use Illuminate\Console\Command;

class FillCourseColumn extends Command
{
    /**
     * Constants for roles
     */
    const ROLE_STUDENT = 'STUDENT';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fill:course';

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

        $students = Student::all();

        echo "Updating table... \n";

        foreach ($students as $student) {
            User::where('id', $student->user_id)->update(['course' => $student->course]);
        }

        $end_time = time();

        $time_after = date("H:i:s", $end_time);

        echo "Script ended at: $time_after \n";
    }
}
