<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'id_eps',
        'id_usuario',
    ];

    public function user()
    {
    return $this->belongsTo(User::class,'id_usuario');
    }

   
    public function eps()
    {
        return $this->belongsTo(Eps::class,'id_eps');
    }
    public function cita()
    {
        return $this->belongsTo(Eps::class,'id_eps');
    }
}
