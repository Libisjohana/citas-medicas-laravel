<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eps extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'activo',
    ];

    public function pacientes()
    {
        return $this->hasMany(Paciente::class,'id');
    }
}
