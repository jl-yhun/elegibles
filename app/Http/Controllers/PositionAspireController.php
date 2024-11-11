<?php

namespace App\Http\Controllers;

use App\Models\PositionAspire;
use Illuminate\Http\Request;

class PositionAspireController extends Controller
{
    /**
     * Muestra una lista del recurso.
     */
    public function index()
    {
        $positions = PositionAspire::all();
        return response()->json($positions);
    }

    /**
     * Almacena un nuevo recurso.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'requerido|exists:users,id',
            'nombre' => 'requerido|cadena|max:20',
        ]);

        $positionAspire = PositionAspire::create($validated);
        return response()->json($positionAspire, 201);
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show($id)
    {
        $positionAspire = PositionAspire::findOrFail($id);
        return response()->json($positionAspire);
    }

    /**
     * Actualiza el recurso especificado.
     */
    public function update(Request $request, $id)
    {
        $positionAspire = PositionAspire::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'requerido|exists:users,id',
            'nombre' => 'requerido|cadena|max:20',
        ]);

        $positionAspire->update($validated);
        return response()->json($positionAspire);
    }

    /**
     * Elimina el recurso especificado.
     */
    public function destroy($id)
    {
        $positionAspire = PositionAspire::findOrFail($id);
        $positionAspire->delete();
        return response()->json(['mensaje' => 'Registro eliminado exitosamente']);
    }
}