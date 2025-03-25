<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelicula_serie_categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelicula_serie_id',
        'categoria_id',
    ];

    public function peliculaSerie()
    {
        return $this->belongsTo(series_peliculas::class, 'pelicula_serie_id');
    }

    public function categoria()
    {
        return $this->belongsTo(categorias::class, 'categoria_id');
    }
}
