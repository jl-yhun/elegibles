<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformacionResidencial extends Model // 'ResidentialInfo' -> 'InformacionResidencial'
{
    protected $table = 'informacion_residencial'; // 'residential_info' -> 'informacion_residencial'
    public $timestamps = true;
    protected $fillable = [
        'user_id', // 'user_id' -> 'user_id'
        'nacionalidades', // 'nationalities' -> 'nacionalidades'
        'residencia_ultimo_anio', // 'residence_last_year' -> 'residencia_ultimo_ano'
        'fuera_mexico_desde', // 'outside_of_mexico_from' -> 'fuera_mexico_desde'
        'fuera_mexico_hasta', // 'outside_of_mexico_until' -> 'fuera_mexico_hasta'
        'paises', // 'countries' -> 'paises'
        'detalles_paises', // 'countries_details' -> 'detalles_paises'
        'certificado_residencial', // 'residential_certificate' -> 'certificado_residencial'
    ];

    public function usuario() // 'user' -> 'usuario'
    {
        return $this->belongsTo(Usuario::class); // 'User' -> 'Usuario'
    }
}
