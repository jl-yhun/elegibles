<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail // 'User' -> 'Usuario'
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre', // 'name' -> 'nombre'
        'email', // Mantener en inglés para autenticación
        'password', // Mantener en inglés para autenticación
        'apellido_paterno',
        'apellido_materno',
        'telefono',
        'registro_completado', // 'registration_completed' -> 'registro_completado'
        'verification_code', // Mantener en inglés para autenticación
    ];

    /**
     * Los atributos que deben estar ocultos para la serialización.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password', // Mantener en inglés para autenticación
        'remember_token', // Mantener en inglés para autenticación
    ];

    /**
     * Obtén los atributos que deben ser casteados.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Mantener en inglés para autenticación
            'password' => 'hashed', // Mantener en inglés para autenticación
        ];
    }

    public function informacionGeneral(): \Illuminate\Database\Eloquent\Relations\HasOne // 'generalInfo' -> 'informacionGeneral'
    {
        return $this->hasOne(InformacionGeneral::class); // 'GeneralInfo' -> 'InformacionGeneral'
    }
}
