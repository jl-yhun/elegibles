<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * La contraseña actual que está siendo utilizada por la fábrica.
     */
    protected static ?string $password;

    /**
     * Define el estado predeterminado del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(), // 'name' -> 'nombre'
            'email' => fake()->unique()->safeEmail(), // 'email' -> 'email'
            'email_verified_at' => now(), // 'email_verified_at' -> 'email_verified_at'
            'password' => static::$password ??= Hash::make('password'), // 'password' -> 'contrasenia'
            'remember_token' => Str::random(10), // 'remember_token' -> 'token_recordatorio'
        ];
    }

    /**
     * Indica que la dirección de correo del modelo debe estar sin verificar.
     */
    public function sin_verificar(): static // 'unverified' -> 'sin_verificar'
    {
        return $this->state(fn (array $atributos) => [ // 'attributes' -> 'atributos'
            'email_verified_at' => null, // 'email_verified_at' -> 'email_verified_at'
        ]);
    }
}
