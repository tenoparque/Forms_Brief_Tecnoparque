<?php

namespace App\Console\Commands;

use App\Http\Controllers\SolicitudeController;
use App\Models\HistorialDeModificacionesPorSolicitude;
use App\Models\Solicitude;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class sumaPrueba extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'suma:prueba';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'me esta sirviendo';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $texto = Solicitude::count()+ HistorialDeModificacionesPorSolicitude::count();
        //Storage::append("archivo.txt", $texto);
        Log::info('Valor enviado al controlador:', ['valor' => $texto]);
        (new SolicitudeController)->procesarValor($texto);
        

    }
}
