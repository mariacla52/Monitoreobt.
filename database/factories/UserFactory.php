<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Factory para la creación de usuarios de prueba
 * 
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Definición del modelo de datos del usuario
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(), // Nombre completo del usuario 
            'email' => fake()->unique()->safeEmail(), // Correo electrónico del usuario 
            'celular' => fake()->phoneNumber(), // Numero celular del usuario 
            'tipo_usuario' => fake()->randomElement(['proveedor', 'analista', 'administrador']), // Tipo de usuario que esta ingresando
            'password' => bcrypt('password123'),  // Contraseña
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
