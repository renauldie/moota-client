<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    // protected function schedule(Schedule $schedule): void
    // {
    //     // $schedule->command('inspire')->hourly();
    // }

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')->hourly();

        // Masukkan Kode Anda Disini
        // $schedule->call(function () {
        //     Log::info('Cronjob berhasil dijalankan');
        // })->everyMinute();
        $schedule->command('app:synchronize-moota')
                    ->everyMinute()        
                    ->appendOutputTo(storage_path('logs/scheduler.log'));

    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
