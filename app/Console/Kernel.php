<?php
namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        'app\Console\Commands\PingIps',
        'app\Console\Commands\CompareIps',
        'app\Console\Commands\SendLineNotifications'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->command('cron:pingip')->everyMinute();
        $schedule->command('cron:compareip')->cron("*/2 * * * *");
        // $schedule->command('cron:compareip')->everyMinute();
        // $schedule->command('cron:sendlinenotification')->everyMinute();
        $schedule->command('cron:sendlinenotification')->cron("*/2 * * * *");
        $schedule->call(function(){
            DB::table('status_records')->delete();
        })->daily();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
