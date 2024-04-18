<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class CustomizationComposer
{
    public function compose(View $view)
    {
        $personalizacionesFirstRecord = DB::table('personalizaciones')->where('id', 1)->first();
        $logo = $personalizacionesFirstRecord->logo;
        $colorPrincipal = $personalizacionesFirstRecord->color_principal;
        $colorSecundario = $personalizacionesFirstRecord->color_secundario;
        $colorTerciario = $personalizacionesFirstRecord->color_terciario;
        $colorCuarto = $personalizacionesFirstRecord->color_cuarto;

        // Pasa los datos al layout
        $view->with('colorPrincipal', $colorPrincipal)
            ->with('colorSecundario', $colorSecundario)
            ->with('colorTerciario', $colorTerciario)
            ->with('colorCuarto', $colorCuarto)
            ->with('logo', $logo);
            
    }
}