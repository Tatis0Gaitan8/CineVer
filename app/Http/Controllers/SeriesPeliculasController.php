<?php

namespace App\Http\Controllers;

use App\Models\series_peliculas;
use Illuminate\Http\Request;

class SeriesPeliculasController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series_peliculas = series_peliculas::all();
        return response()->json($series_peliculas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('series_peliculas.create'); // Asegúrate de que esta vista exista
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'anio' => 'required|integer',
            'tipo' => 'required|in:Serie,Pelicula',
        ]);

        $peliculaSerie = series_peliculas::create($request->all());
        $peliculaSerie->categorias()->attach($request->categorias);

        return redirect()->route('peliculas_series.index');
    }
        
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        {
            $peliculaSerie = series_peliculas::find($id);
            if (!$peliculaSerie) {
                return response()->json(['message' => 'Película/Serie no encontrada'], 404);
            }
            return response()->json($peliculaSerie);
        }
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
    public function update(Request $request,$id)
    {
        $peliculaSerie = series_peliculas::find($id);
        if (!$peliculaSerie) {
            return response()->json(['message' => 'Película/Serie no encontrada'], 404);
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
