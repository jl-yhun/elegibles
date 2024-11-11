<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformacionGeneral extends Model // 'GeneralInfo' -> 'InformacionGeneral'
{
    protected $table = 'informacion_general'; // 'general_info' -> 'informacion_general'
    public $timestamps = true;
    protected $fillable = [
        'user_id', // 'user_id' -> 'user_id'
        'nombre', // 'name' -> 'nombre'
        'apellido_paterno', // 'father_last_name' -> 'apellido_paterno'
        'apellido_materno', // 'mother_last_name' -> 'apellido_materno'
        'genero', // 'genre' -> 'genero'
        'curp',
        'rfc',
        'fecha_nacimiento', // 'birth_date' -> 'fecha_nacimiento'
        'edad', // 'age' -> 'edad'
        'lugar_nacimiento', // 'place_of_birth' -> 'lugar_nacimiento'
        'dni',
    ];

    public function usuario() // 'user' -> 'usuario'
    {
        return $this->belongsTo(Usuario::class); // 'User' -> 'Usuario'
    }
}
