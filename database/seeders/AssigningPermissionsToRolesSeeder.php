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
        // Definir datos de permisos y roles
        $permissionsToRoles = [
            // 'Super Admin' => [
            //     'users.index', 'users.create', 'users.edit', 'users.show',
            //     'roles.index', 'roles.create', 'roles.edit', 'roles.show',
            //     Agrega más permisos según sea necesario
            // ],
            // Agrega más roles y permisos según sea necesario

            // 'Admin' => [
            //     'politicas.index', 'politicas.create', 'politicas.edit','politicas.show',
            //     'personalizaciones.index', 'personalizaciones.create', 'personalizaciones.edit','personalizaciones.show',
            //     'users.index', 'users.create', 'users.edit','users.show',
            //     'solicitudes.index', 'solicitudes.create', 'solicitudes.edit','solicitudes.show',
            //     'tiposSolicitudes.index', 'tiposSolicitudes.create', 'tiposSolicitudes.edit','tiposSolicitudes.show',
            //     'serviciosPorTiposSolicitudes.index', 'serviciosPorTiposSolicitudes.create', 'serviciosPorTiposSolicitudes.edit','serviciosPorTiposSolicitudes.show',
            //     'datosUnicosSolicitud.index', 'datosUnicosSolicitud.create', 'datosUnicosSolicitud.edit','datosUnicosSolicitud.show',
            // ],

            // 'Dinamizador' => [
            //     'solicitudes.index', 'solicitudes.create', 'solicitudes.edit','solicitudes.show', 'solicitudes.modification',
            // ],

            // 'Articulador' => [
            //     'solicitudes.index', 'solicitudes.create', 'solicitudes.edit','solicitudes.show', 'solicitudes.modification',
            // ],

            // 'Designer' => [
            //     'solicitudes.index', 'solicitudes.edit','solicitudes.show', 'estadosSolicitudes.change',
            // ],

            // 'Activador Nacional' => [
            //     'solicitudes.index', 'solicitudes.create', 'solicitudes.edit','solicitudes.show', 'solicitudes.modification',
            // ],

        ];

        // Iterar sobre los datos de permisos y roles
        foreach ($permissionsToRoles as $roleName => $permissions) {
            // Obtener el rol por su nombre
            $rol = Role::where('name', $roleName)->first();
            
            // Verificar si el rol existe
            if ($rol) {
                // Asignar permisos al rol
                $rol->syncPermissions($permissions);
                $this->command->info('Permisos asignados correctamente para el rol: ' . $roleName);
            } else {
                $this->command->error('El rol especificado (' . $roleName . ') no existe en la base de datos.');
            }
        }
    }
}
