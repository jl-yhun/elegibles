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
        Schema::create('posiciones_aspirantes', function (Blueprint $table) { // 'positions_aspire' -> 'posiciones_aspirantes'
            $table->id();
            $table->unsignedBigInteger('user_id'); // 'user_id' -> 'user_id'
            $table->foreign('user_id')->references('id')->on('usuarios');
            $table->string('nombre', 20); // 'name' -> 'nombre'
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('posiciones_aspirantes'); // 'positions_aspire' -> 'posiciones_aspirantes'
    }
};
