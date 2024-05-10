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
        Schema::create('elementos_por_solicitudes', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('id_solicitudes');
            $table ->unsignedBigInteger('id_subservicios');
            $table -> foreign('id_solicitudes')->references('id')-> on ('solicitudes');
            $table -> foreign('id_subservicios')->references('id')-> on ('servicios_por_tipos_de_solicitudes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elementos_por_solicitudes');
    }
};
