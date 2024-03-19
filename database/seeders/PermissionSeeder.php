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
        Permission::create(['name' => 'users.index']); // Index Users
        Permission::create(['name' => 'users.create']); // Create Users
        Permission::create(['name' => 'users.edit']); // Edit Users
        Permission::create(['name' => 'users.show']); // Show Users
    }
}
