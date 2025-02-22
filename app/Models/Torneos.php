<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneos extends Model
{
    /** @use HasFactory<\Database\Factories\TorneosFactory> */
    use HasFactory;

    // Propiedad protegida que define qué atributos de un modelo se pueden asignar de forma masiva
    protected $fillable = ['nombre', 'ciudad', 'superficie_id'];

    // Relación muchos a uno con Torneo - Superficies. Muchos torneos tiene 1 misma superficie
    public function superficies()
    {
        return $this->belongsTo(Superficies::class, 'superficie_id');
    }

    // Relación uno a muchos con Torneo - Titulos. 1 torneo tiene muchos titulos (por año) ganados por tenistas
    public function titulos()
    {
        return $this->hasMany(Titulos::class);
    }
}
