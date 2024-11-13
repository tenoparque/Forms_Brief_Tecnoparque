<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Imports\SolicitudesImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function import(Request $request)
    {
        Log::info('Inicio de importación');
    
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);
    
        $file = $request->file('file');
    
        // Verifica si el archivo se ha cargado correctamente
        if ($file) {
            Log::info('Archivo cargado correctamente: ' . $file->getClientOriginalName());
        } else {
            Log::error('Archivo no cargado');
            return redirect()->back()->with('error', 'Error al cargar el archivo.');
        }
    
        // Intenta importar los usuarios
        try {
            Log::info('Ejecutando importación con UsersImport');
            Excel::import(new UsersImport, $file);
            
            Log::info('Importación de usuarios completada');
        } catch (\Exception $e) {
            Log::error('Error al importar usuarios: ' . $e->getMessage());
        }
    
        return redirect()->back()->with('success', 'Archivo importado correctamente.');
    }

    public function importSolicitudes(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        $file = $request->file('file');
        Log::info("Inicio de importación de solicitudes");

        Excel::import(new SolicitudesImport, $file);

        Log::info("Importación de solicitudes completada");

        return redirect()->back()->with('success', 'Importación de solicitudes completada con éxito.');
    }
}
