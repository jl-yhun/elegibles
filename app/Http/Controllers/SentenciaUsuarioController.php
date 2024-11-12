<?php

namespace App\Http\Controllers;

use App\Models\SentenciaUsuario;
use Illuminate\Http\Request;

class SentenciaUsuarioController extends Controller
{
    /**
     * Muestra una lista del recurso.
     */
    public function index()
    {
        $sentenceUsers = SentenciaUsuario::all();
        return response()->json($sentenceUsers);
    }

    /**
     * Almacena un nuevo recurso.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'requerido|exists:users,id',
            'sentencia' => 'requerido|cadena',
        ]);

        $sentenceUser = SentenciaUsuario::create($validated);
        return response()->json($sentenceUser, 201);
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show($id)
    {
        $sentenceUser = SentenciaUsuario::findOrFail($id);
        return response()->json($sentenceUser);
    }

    /**
     * Actualiza el recurso especificado.
     */
    public function update(Request $request, $id)
    {
        $sentenceUser = SentenciaUsuario::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'requerido|exists:users,id',
            'sentencia' => 'requerido|cadena',
        ]);

        $sentenceUser->update($validated);
        return response()->json($sentenceUser);
    }

    /**
     * Elimina el recurso especificado.
     */
    public function destroy($id)
    {
        $sentenceUser = SentenciaUsuario::findOrFail($id);
        $sentenceUser->delete();
        return response()->json(['mensaje' => 'Registro eliminado exitosamente']);
    }
}
