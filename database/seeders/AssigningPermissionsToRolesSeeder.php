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
            'Super Admin' => [
                'users.index', 'users.create', 'users.edit', 'users.show',
                'roles.index', 'roles.create', 'roles.edit', 'roles.show',
                'tiposDeDato.index', 'tiposDeDato.create', 'tiposDeDato.edit','tiposDeDato.show',
                'departamentos.index', 'departamentos.create', 'departamentos.edit','departamentos.show',
                'nodos.index', 'nodos.create', 'nodos.edit','nodos.show',
                'ciudades.index', 'ciudades.create', 'ciudades.edit','ciudades.show',
                'politicas.index', 'politicas.create', 'politicas.edit','politicas.show',
                'personalizaciones.index', 'personalizaciones.create', 'personalizaciones.edit','personalizaciones.show',
                'estados.index', 'estados.create', 'estados.edit','estados.show',
                'categoriasEventosEspeciales.index', 'categoriasEventosEspeciales.create', 'categoriasEventosEspeciales.edit','categoriasEventosEspeciales.show',
                'eventosEspeciales.index', 'eventosEspeciales.create', 'eventosEspeciales.edit','eventosEspeciales.show',
                'solicitudes.index', 'solicitudes.create', 'solicitudes.edit','solicitudes.show', 'solicitudes.modification',
                'tiposSolicitudes.index', 'tiposSolicitudes.create', 'tiposSolicitudes.edit','tiposSolicitudes.show',
                'serviciosPorTiposSolicitudes.index', 'serviciosPorTiposSolicitudes.create', 'serviciosPorTiposSolicitudes.edit','serviciosPorTiposSolicitudes.show',
                'estadosSolicitudes.index', 'estadosSolicitudes.create', 'estadosSolicitudes.edit','estadosSolicitudes.show', 'estadosSolicitudes.change', 
                'datosUnicosSolicitud.index', 'datosUnicosSolicitud.create', 'datosUnicosSolicitud.edit','datosUnicosSolicitud.show',
                'dashboard.index', 'dashboard.solicitudes', 'dashboard.charts',
                'reportes.index',
            ],

            'Activador Nacional' => [
                'politicas.index', 'politicas.create', 'politicas.edit','politicas.show',
                'personalizaciones.index', 'personalizaciones.create', 'personalizaciones.edit','personalizaciones.show',
                'categoriasEventosEspeciales.index', 'categoriasEventosEspeciales.create', 'categoriasEventosEspeciales.edit','categoriasEventosEspeciales.show',
                'eventosEspeciales.index', 'eventosEspeciales.create', 'eventosEspeciales.edit','eventosEspeciales.show',
                'users.index', 'users.create', 'users.edit','users.show',
                'solicitudes.index', 'solicitudes.create', 'solicitudes.edit','solicitudes.show', 'solicitudes.modification','estadosSolicitudes.change',
                'tiposSolicitudes.index', 'tiposSolicitudes.create', 'tiposSolicitudes.edit','tiposSolicitudes.show',
                'serviciosPorTiposSolicitudes.index', 'serviciosPorTiposSolicitudes.create', 'serviciosPorTiposSolicitudes.edit','serviciosPorTiposSolicitudes.show',
                'datosUnicosSolicitud.index', 'datosUnicosSolicitud.create', 'datosUnicosSolicitud.edit','datosUnicosSolicitud.show',
                'dashboard.index', 'dashboard.solicitudes', 'dashboard.charts',
                'reportes.index',
            ],

            'Dinamizador' => [
                'solicitudes.index', 'solicitudes.create', 'solicitudes.edit','solicitudes.show', 'solicitudes.modification',
            ],

            'Articulador' => [
                'solicitudes.index', 'solicitudes.create', 'solicitudes.edit','solicitudes.show', 'solicitudes.modification',
            ],

            'Designer' => [
                'solicitudes.index', 'solicitudes.edit','solicitudes.show', 'estadosSolicitudes.change',
                'dashboard.index' , 'dashboard.solicitudes',
            ],

            'Experto Divulgación' =>[
                'categoriasEventosEspeciales.index', 'categoriasEventosEspeciales.create', 'categoriasEventosEspeciales.edit','categoriasEventosEspeciales.show',
                'eventosEspeciales.index', 'eventosEspeciales.create', 'eventosEspeciales.edit','eventosEspeciales.show',
                'solicitudes.index', 'solicitudes.create','solicitudes.edit','solicitudes.show', 'estadosSolicitudes.change',
                'dashboard.index' , 'dashboard.solicitudes','dashboard.charts','reportes.index',
            ]

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