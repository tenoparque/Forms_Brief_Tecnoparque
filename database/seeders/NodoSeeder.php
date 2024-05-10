<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Nodo;


class NodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nodo::create([
            'nombre' => 'Nodo Bucaramanga',
            'id_estado'=> 1,
            'id_ciudad'=> 866,
    ]);
    }
}
