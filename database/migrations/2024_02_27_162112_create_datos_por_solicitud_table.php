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
        Schema::create('datos_por_solicitud', function (Blueprint $table) {
            $table->id();
            $table -> unsignedBigInteger('id_solicitudes');
            $table -> unsignedBigInteger('id_datos_unicos_por_solicitudes');
            $table -> text ('dato');
            $table -> foreign('id_solicitudes')->references('id')-> on ('solicitudes');
            $table -> foreign('id_datos_unicos_por_solicitudes')->references('id')-> on ('datos_unicos_por_solicitudes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_por_solicitud');
    }
};
