<?php

namespace App\Http\Controllers;

use App\Models\InformacionGeneral;
use Illuminate\Http\Request;

class InformacionGeneralController extends Controller
{
    /**
     * Muestra una lista del recurso.
     */
    public function index()
    {
        $generalInfos = InformacionGeneral::all();
        return response()->json($generalInfos);
    }

    /**
     * Almacena un nuevo recurso.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'requerido|exists:users,id',
            'nombre' => 'requerido|cadena|max:100',
            'apellido_paterno' => 'requerido|cadena|max:100',
            'apellido_materno' => 'requerido|cadena|max:100',
            'genero' => 'requerido|cadena|max:15',
            'curp' => 'requerido|cadena|max:18',
            'rfc' => 'requerido|cadena|max:13',
            'fecha_nacimiento' => 'requerido|date',
            'edad' => 'requerido|entero|max:2',
            'lugar_nacimiento' => 'requerido|cadena|max:100',
            'dni' => 'requerido|cadena|max:15',
        ]);

        $generalInfo = InformacionGeneral::create($validated);
        return response()->json($generalInfo, 201);
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show($id)
    {
        $generalInfo = InformacionGeneral::findOrFail($id);
        return response()->json($generalInfo);
    }

    /**
     * Actualiza el recurso especificado.
     */
    public function update(Request $request, $id)
    {
        $generalInfo = InformacionGeneral::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'requerido|exists:users,id',
            'nombre' => 'requerido|cadena|max:100',
            'apellido_paterno' => 'requerido|cadena|max:100',
            'apellido_materno' => 'requerido|cadena|max:100',
            'genero' => 'requerido|cadena|max:15',
            'curp' => 'requerido|cadena|max:18',
            'rfc' => 'requerido|cadena|max:13',
            'fecha_nacimiento' => 'requerido|date',
            'edad' => 'requerido|entero|max:2',
            'lugar_nacimiento' => 'requerido|cadena|max:100',
            'dni' => 'requerido|cadena|max:15',
        ]);

        $generalInfo->update($validated);
        return response()->json($generalInfo);
    }

    /**
     * Elimina el recurso especificado.
     */
    public function destroy($id)
    {
        $generalInfo = InformacionGeneral::findOrFail($id);
        $generalInfo->delete();
        return response()->json(['mensaje' => 'Registro eliminado exitosamente']);
    }
}
