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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('celular', 25);
            $table->string('apellidos', 50);
            $table->unsignedBigInteger('id_nodo')->nullable();
            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_nodo')->references('id')->on('nodos');
            $table->foreign('id_estado')->references('id')->on('estados');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
