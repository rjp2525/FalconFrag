<?php

namespace Falcon\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \Falcon\Console\Commands\Inspire::class,
        \Falcon\Console\Commands\RefreshDatabase::class,
        \Falcon\Console\Commands\CacheTweets::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('cache:tweets')->cron('*/2 * * * *')->appendOutputTo(storage_path('logs/tweets.log'));
    }
}
