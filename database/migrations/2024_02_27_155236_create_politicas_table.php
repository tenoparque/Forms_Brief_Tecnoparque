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
        Schema::create('politicas', function (Blueprint $table) {
            $table->id();
            $table->text('link');
            $table->text('descripcion');
            $table->binary('qr');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_estado');
            $table->text('titulo');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_estado')->references('id')->on('estados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('politicas');
    }
};
