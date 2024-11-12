<?php

namespace App\Http\Controllers;

use App\Models\HistorialCriminal;
use Illuminate\Http\Request;

class HistorialCriminalController extends Controller
{
    /**
     * Muestra una lista del recurso.
     */
    public function index()
    {
        $criminalHistories = HistorialCriminal::all();
        return response()->json($criminalHistories);
    }

    /**
     * Almacena un nuevo recurso.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'requerido|exists:users,id',
            'antecedentes_penales' => 'requerido|booleano',
            'detalles_antecedentes_penales' => 'nullable|cadena|max:254',
            'inhabilitacion' => 'requerido|booleano',
            'detalles_inhabilitacion' => 'nullable|cadena|max:254',
            'nombre_en_lista_negra' => 'requerido|booleano',
            'detalles_lista_negra' => 'nullable|cadena|max:254',
            'sentencia_final' => 'requerido|booleano',
        ]);

        $criminalHistory = HistorialCriminal::create($validated);
        return response()->json($criminalHistory, 201);
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show($id)
    {
        $criminalHistory = HistorialCriminal::findOrFail($id);
        return response()->json($criminalHistory);
    }

    /**
     * Actualiza el recurso especificado.
     */
    public function update(Request $request, $id)
    {
        $criminalHistory = HistorialCriminal::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'requerido|exists:users,id',
            'antecedentes_penales' => 'requerido|booleano',
            'detalles_antecedentes_penales' => 'nullable|cadena|max:254',
            'inhabilitacion' => 'requerido|booleano',
            'detalles_inhabilitacion' => 'nullable|cadena|max:254',
            'nombre_en_lista_negra' => 'requerido|booleano',
            'detalles_lista_negra' => 'nullable|cadena|max:254',
            'sentencia_final' => 'requerido|booleano',
        ]);

        $criminalHistory->update($validated);
        return response()->json($criminalHistory);
    }

    /**
     * Elimina el recurso especificado.
     */
    public function destroy($id)
    {
        $criminalHistory = HistorialCriminal::findOrFail($id);
        $criminalHistory->delete();
        return response()->json(['mensaje' => 'Registro eliminado exitosamente']);
    }
}
