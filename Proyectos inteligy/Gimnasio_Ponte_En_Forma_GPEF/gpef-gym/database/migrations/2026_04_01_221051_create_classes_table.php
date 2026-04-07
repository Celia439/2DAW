<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('nombre'); // Nombre de la clase (Yoga, Zumba...)
            $table->text('descripcion')->nullable(); // Descripción larga
            $table->integer('duracion'); // Minutos
            $table->integer('capacidad'); // Plazas disponibles
            $table->string('imagen')->nullable(); // Ruta de la foto

            // Relación con el entrenador (un usuario)
            $table->foreignId('entrenador_id')->constrained('users')->onDelete('cascade');

            $table->timestamps(); // Esto crea created_at y updated_at automáticamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clases');
    }
};
