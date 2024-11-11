<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformacionAcademica extends Model // 'AcademicInfo' -> 'InformacionAcademica'
{
    protected $table = 'informacion_academica'; // 'academic_info' -> 'informacion_academica'
    public $timestamps = true;
    protected $fillable = [
        'user_id', // 'user_id' -> 'user_id'
        'titulo_derecho', // 'tittle_law' -> 'titulo_derecho'
        'promedio', // 'average' -> 'promedio'
        'nombre_escuela', // 'name_school' -> 'nombre_escuela'
        'id_profesional', // 'professionalID' -> 'id_profesional'
        'anios_practica', // 'years_practice' -> 'anos_practica'
        'anios_practica_area_legal', // 'years_practice_legal_area' -> 'anos_practica_area_legal'
        'promedio_posicion', // 'average_position' -> 'promedio_posicion'
    ];

    public function usuario() // 'user' -> 'usuario'
    {
        return $this->belongsTo(Usuario::class); // 'User' -> 'Usuario'
    }
}
