<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class episodios extends Model
{
    use HasFactory;

    protected $fillable = [
        'serie_id',
        'temporada',
        'numero_episodio',
        'titulo',
    ];

    public function serie()
    {
        return $this->belongsTo(series_peliculas::class, 'serie_id');
    }
}
