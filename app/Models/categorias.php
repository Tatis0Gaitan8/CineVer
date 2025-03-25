<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    public function peliculasSeries()
    {
        return $this->belongsToMany(series_peliculas::class, 'pelicula_serie_categoria', 'categoria_id', 'pelicula_serie_id');
    }
}
