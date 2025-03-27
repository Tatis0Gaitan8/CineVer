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
        Schema::create('pelicula_serie_categorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelicula_serie_id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('nombre');
            $table->unsignedBigInteger('Tipo');
            $table->timestamps();

            $table->foreign('Series_peliculas_id')->references('id')->on('Series_peliculas')->onDelete('cascade');
            $table->foreign('categorias_id')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelicula_serie_categorias');
    }
};



