<?php

namespace App\Console;

use App\Models\Absen;
use App\Models\Data;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
    $schedule->call(function () {
        $absen = Absen::all();
    
        foreach($absen as $data){
            Data::create([
                'nis' => $data->nis
            ]);

            $data->delete();
        }


       
    })->hourly();
    
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}