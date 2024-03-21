<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {   // configure el comando previamente creado y lo configure en el kernel para que se pueda ejecutar 
        $schedule->command('suma:prueba')->everyFiveSeconds();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        Commands\sumaPrueba::class;
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
