<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenistas extends Model
{
    /** @use HasFactory<\Database\Factories\TenistasFactory> */
    use HasFactory;

    // Propiedad protegida que define qué atributos de un modelo se pueden asignar de forma masiva
    protected $fillable = ['nombre', 'apellidos', 'mano', 'altura', 'anno_nacimiento'];

   // Relación uno a muchos con Tenista - Titulos. 1 tenista muchos titulos
   public function titulos()
   {
       return $this->hasMany(Titulos::class, 'tenista_id');
   }


}
