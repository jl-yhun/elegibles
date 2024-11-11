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
        Schema::create('users', function (Blueprint $table) { // 'users' -> 'usuarios'
            $table->id();
            $table->string('nombre'); // 'name' -> 'nombre'
            $table->string('email')->unique(); // Mantener en inglés para autenticación
            $table->timestamp('email_verified_at')->nullable(); // Mantener en inglés para autenticación
            $table->string('password'); // Mantener en inglés para autenticación
            $table->rememberToken(); // Mantener en inglés para autenticación
            $table->timestamps(); // Mantener created_at y updated_at en inglés para autenticación
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) { // 'password_reset_tokens' -> 'tokens_recuperacion'
            $table->string('email')->primary(); // Mantener en inglés para autenticación
            $table->string('token');
            $table->timestamp('created_at')->nullable(); // Mantener en inglés para autenticación
        });
 
        Schema::create('sessions', function (Blueprint $table) { // 'sessions' -> 'sesiones'
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index(); // 'user_id' -> 'user_id'
            $table->string('ip_address', 45)->nullable(); // 'direccion_ip' -> 'ip_address'
            $table->text('user_agent')->nullable(); // 'agente_usuario' -> 'user_agent'
            $table->longText('payload'); // 'carga_util' -> 'payload'
            $table->integer('last_activity')->index(); // 'ultima_conexion' -> 'last_activity'
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('users'); // 'users' -> 'usuarios'
        Schema::dropIfExists('password_reset_tokens'); 
        Schema::dropIfExists('sessions'); // 'sessions' -> 'sesiones'
    }
};
