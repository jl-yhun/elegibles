<?php

namespace App\Http\Controllers;

use App\Models\ResidentialInfo;
use Illuminate\Http\Request;

class ResidentialInfoController extends Controller
{
    /**
     * Muestra una lista del recurso.
     */
    public function index()
    {
        $residentialInfos = ResidentialInfo::all();
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

        $residentialInfo = ResidentialInfo::create($validated);
        return response()->json($residentialInfo, 201);
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show($id)
    {
        $residentialInfo = ResidentialInfo::findOrFail($id);
        return response()->json($residentialInfo);
    }

    /**
     * Actualiza el recurso especificado.
     */
    public function update(Request $request, $id)
    {
        $residentialInfo = ResidentialInfo::findOrFail($id);

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
        $residentialInfo = ResidentialInfo::findOrFail($id);
        $residentialInfo->delete();
        return response()->json(['mensaje' => 'Registro eliminado exitosamente']);
    }
}