<?php

namespace App\Http\Controllers;

use App\Models\series_peliculas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SeriesPeliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peliculasSeries = Series_Peliculas::all();
        return response()->json($peliculasSeries);
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
            'titulo' => 'required|string|max:255',
            'anio' => 'nullable|integer',
            'tipo' => 'required|in:Serie,Pelicula',
            'director' => 'nullable|string|max:255',
            'sinopsis' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $peliculaSerie = series_peliculas::create($request->all());
        return response()->json($peliculaSerie, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $peliculaSerie = series_peliculas::find($id);
        if (!$peliculaSerie) {
            return response()->json(['message' => 'Película/Serie no encontrada'], 404);
        }
        return response()->json($peliculaSerie);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(series_peliculas $series_peliculas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $peliculaSerie = series_peliculas::find($id);
        if (!$peliculaSerie) {
            return response()->json(['message' => 'Película/Serie no encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'titulo' => 'string|max:255',
            'anio' => 'nullable|integer',
            'tipo' => 'in:Serie,Pelicula',
            'director' => 'nullable|string|max:255',
            'sinopsis' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $peliculaSerie->update($request->all());
        return response()->json($peliculaSerie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $peliculaSerie = series_peliculas::find($id);
        if (!$peliculaSerie) {
            return response()->json(['message' => 'Película/Serie no encontrada'], 404);
        }
        $peliculaSerie->delete();
        return response()->json(['message' => 'Película/Serie eliminada']);
    }
}
