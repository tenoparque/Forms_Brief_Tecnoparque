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
            $rol->givePermissionTo(['users.index', 'users.create', 'users.edit','users.show']);
            $this->command->info('Permisos asignados al rol correctamente.');
        } else {
            $this->command->error('El rol especificado no existe en la base de datos.');
        }
    }
}
