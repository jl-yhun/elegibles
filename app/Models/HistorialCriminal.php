<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialCriminal extends Model // 'CriminalHistory' -> 'HistorialCriminal'
{
    protected $table = 'historial_criminal'; // 'criminal_history' -> 'historial_criminal'
    protected $fillable = [
        'user_id', // 'user_id' -> 'user_id'
        'antecedentes_penales', // 'criminal_record' -> 'antecedentes_penales'
        'detalles_antecedentes_penales', // 'criminal_record_details' -> 'detalles_antecedentes_penales'
        'inhabilitacion', // 'has_been_disabled' -> 'ha_sido_inhabilitado'
        'detalles_inhabilitacion', // 'has_been_disabled_details' -> 'detalles_inhabilitacion'
        'nombre_en_lista_negra', // 'name_in_blacklist' -> 'nombre_en_lista_negra'
        'detalles_lista_negra', // 'name_in_blacklist_details' -> 'detalles_lista_negra'
    ];
    protected $hidden = [
        'id',
        'user_id', // 'user_id' -> 'user_id'
        'created_at', // 'created_at' -> 'creado_en'
        'updated_at', // 'updated_at' -> 'actualizado_en'
    ];
    protected $casts = [
        'antecedentes_penales' => 'boolean', // 'criminal_record' -> 'antecedentes_penales'
        'inhabilitacion' => 'boolean', // 'has_been_disabled' -> 'ha_sido_inhabilitado'
        'nombre_en_lista_negra' => 'boolean', // 'name_in_blacklist' -> 'nombre_en_lista_negra'
    ];

    public function usuario() // 'user' -> 'usuario'
    {
        return $this->belongsTo(Usuario::class); // 'User' -> 'Usuario'
    }
}
