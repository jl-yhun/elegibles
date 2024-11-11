<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Usuario::factory(10)->create();

        User::factory()->create([
            'nombre' => 'Test User',
            'apellido_paterno'=> 'Test',
            'apellido_materno'=>'Test',
            'email' => 'test@example.com',
        ]);
    }
}
