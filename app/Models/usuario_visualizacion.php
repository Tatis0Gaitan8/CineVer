<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario_visualizacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'pelicula_serie_id',
        'estado',
        'fecha_actualizacion',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id');
    }

    public function peliculaSerie()
    {
        return $this->belongsTo(series_peliculas::class, 'pelicula_serie_id');
    }
}
