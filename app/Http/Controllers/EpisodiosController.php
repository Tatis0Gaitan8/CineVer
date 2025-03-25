<?php

namespace App\Http\Controllers;

use App\Models\episodios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EpisodiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $episodios = episodios::all();
        return response()->json($episodios);
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
            'serie_id' => 'required|exists:peliculas_series,id',
            'temporada' => 'required|integer',
            'numero_episodio' => 'required|integer',
            'titulo' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $episodio = episodios::create($request->all());
        return response()->json($episodio, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $episodio = episodios::find($id);
        if (!$episodio) {
            return response()->json(['message' => 'Episodio no encontrado'], 404);
        }
        return response()->json($episodio);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(episodios $episodios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $episodio = episodios::find($id);
        if (!$episodio) {
            return response()->json(['message' => 'Episodio no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'serie_id' => 'exists:peliculas_series,id',
            'temporada' => 'integer',
            'numero_episodio' => 'integer',
            'titulo' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $episodio->update($request->all());
        return response()->json($episodio);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $episodio = episodios::find($id);
        if (!$episodio) {
            return response()->json(['message' => 'Episodio no encontrado'], 404);
        }
        $episodio->delete();
        return response()->json(['message' => 'Episodio eliminado']);
    }
}
