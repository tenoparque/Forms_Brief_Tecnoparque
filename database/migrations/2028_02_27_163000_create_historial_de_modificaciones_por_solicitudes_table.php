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
        Schema::create('historial_de_modificaciones_por_solicitudes', function (Blueprint $table) {
            $table->id();
            $table -> unsignedBigInteger('id_soli');
            $table -> text ('modificacion');
            $table -> timestamp('fecha_de_modificacion');
            $table -> foreign('id_soli')->references('id')-> on ('solicitudes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_de_modificaciones_por_solicitudes');
    }
};
