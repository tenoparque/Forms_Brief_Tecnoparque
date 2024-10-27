<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin', 'guard_name' => 'web']);
        Role::create(['name' => 'Admin', 'guard_name' => 'web']);
        Role::create(['name' => 'Dinamizador', 'guard_name' => 'web']);
        Role::create(['name' => 'Articulador', 'guard_name' => 'web']);
        Role::create(['name' => 'Designer', 'guard_name' => 'web']);
        Role::create(['name' => 'Activador Nacional', 'guard_name' => 'web']);
    }
}
