<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AssigningPermissionsToRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Obtener el rol por su nombre
        $rol = Role::where('name', 'Super Admin')->first();
        
        // Verificar si el rol existe
        if ($rol) {


            
            // Asignar permisos al rol
            // $rol->givePermissionTo(['users.index', 'users.create', 'users.edit','users.show']);
            // $rol->givePermissionTo(['roles.index', 'roles.create', 'roles.edit','roles.show']);
            // $rol->givePermissionTo(['tiposDeDato.index', 'tiposDeDato.create', 'tiposDeDato.edit','tiposDeDato.show']);
            // $rol->givePermissionTo(['departamentos.index', 'departamentos.create', 'departamentos.edit','departamentos.show']);
            // $rol->givePermissionTo(['nodos.index', 'nodos.create', 'nodos.edit','nodos.show']);
            // $rol->givePermissionTo(['ciudades.index', 'ciudades.create', 'ciudades.edit','ciudades.show']);
            // $rol->givePermissionTo(['politicas.index', 'politicas.create', 'politicas.edit','politicas.show']);
            // $rol->givePermissionTo(['personalizaciones.index', 'personalizaciones.create', 'personalizaciones.edit','personalizaciones.show']);
            // $rol->givePermissionTo(['estados.index', 'estados.create', 'estados.edit','estados.show']);
            // $rol->givePermissionTo(['categoriasEventosEspeciales.index', 'categoriasEventosEspeciales.create', 'categoriasEventosEspeciales.edit','categoriasEventosEspeciales.show']);
            // $rol->givePermissionTo(['eventosEspeciales.index', 'eventosEspeciales.create', 'eventosEspeciales.edit','eventosEspeciales.show']);
            // $rol->givePermissionTo(['solicitudes.index', 'solicitudes.create', 'solicitudes.edit','solicitudes.show']);
            // $rol->givePermissionTo(['tiposSolicitudes.index', 'tiposSolicitudes.create', 'tiposSolicitudes.edit','tiposSolicitudes.show']);
            $rol->givePermissionTo(['serviciosPorTiposSolicitudes.index', 'serviciosPorTiposSolicitudes.create', 'serviciosPorTiposSolicitudes.edit','serviciosPorTiposSolicitudes.show']);

            $this->command->info('Permisos asignados correctamente.');
        } else {
            $this->command->error('El rol especificado no existe en la base de datos.');
        }
    }
}
