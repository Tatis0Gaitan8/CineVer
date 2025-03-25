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
            $table->timestamps();

            $table->foreign('pelicula_serie_id')->references('id')->on('peliculas_series')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
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
