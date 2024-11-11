<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SentenciaUsuario extends Model // 'SentenceUser' -> 'SentenciaUsuario'
{
    protected $table = 'sentencia_usuario'; // 'sentence_user' -> 'sentencia_usuario'
    public $timestamps = true;
    protected $fillable = ['user_id', 'sentencia']; // 'user_id' -> 'user_id', 'sentence' -> 'sentencia'

    public function usuario() // 'user' -> 'usuario'
    {
        return $this->belongsTo(Usuario::class); // 'User' -> 'Usuario'
    }
}
