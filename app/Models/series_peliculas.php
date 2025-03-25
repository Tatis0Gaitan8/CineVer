<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class series_peliculas extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'anio',
        'tipo',
        'director',
        'sinopsis',
    ];

    public function categorias()
    {
        return $this->belongsToMany(categorias::class, 'pelicula_serie_categoria', 'pelicula_serie_id', 'categoria_id');
    }

    public function episodios()
    {
        return $this->hasMany(episodios::class, 'serie_id');
    }
}
