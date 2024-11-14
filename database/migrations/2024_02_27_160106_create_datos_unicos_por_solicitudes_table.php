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
        Schema::create('datos_unicos_por_solicitudes', function (Blueprint $table) {
            $table->id();
            $table -> string('nombre', 255);
            $table->string('descripcion',255);
            $table -> unsignedBigInteger('id_tipos_de_datos');
            $table -> unsignedBigInteger('id_tipos_de_solicitudes');
            $table -> unsignedBigInteger('id_estados');
            $table -> foreign('id_tipos_de_datos')->references('id')-> on ('tipos_de_datos');
            $table -> foreign('id_tipos_de_solicitudes')->references('id')-> on ('tipos_de_solicitudes');
            $table -> foreign('id_estados')->references('id')-> on ('estados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_unicos_por_solicitudes');
    }
};
