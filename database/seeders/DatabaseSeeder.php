<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(EstadosSeeder::class);
        $this->call(EstadosDeLasSolicitudesSeeder::class);
        $this->call(TiposDeDatosSeeder::class);
        $this->call(DepartamentosSeeder::class);
        $this->call(MunicipioSeeder::class);
        $this->call(NodoSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(PersonalizacionesSeeder::class);
       $this->call(PermissionSeeder::class); // Calling the PermissionSeeder
         $this->call(AssigningPermissionsToRolesSeeder::class);
      


    }
}
