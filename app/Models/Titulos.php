<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titulos extends Model
{
    /** @use HasFactory<\Database\Factories\TitulosFactory> */
    use HasFactory;

    // Propiedad protegida que define qué atributos de un modelo se pueden asignar de forma masiva
    protected $fillable = ['anno', 'tenista_id', 'torneo_id'];

    // Relación muchos a uno con Titulos - Tenista. muchos titulos ganados por 1 tenista
    public function tenista()
    {
        return $this->belongsTo(Tenistas::class, 'tenista_id');
    }

    // Relación muchos a uno con Titulos - Torneo. Muchos titulos (por año) de un torneo son ganados por tenistas 
    public function torneo()
    {
        return $this->belongsTo(Torneos::class, 'torneo_id');
    }
}
