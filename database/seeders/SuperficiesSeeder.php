<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Superficies;

class SuperficiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Superficies::factory()->create(['nombre' => 'Pista dura']);
        Superficies::factory()->create(['nombre' => 'Hierba']);
        Superficies::factory()->create(['nombre' => 'Tierra batida']);
    }
}
