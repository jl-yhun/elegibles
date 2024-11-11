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
        Schema::create('tokens_acceso_personal', function (Blueprint $table) { // 'personal_access_tokens' -> 'tokens_acceso_personal'
            $table->id();
            $table->morphs('tokenable'); // No se traduce ya que es una convención de Laravel
            $table->string('nombre'); // 'name' -> 'nombre'
            $table->string('token', 64)->unique();
            $table->text('habilidades')->nullable(); // 'abilities' -> 'habilidades'
            $table->timestamp('ultimo_uso')->nullable(); // 'last_used_at' -> 'ultimo_uso_en'
            $table->timestamp('expiracion')->nullable(); // 'expires_at' -> 'expira_en'
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('tokens_acceso_personal'); // 'personal_access_tokens' -> 'tokens_acceso_personal'
    }
};
