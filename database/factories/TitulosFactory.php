<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tenistas;  // importar el modelo Tenistas
use App\Models\Torneos;  // importar el modelo Torneos

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Titulos>
 */
class TitulosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Vamos a usar faker para generar datos aleatorios y enlazar con las otras tablas
       return [
        // randomElement para que se elija fecha dentro del rango
        'anno' => $this->faker->randomElement(range(1960, 2025)), 
        'tenista_id' => Tenistas::inRandomOrder()->first()->id ?? Tenistas::factory()->create()->id,// Relación con Tenistas
        'torneo_id' => Torneos::inRandomOrder()->first()->id ?? Torneos::factory()->create()->id,// Relación con Torneos
        ];
    }
}
