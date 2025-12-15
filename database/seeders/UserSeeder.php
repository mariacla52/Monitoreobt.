<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
/**
 * Seeder para insertar usuarios de prueba en la base de datos
 */
class UserSeeder extends Seeder
{
    /**
     * Ejecutar datos de usuarios 
     */
    public function run(): void
    {
        // Modificamos para crear 10 usuarios de prueba 
        User::factory()->count(10)->create();
    }
}
