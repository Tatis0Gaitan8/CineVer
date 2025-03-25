<?php


use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PeliculaSerieController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EpisodioController;
use App\Http\Controllers\PeliculaSerieCategoriaController;
use App\Http\Controllers\UsuarioVisualizacionController;
use App\Models\categorias;
use App\Models\episodios;
use App\Models\series_peliculas;
use App\Models\usuarios;
use Illuminate\Support\Facades\Route;

// Rutas para Usuarios
Route::resource('usuarios', usuarios::class);

// Rutas para PeliculasSeries
Route::resource('peliculas_series', series_peliculas::class);

// Rutas para Categorias
Route::resource('categorias', categorias::class);

// Rutas para Episodios
Route::resource('episodios', episodios::class);

// Rutas para PeliculaSerieCategoria
Route::resource('pelicula_serie_categorias', PeliculaSerieCategoriaController::class);

// Rutas para UsuarioVisualizacion
Route::resource('usuario_visualizacions', UsuarioVisualizacionController::class);