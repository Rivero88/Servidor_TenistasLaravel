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
        Schema::create('titulos', function (Blueprint $table) {
            $table->id();// crea una clave primaria y autoincrement por defecto
            $table->integer(column: 'anno');
            // Asocia el titulo al tenista y al torneo por el id (foreignId('----')).
            // Clave foranea (constrained('----')) .
            $table->foreignId('tenista_id')->constrained('tenistas'); 
            $table->foreignId('torneo_id')->constrained('torneos'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titulos');
    }
};
