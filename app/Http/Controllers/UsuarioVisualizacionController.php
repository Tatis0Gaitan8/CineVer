<?php

namespace App\Http\Controllers;

use App\Models\usuario_visualizacion;
use Illuminate\Http\Request;

class UsuarioVisualizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visualizaciones = Usuario_Visualizacion::all();
        return response()->json($visualizaciones);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $visualizacion = Usuario_Visualizacion::create($request->all());
        return response()->json($visualizacion, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $visualizacion = Usuario_Visualizacion::find($id);
        if (!$visualizacion) {
            return response()->json(['message' => 'Visualización no encontrada'], 404);
        }
        return response()->json($visualizacion);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(usuario_visualizacion $usuario_visualizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $visualizacion = Usuario_Visualizacion::find($id);
        if (!$visualizacion) {
            return response()->json(['message' => 'Visualización no encontrada'], 404);
        }
        $visualizacion->update($request->all());
        return response()->json($visualizacion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
        {
        $visualizacion = Usuario_Visualizacion::find($id);
        if (!$visualizacion) {
            return response()->json(['message' => 'Visualización no encontrada'], 404);
        }
        $visualizacion->delete();
        return response()->json(['message' => 'Visualización eliminada']);
    }
}
