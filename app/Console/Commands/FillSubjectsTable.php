<?php

namespace App\Console\Commands;

use App\Models\Subject;
use Illuminate\Console\Command;

class FillSubjectsTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:subjects';

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

        $subjects = Subject::all();

        echo "Updating table... \n";

        foreach ($subjects as $subject) {
            $subject->where('lection', 0)
                ->orWhere('lab', 0)
                ->orWhere('practice', 0)
                ->update([
                    'lection' => 15,
                    'lab' => rand(25, 30),
                    'practice' => rand(10, 15),
                    'ects_credits' => rand(3, 4)
                ]);
        }

        $end_time = time();

        $time_after = date("H:i:s", $end_time);

        echo "Script ended at: $time_after \n";
    }
}
