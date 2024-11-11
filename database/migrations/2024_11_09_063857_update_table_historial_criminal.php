<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     */
    public function up(): void
    {
        Schema::table('historial_criminal', function (Blueprint $table) { // 'criminal_history' -> 'historial_criminal'
            $table->boolean('sentencia_final')->default(false); // 'final_sentence' -> 'sentencia_final'
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::table('historial_criminal', function (Blueprint $table) {
            $table->dropColumn('sentencia_final'); // 'final_sentence' -> 'sentencia_final'
        });
    }
};
