<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('historial_de_estados_por_solicitudes', function (Blueprint $table) {
            $table->id();
            $table -> unsignedBigInteger('id_estados_s');
            $table -> unsignedBigInteger('id_solicitudes');
            $table -> unsignedBigInteger('id_users');
            $table -> timestamp('fecha_de_cambio_de_estado');
            $table -> foreign('id_estados_s')->references('id')-> on ('estados_de_las_solictudes');
            $table -> foreign('id_solicitudes')->references('id')-> on ('solicitudes');
            $table -> foreign('id_users')->references('id')-> on ('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_de_estados_por_solicitudes');
    }
};
