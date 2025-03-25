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
        Schema::create('episodios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('serie_id');
            $table->integer('temporada');
            $table->integer('numero_episodio');
            $table->string('titulo');
            $table->timestamps();

            $table->foreign('serie_id')->references('id')->on('peliculas_series')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodios');
    }
};
