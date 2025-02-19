<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Superficies>
 */
class SuperficiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // randomElement para que se elija uno de los elementos de dentro de array
            'nombre' => $this->faker->unique()->randomElement(['Pista dura', 'Hierba', 'Tierra batida']),  // Tipos de superficies
        ];
    }
}
