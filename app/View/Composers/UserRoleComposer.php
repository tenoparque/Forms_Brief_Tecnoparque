<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserRoleComposer
{
    public function compose(View $view)
    {
        if (Auth::check()) {
            $nombreRol = '';
            $nombreUsuario = '';
        
            try {
                // El usuario está autenticado
                $usuario = Auth::user();
                $nombreRol = $usuario->roles->first()->name; // Obtén el nombre del primer rol (ajústalo según tus necesidades)
                $nombreUsuario = $usuario->name;
            } catch (\Exception $e) {
                // Manejo de la excepción
                $nombreRol = 'Error al obtener el rol';
                $nombreUsuario = 'Error al obtener el nombre de usuario';
            }

            $view->with('nombreRol', $nombreRol)
                 ->with('nombreUsuario', $nombreUsuario);
        } else {
            // El usuario no está autenticado
            $view->with('nombreRol', 'Usuario no autenticado')
                 ->with('nombreUsuario', ''); // Puedes asignar un valor predeterminado aquí si lo deseas
        }
    }
}