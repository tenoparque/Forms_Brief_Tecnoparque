<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::firstOrCreate([
            'name' => 'Super Admin',
            'guard_name' => 'web'
        ]);
        
        $superAdmin = User::create([
            'name' => 'Super',  // Nombre del Super Admin
            'apellidos' => 'Admin',  // Apellidos del Super Admin
            'email' => 'superadmin@example.com',  // Email del Super Admin
            'password' => Hash::make('12345678'),  // Contraseña encriptada
            'celular' => '123456789',  // Número de celular
            'id_nodo' => 1,  // ID del nodo
            'id_estado' => 1  // ID del estado
        ]);

        // Asignar el rol de Super Admin al usuario
        $superAdmin->assignRole($superAdminRole);
    }
    
}
