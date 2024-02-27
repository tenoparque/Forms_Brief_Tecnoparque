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
        Schema::create('estados_de_las_solictudes', function (Blueprint $table) {
            $table->id();
            $table ->string('nombre', 100);
            $table -> unsignedBigInteger('id_estado');
            $table -> foreign('id_estado')->references('id')->on('estados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estados_de_las_solictudes');
    }
};
