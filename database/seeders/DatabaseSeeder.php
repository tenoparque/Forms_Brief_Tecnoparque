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
        $this->call(DepartamentoSeeder::class);
        $this->call(CiudadSeeder::class);
        $this->call(EstadosSeeder::class);
        $this->call(TipoDatosSeeder::class);
        $this->call(NodoSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PermissionSeeder::class); // Calling the PermissionSeeder
        $this->call(AssigningPermissionsToRolesSeeder::class);
        $this->call(PersonalizacionSeeder::class);
        $this->call(TipoSolicitudesSeeder::class);
        $this->call(DatosUnicoXSolicitudesSeeder::class);
        $this->call(ServiciosXTiposSolicitudesSeeder::class);
        $this->call(EstadoSolicitudesSeeder::class);
        $this->call(CategoriaSeeder::class);
    }
}
