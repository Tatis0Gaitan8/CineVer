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
        Schema::create('series_peliculas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->integer('anio')->nullable();
            $table->enum('tipo', ['Serie', 'Pelicula']);
            $table->string('director')->nullable();
            $table->text('sinopsis')->nullable();
            $table->timestamps();
        });
    }
    
    /**
    
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('series_peliculas');
    }
};
