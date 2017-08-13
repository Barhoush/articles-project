<?php

namespace App\Console;

use App\Factors;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Mockery\Exception;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $factors    =   Factors::all();

        $schedule->call(function () use ($factors){
            foreach ($factors   as  $factor){
                $newPrice   =   ($factor ->  price   / $factor   ->  factor)    *   2.5;
                if($newPrice    <=  0.01){
                    $newPrice   =   1.0;
                }
                try{
                    $factor ->  price   =   $newPrice;
                    $factor    ->  save();
                }
                catch (Exception    $exception){
                    continue;
                }
            }
        })->everyMinute();
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
