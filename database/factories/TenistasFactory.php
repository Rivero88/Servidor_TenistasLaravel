<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenistas>
 */
class TenistasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       // Vamos a usar faker para generar datos aleatorios
       return [
        'nombre' => $this->faker->firstName(),
        'apellidos' => $this->faker->lastName(),
        // randomElement para que se elija uno de los elementos de dentro de array
        'mano' => $this->faker->randomElement(['Diestro', 'Zurdo']),
        'altura' => $this->faker->numberBetween(170,210),
        // $this->faker->date('Y');  // Ejemplo: '2025'
        'anno_nacimiento' => $this->faker->numberBetween(1980,2008),
        ];
    }
}
