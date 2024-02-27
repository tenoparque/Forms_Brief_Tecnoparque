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
        Schema::create('historial_de_usuarios_por_solicitudes', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('id_solicitudes');
            $table->unsignedBigInteger ('id_users');
            $table -> timestamp("fecha_asignación");
            $table -> unsignedBigInteger('id_estados');
            $table -> foreign('id_solicitudes')->references('id')-> on ('solicitudes');
            $table -> foreign('id_users')->references('id')-> on ('users');
            $table -> foreign('id_estados')->references('id')-> on ('estados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_de_usuarios_por_solicitudes');
    }
};
