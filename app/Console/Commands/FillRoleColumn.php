<?php

namespace App\Console\Commands;

use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Console\Command;

class FillRoleColumn extends Command
{
    /**
     * Constants for roles
     */
    const ROLE_ADVISER = 'ADVISER';
    const ROLE_STUDENT = 'STUDENT';
    const ROLE_TEACHER = 'TEACHER';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fill:role';

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

        $role_user = RoleUser::all();

        echo "Updating table... \n";

        foreach ($role_user as $role) {
            switch ($role->role_id) {
                case 1:
                    User::where('id', $role->user_id)->update(['role' => self::ROLE_ADVISER]);
                    break;
                case 3:
                    User::where('id', $role->user_id)->update(['role' => self::ROLE_TEACHER]);
                    break;
                case 4:
                    User::where('id', $role->user_id)->update(['role' => self::ROLE_STUDENT]);
                    break;
                default:
                    User::where('id', $role->user_id)->update(['role' => self::ROLE_STUDENT]);
                    break;
            }
        }

        $end_time = time();

        $time_after = date("H:i:s", $end_time);

        echo "Script ended at: $time_after \n";
    }
}
