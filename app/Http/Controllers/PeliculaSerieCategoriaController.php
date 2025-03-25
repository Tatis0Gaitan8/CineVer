<?php

namespace App\Http\Controllers;

use App\Models\pelicula_serie_categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeliculaSerieCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peliculaSerieCategorias = Pelicula_Serie_Categoria::all();
        return response()->json($peliculaSerieCategorias);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pelicula_serie_id' => 'required|exists:peliculas_series,id',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $peliculaSerieCategoria = Pelicula_Serie_Categoria::create($request->all());
        return response()->json($peliculaSerieCategoria, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $peliculaSerieCategoria = Pelicula_Serie_Categoria::find($id);
        if (!$peliculaSerieCategoria) {
            return response()->json(['message' => 'Relación Película/Serie-Categoría no encontrada'], 404);
        }
        return response()->json($peliculaSerieCategoria);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelicula_serie_categoria $pelicula_serie_categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $peliculaSerieCategoria = Pelicula_Serie_Categoria::find($id);
        if (!$peliculaSerieCategoria) {
            return response()->json(['message' => 'Relación Película/Serie-Categoría no encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'pelicula_serie_id' => 'exists:peliculas_series,id',
            'categoria_id' => 'exists:categorias,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $peliculaSerieCategoria->update($request->all());
        return response()->json($peliculaSerieCategoria);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $peliculaSerieCategoria = Pelicula_Serie_Categoria::find($id);
        if (!$peliculaSerieCategoria) {
            return response()->json(['message' => 'Relación Película/Serie-Categoría no encontrada'], 404);
        }
        $peliculaSerieCategoria->delete();
        return response()->json(['message' => 'Relación Película/Serie-Categoría eliminada']);
    }
    }

