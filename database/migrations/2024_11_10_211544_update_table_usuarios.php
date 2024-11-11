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
            $table->boolean('registro_completado')->default(false); // 'registration_completed' -> 'registro_completado'
            $table->string('telefono')->nullable();
            $table->string('apellido_paterno', 100);
            $table->string('apellido_materno', 100);
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) { // 'users' -> 'usuarios'
            $table->dropColumn('registro_completado'); // 'registration_completed' -> 'registro_completado'
            $table->dropColumn('telefono');
            $table->dropColumn('apellido_paterno');
            $table->dropColumn('apellido_materno');
        });
    }
};
