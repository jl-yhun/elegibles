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
        Schema::create('sentencia_usuario', function (Blueprint $table) { // 'sentence_user' -> 'sentencia_usuario'
            $table->id();
            $table->unsignedBigInteger('usuario_id'); // 'user_id' -> 'user_id'
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('sentencia'); // 'sentence' -> 'sentencia'
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('sentencia_usuario'); // 'sentence_user' -> 'sentencia_usuario'
    }
};
