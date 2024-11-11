<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosicionAspirante extends Model // 'PositionAspire' -> 'PosicionAspirante'
{
    protected $table = 'posiciones_aspirantes'; // 'positions_aspire' -> 'posiciones_aspirantes'
    public $timestamps = true;
    protected $fillable = ['user_id', 'nombre']; // 'user_id' -> 'user_id', 'name' -> 'nombre'

    public function usuario() // 'user' -> 'usuario'
    {
        return $this->belongsTo(Usuario::class); // 'User' -> 'Usuario'
    }
}
