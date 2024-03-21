<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creates Permissions

        // User Permissions
        
        // Permission::create(['name' => 'users.index']); // Index Users
        // Permission::create(['name' => 'users.create']); // Create Users
        // Permission::create(['name' => 'users.edit']); // Edit Users
        // Permission::create(['name' => 'users.show']); // Show Users

        // // Role Permissions

        // Permission::create(['name' => 'roles.index']); // Index Roles
        // Permission::create(['name' => 'roles.create']); // Create Roles
        // Permission::create(['name' => 'roles.edit']); // Edit Roles
        // Permission::create(['name' => 'roles.show']); // Show Roles

        // Tipos de Dato Permissions

        // Permission::create(['name' => 'tiposDeDato.index']); // Index Tipos de Dato
        // Permission::create(['name' => 'tiposDeDato.create']); // Create Tipos de Dato
        // Permission::create(['name' => 'tiposDeDato.edit']); // Edit Tipos de Dato
        // Permission::create(['name' => 'tiposDeDato.show']); // Show Tipos de Dato

        // Departamentos Permissions

        // Permission::create(['name' => 'departamentos.index']); // Index Departamentos
        // Permission::create(['name' => 'departamentos.create']); // Create Departamentos
        // Permission::create(['name' => 'departamentos.edit']); // Edit Departamentos
        // Permission::create(['name' => 'departamentos.show']); // Show Departamentos

        // Nodos Permissions

        // Permission::create(['name' => 'nodos.index']); // Index Nodos
        // Permission::create(['name' => 'nodos.create']); // Create Nodos
        // Permission::create(['name' => 'nodos.edit']); // Edit Nodos
        // Permission::create(['name' => 'nodos.show']); // Show Nodos
    
        // Ciudades Permissions

        // Permission::create(['name' => 'ciudades.index']); // Index Ciudades
        // Permission::create(['name' => 'ciudades.create']); // Create Ciudades
        // Permission::create(['name' => 'ciudades.edit']); // Edit Ciudades
        // Permission::create(['name' => 'ciudades.show']); // Show Ciudades

        // Politicas Permissions

        // Permission::create(['name' => 'politicas.index']); // Index Politicas
        // Permission::create(['name' => 'politicas.create']); // Create Politicas
        // Permission::create(['name' => 'politicas.edit']); // Edit Politicas
        // Permission::create(['name' => 'politicas.show']); // Show Politicas

        
    }
}
