<?php

namespace App\Http\Controllers;

use App\Models\InformacionAcademica;
use Illuminate\Http\Request;

class InformacionAcademicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicInfos = InformacionAcademica::all();
        return response()->json($academicInfos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id', // 'user_id' -> 'user_id'
            'titulo_derecho' => 'required|boolean', // 'tittle_law' -> 'titulo_derecho'
            'promedio' => 'nullable|string|max:5', // 'average' -> 'promedio'
            'nombre_escuela' => 'required|string|max:100', // 'name_school' -> 'nombre_escuela'
            'id_profesional' => 'nullable|string|max:15', // 'professionalID' -> 'id_profesional'
            'anos_practica' => 'required|string|max:2', // 'years_practice' -> 'anos_practica'
            'anos_practica_area_legal' => 'required|string|max:2', // 'years_practica_legal_area' -> 'anos_practica_area_legal'
            'promedio_posicion' => 'nullable|string|max:100', // 'average_position' -> 'promedio_posicion'
        ]);

        $academicInfo = InformacionAcademica::create($validated);
        return response()->json($academicInfo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $academicInfo = InformacionAcademica::findOrFail($id);
        return response()->json($academicInfo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $academicInfo = InformacionAcademica::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id', // 'user_id' -> 'user_id'
            'titulo_derecho' => 'required|boolean', // 'tittle_law' -> 'titulo_derecho'
            'promedio' => 'required|string|max:5', // 'average' -> 'promedio'
            'nombre_escuela' => 'required|string|max:100', // 'name_school' -> 'nombre_escuela'
            'id_profesional' => 'nullable|string|max:15', // 'professionalID' -> 'id_profesional'
            'anos_practica' => 'required|string|max:2', // 'years_practice' -> 'anos_practica'
            'anos_practica_area_legal' => 'required|string|max:2', // 'years_practica_legal_area' -> 'anos_practica_area_legal'
            'promedio_posicion' => 'nullable|string|max:100', // 'average_position' -> 'promedio_posicion'
        ]);

        $academicInfo->update($validated);
        return response()->json($academicInfo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $academicInfo = InformacionAcademica::findOrFail($id);
        $academicInfo->delete();
        return response()->json(['message' => 'Record deleted successfully']);
    }
}
