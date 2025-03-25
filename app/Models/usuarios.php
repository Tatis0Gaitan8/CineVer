<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class usuarios extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nombre',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function peliculasSeriesVistas()
    {
        return $this->belongsToMany(series_peliculas::class, 'usuario_visualizacion', 'usuario_id', 'pelicula_serie_id')
            ->withPivot('estado', 'fecha_actualizacion');
    }
}