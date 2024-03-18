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
        Schema::table('elementos_por_solicitudes', function (Blueprint $table) {
            $table->string('otro_servicio')->nullable(); // Ejemplo de un nuevo campo de tipo string que permite valores nulos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('elementos_por_solicitudes', function (Blueprint $table) {
            $table->dropColumn('otro_servicio'); // Ejemplo de un nuevo campo de tipo string que permite valores nulos
        });
    }
};
