<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
// use App\Helpers\CoinUpdater;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // 'App\Console\Commands\Inspire',
        Commands\CoinUpdater::class,
    ];

    // private $coinUpdater;

    // public function __construct() {
    //     $coinUpdater = new CoinUpdater();
    // }
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('CoinUpdater:update')
                 ->everyMinute();
        // $schedule->call(function () {
        //     $coinUpdater = new CoinUpdater();
        //     $coinUpdater->update();
        //     error_log('aaaaa', 0);
        // })->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
