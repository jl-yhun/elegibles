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
        Schema::create('informacion_residencial', function (Blueprint $table) { // 'residential_info' -> 'informacion_residencial'
            $table->id();
            $table->unsignedBigInteger('usuario_id'); // 'user_id' -> 'user_id'
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nacionalidades', 254)->nullable(); // 'nationalities' -> 'nacionalidades'
            $table->boolean('residencia_ultimo_anio')->default(true); // 'residence_last_year' -> 'residencia_ultimo_ano'
            $table->date('fuera_mexico_desde')->nullable(); // 'outside_of_mexico_from' -> 'fuera_mexico_desde'
            $table->date('fuera_mexico_hasta')->nullable(); // 'outside_of_mexico_until' -> 'fuera_mexico_hasta'
            $table->string('paises', 254)->nullable(); // 'countries' -> 'paises'
            $table->string('detalles_paises', 254)->nullable(); // 'countries_details' -> 'detalles_paises'
            $table->string('certificado_residencial', 254)->nullable(); // 'residential_certificate' -> 'certificado_residencial'
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacion_residencial'); // 'residential_info' -> 'informacion_residencial'
    }
};
