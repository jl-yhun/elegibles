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
        Schema::create('informacion_general', function (Blueprint $table) { // 'general_info' -> 'informacion_general'
            $table->id();
            $table->unsignedBigInteger('user_id'); // 'user_id' -> 'user_id'
            $table->foreign('user_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->string('nombre', 100); // 'name' -> 'nombre'
            $table->string('apellido_paterno', 100); // 'father_last_name' -> 'apellido_paterno'
            $table->string('apellido_materno', 100); // 'mother_last_name' -> 'apellido_materno'
            $table->string('genero', 15); // 'genre' -> 'genero'
            $table->string('curp', 18);
            $table->string('rfc', 13);
            $table->date('fecha_nacimiento'); // 'birth_date' -> 'fecha_nacimiento'
            $table->string('edad', 2); // 'age' -> 'edad'
            $table->string('lugar_nacimiento', 100); // 'place_of_birth' -> 'lugar_nacimiento'
            $table->string('dni', 15);
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacion_general'); // 'general_info' -> 'informacion_general'
    }
};
