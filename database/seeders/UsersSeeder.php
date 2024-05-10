<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user = User::create([
            'name' => 'superadmin',
            'email'=> 'admin@admin.com',
            'password'=>bcrypt('12345678'),
            'celular'=> '00000000000',
            'apellidos'=>'Super Admin',
            'id_nodo'=>1,
            'id_estado'=>1
            
    ]);
    
    
    $user->assignRole('Super Admin');

    }
}
