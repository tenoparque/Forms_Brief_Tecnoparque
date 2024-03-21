<?php

namespace App\Console\Commands;

use App\Http\Controllers\SolicitudeController;
use App\Models\HistorialDeModificacionesPorSolicitude;
use App\Models\Prueba;

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
        $ultimoRegistro = Prueba::latest()->first();

        // Verificar si hay un último registro
        if ($ultimoRegistro) {
            // Obtener el valor del último registro
            $valorUltimoRegistro = $ultimoRegistro->numero;
    
            // Comparar el valor recibido con el valor del último registro
            if ($texto != $valorUltimoRegistro) {
                // Si son diferentes, actualizar el valor del último registro
                $ultimoRegistro->numero = $texto;
                $ultimoRegistro->save();
            }
        } else {
            // Si no hay un último registro, crear uno nuevo con el valor recibido
            $prueba = new Prueba();
            $prueba->numero = $texto;
            $prueba->save();
        }
        

    }
}
