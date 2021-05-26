<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UpdateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:users';

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

        $users = User::all();

        echo "Updating table... \n";

        foreach ($users as $user) {
            $user->where('role', 'STUDENT')
                ->update([
                    'password' => bcrypt('12345678')
                ]);
        }

        $end_time = time();

        $time_after = date("H:i:s", $end_time);

        echo "Script ended at: $time_after \n";
    }
}
