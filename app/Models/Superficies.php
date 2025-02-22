<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superficies extends Model
{
    /** @use HasFactory<\Database\Factories\SuperficiesFactory> */
    use HasFactory;
    
    // protected $table = 'superficies';
    // Propiedad protegida que define qué atributos de un modelo se pueden asignar de forma masiva
    protected $fillable = ['nombre'];

    // Relación uno a muchos Superficies - Torneo. De 1 superficie son muchos torneos.
    public function torneos()
    {
        return $this->hasMany(Torneo::class);
    }
}
