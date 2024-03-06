<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserRoleComposer
{
    public function compose(View $view)
    {
        if (Auth::check()) {
            // El usuario está autenticado
            $usuario = Auth::user();
            $nombreRol = $usuario->roles->first()->name; // Obtén el nombre del primer rol (ajústalo según tus necesidades)
            $view->with('nombreRol', $nombreRol);
        } else {
            // El usuario no está autenticado
            $view->with('nombreRol', 'Usuario no autenticado');
        }
    }
}