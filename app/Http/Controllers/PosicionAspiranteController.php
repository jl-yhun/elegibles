<?php

namespace App\Http\Controllers;

use App\Models\PosicionAspirante;
use Illuminate\Http\Request;

class PosicionAspiranteController extends Controller
{
    /**
     * Muestra una lista del recurso.
     */
    public function index()
    {
        $positions = PosicionAspirante::all();
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

        $positionAspire = PosicionAspirante::create($validated);
        return response()->json($positionAspire, 201);
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show($id)
    {
        $positionAspire = PosicionAspirante::findOrFail($id);
        return response()->json($positionAspire);
    }

    /**
     * Actualiza el recurso especificado.
     */
    public function update(Request $request, $id)
    {
        $positionAspire = PosicionAspirante::findOrFail($id);

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
        $positionAspire = PosicionAspirante::findOrFail($id);
        $positionAspire->delete();
        return response()->json(['mensaje' => 'Registro eliminado exitosamente']);
    }
}
