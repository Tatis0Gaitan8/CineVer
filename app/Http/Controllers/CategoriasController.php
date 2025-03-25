<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = categorias::all();
        return response()->json($categorias);
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
            'nombre' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $categoria = Categorias::create($request->all());
        return response()->json($categoria, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categoria = Categorias::find($id);
        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }
        return response()->json($categoria);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categorias $categorias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categoria = Categorias::find($id);
        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $categoria->update($request->all());
        return response()->json($categoria);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoria = categorias::find($id);
        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }
        $categoria->delete();
        return response()->json(['message' => 'Categoría eliminada']);
    }
}
