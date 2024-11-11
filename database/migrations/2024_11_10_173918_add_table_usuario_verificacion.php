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
        Schema::table('users', function (Blueprint $table) { // 'users' -> 'usuarios'
            $table->string('verification_code')->nullable(); // Mantener en inglés para autenticación
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) { // 'users' -> 'usuarios'
            $table->dropColumn('verification_code'); // Mantener en inglés para autenticación
        });
    }
};
