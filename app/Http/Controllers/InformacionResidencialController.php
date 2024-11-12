<?php

namespace App\Http\Controllers;

use App\Models\InformacionResidencial;
use Illuminate\Http\Request;

class InformacionResidencialController extends Controller
{
    /**
     * Muestra una lista del recurso.
     */
    public function index()
    {
        $residentialInfos = InformacionResidencial::all();
        return response()->json($residentialInfos);
    }

    /**
     * Almacena un nuevo recurso.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'requerido|exists:users,id',
            'nacionalidades' => 'nullable|cadena|max:254',
            'residencia_ultimo_anio' => 'requerido|booleano',
            'fuera_mexico_desde' => 'nullable|date',
            'fuera_mexico_hasta' => 'nullable|date',
            'paises' => 'nullable|cadena|max:254',
            'detalles_paises' => 'nullable|cadena|max:254',
            'certificado_residencial' => 'nullable|cadena|max:254',
        ]);

        $residentialInfo = InformacionResidencial::create($validated);
        return response()->json($residentialInfo, 201);
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show($id)
    {
        $residentialInfo = InformacionResidencial::findOrFail($id);
        return response()->json($residentialInfo);
    }

    /**
     * Actualiza el recurso especificado.
     */
    public function update(Request $request, $id)
    {
        $residentialInfo = InformacionResidencial::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'requerido|exists:users,id',
            'nacionalidades' => 'nullable|cadena|max:254',
            'residencia_ultimo_anio' => 'requerido|booleano',
            'fuera_mexico_desde' => 'nullable|date',
            'fuera_mexico_hasta' => 'nullable|date',
            'paises' => 'nullable|cadena|max:254',
            'detalles_paises' => 'nullable|cadena|max:254',
            'certificado_residencial' => 'nullable|cadena|max:254',
        ]);

        $residentialInfo->update($validated);
        return response()->json($residentialInfo);
    }

    /**
     * Elimina el recurso especificado.
     */
    public function destroy($id)
    {
        $residentialInfo = InformacionResidencial::findOrFail($id);
        $residentialInfo->delete();
        return response()->json(['mensaje' => 'Registro eliminado exitosamente']);
    }
}
