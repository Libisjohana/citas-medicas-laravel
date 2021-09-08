<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'hora_inicio',
        'hora_salida',
        'id_usuario',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
