<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Machine>
 */
class MachineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
            'numero_maquina' => $this->faker->numberBetween(1, 20),
            'ubicacion' => $this->faker->randomElement([
                'Colegio Las Mercedes',
                'C.C La Central',
                'Hospital Municipal',
                'C.C Santa Fé'
            ]),
            'estado_stock' => $this->faker->randomElement([
                'normal',
                'bajo',
                'critico'
            ]),
        ];
    }
}
