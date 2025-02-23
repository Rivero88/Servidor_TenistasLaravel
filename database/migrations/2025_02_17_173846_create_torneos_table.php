<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('torneos', function (Blueprint $table) {
            $table->id();// crea una clave primaria y autoincrement por defecto
            $table->string(column: 'nombre', length:60);
            $table->string(column: 'ciudad', length:60);
            // Asocia el torneo a la superficie por el id (foreignId('superficie_id')). // Clave foranea (constrained('superficies')) .
            $table->foreignId('superficie_id')->constrained('superficies'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('torneos');
    }
};
