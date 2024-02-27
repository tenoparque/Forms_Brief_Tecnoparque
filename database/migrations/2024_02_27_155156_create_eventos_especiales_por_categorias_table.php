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
        Schema::create('eventos_especiales_por_categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 200);
            $table->unsignedBigInteger('id_estado');
            $table->unsignedBigInteger('id_eventos_especiales');
            $table->foreign('id_estado')->references('id')->on('estados');
            $table->foreign('id_eventos_especiales')->references('id')->on('categorias_eventos_especiales');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos_especiales_por_categorias');
    }
};
