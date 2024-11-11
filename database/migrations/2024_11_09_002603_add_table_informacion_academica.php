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
        Schema::create('informacion_academica', function (Blueprint $table) { // 'academic_info' -> 'informacion_academica'
            $table->id();
            $table->unsignedBigInteger('user_id'); // 'user_id' -> 'user_id'
            $table->foreign('user_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->boolean('titulo_derecho')->default(false); // 'tittle_law' -> 'titulo_derecho'
            $table->string('promedio', 5); // 'average' -> 'promedio'
            $table->string('nombre_escuela', 100); // 'name_school' -> 'nombre_escuela'
            $table->string('id_profesional', 15)->nullable(); // 'professionalID' -> 'id_profesional'
            $table->string('anios_practica', 2); // 'years_practice' -> 'anos_practica'
            $table->string('anios_practica_area_legal', 2); // 'years_practice_legal_area' -> 'anos_practica_area_legal'
            $table->string('promedio_posicion', 100)->nullable(); // 'average_position' -> 'promedio_posicion'
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacion_academica'); // 'academic_info' -> 'informacion_academica'
    }
};
