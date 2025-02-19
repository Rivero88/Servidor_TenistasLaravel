<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Superficies;  // importar el modelo Superficies

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Torneos>
 */
class TorneosFactory extends Factory
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
            'nombre' => $this->faker->word() . ' Open',  // Nombre aleatorio con "Open" agregado
            'ciudad' => $this->faker->city(),  // Ciudad aleatoria (ej. 'Madrid', 'París')
            // 'superficie_id' => Superficies::factory(),  // Relación con Superficies
            'superficie_id' => Superficies::inRandomOrder()->first()->id ?? Superficies::factory()->create()->id,

        ];
    }
}
