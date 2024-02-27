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
        Schema::create('servicios_por_tipos_de_solicitudes', function (Blueprint $table) {
            $table->id();
            $table -> text('nombre');
            $table -> unsignedBigInteger('id_tipo_de_solicitud');
            $table -> unsignedBigInteger('id_estado');
            $table -> foreign('id_tipo_de_solicitud')->references('id')-> on ('tipos_de_solicitudes');
            $table -> foreign('id_estado')->references('id')-> on ('estados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios_por_tipos_de_solicitudes');
    }
};
