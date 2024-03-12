<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class CustomizationComposer
{
    public function compose(View $view)
    {
        $personalizacionesFirstRecord = DB::table('personalizaciones')->where('id', 1)->first();
        $colorPrincipal = $personalizacionesFirstRecord->color_principal;
        $colorSecundario = $personalizacionesFirstRecord->color_secundario;
        $colorTerciario = $personalizacionesFirstRecord->color_terciario;

        // Pasa los datos al layout
        $view->with('colorPrincipal', $colorPrincipal)
            ->with('colorSecundario', $colorSecundario)
            ->with('colorTerciario', $colorTerciario);
    }
}