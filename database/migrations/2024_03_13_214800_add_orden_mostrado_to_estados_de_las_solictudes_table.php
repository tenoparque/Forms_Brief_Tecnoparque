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
        Schema::table('estados_de_las_solictudes', function (Blueprint $table) {
            $table->integer('orden_mostrado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('estados_de_las_solictudes', function (Blueprint $table) {
            $table->dropColumn('orden_mostrado');
        });
    }
};
