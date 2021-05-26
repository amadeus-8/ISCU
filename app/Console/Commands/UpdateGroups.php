<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UpdateGroups extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:groups';

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
        $groups = ["ВТиПО", "ИС", "Финансы", "Журналистика", "СИБ", "Менеджмент", "Радиоэлектроника"];

        date_default_timezone_set('Asia/Almaty');

        $start_time = time();

        $time_now = date("H:i:s", $start_time);

        echo "Script started at: $time_now \n";

        $users = User::all();

        echo "Updating table... \n";

        for($i = 0; $i < $users->count(); $i++) {
            if(User::where('id', $i)->first() !== null) {
                User::where('id', $i)
                    ->where('role', 'STUDENT')
                    ->update([
                        'group' => $groups[array_rand($groups)] . "-" . "180" . rand(1, 9)
                    ]);
            }
        }

        $end_time = time();

        $time_after = date("H:i:s", $end_time);

        echo "Script ended at: $time_after \n";
    }
}
