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
        Schema::create('personalizaciones', function (Blueprint $table) {
            $table->id();
            $table -> binary('logo');
            $table -> string('color_principal', 30);
            $table -> string('color_secundario', 30);
            $table -> string('color_terciario', 30);
            $table -> unsignedBigInteger('id_users');
            $table -> unsignedBigInteger('id_estado');
            $table -> foreign('id_estado')->references('id')-> on ('estados');
            $table -> foreign('id_users')->references('id')-> on ('users');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personalizaciones');
    }
};
