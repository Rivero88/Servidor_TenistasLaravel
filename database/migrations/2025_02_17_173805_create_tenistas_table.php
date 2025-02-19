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
        Schema::create('tenistas', function (Blueprint $table) {
            $table->id(); // crea una clave primaria y autoincrement por defecto
            $table->string(column: 'nombre', length:50);
            $table->string(column: 'apellidos', length:100);
            $table->enum('mano', ['diestro', 'zurdo']);
            $table->integer('altura');
            $table->integer('anno_nacimiento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenistas');
    }
};
