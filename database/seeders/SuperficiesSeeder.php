<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Superficies;

class SuperficiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Al ponerlo aqui a mano sustiye lo que he puesto en el randomElement del factory.
     */
    public function run(): void
    {
        Superficies::factory()->create(['nombre' => 'Pista dura']);
        Superficies::factory()->create(['nombre' => 'Hierba']);
        Superficies::factory()->create(['nombre' => 'Tierra batida']);
    }
}
