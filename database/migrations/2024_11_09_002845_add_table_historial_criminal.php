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
        Schema::create('historial_criminal', function (Blueprint $table) { // 'criminal_history' -> 'historial_criminal'
            $table->id();
            $table->unsignedBigInteger('usuario_id'); // 'user_id' -> 'user_id'
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('antecedentes_penales')->default(false); // 'criminal_record' -> 'antecedentes_penales'
            $table->string('detalles_antecedentes_penales', 254)->nullable(); // 'criminal_record_details' -> 'detalles_antecedentes_penales'
            $table->boolean('inhabilitacion')->default(false); // 'has_been_disabled' -> 'ha_sido_inhabilitado'
            $table->string('detalles_inhabilitacion', 254)->nullable(); // 'has_been_disabled_details' -> 'detalles_inhabilitacion'
            $table->boolean('nombre_en_lista_negra')->default(false); // 'name_in_blacklist' -> 'nombre_en_lista_negra'
            $table->string('detalles_lista_negra', 254)->nullable(); // 'name_in_blacklist_details' -> 'detalles_lista_negra'
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_criminal'); // 'criminal_history' -> 'historial_criminal'
    }
};
