<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cita extends Model
{
    use HasFactory;
    public $table = "citas";
    protected $fillable = [
        'fecha',
        'id_especialidad',
        'cod_paciente'
    ];

    public function paciente()
    {
    return $this->belongsTo(Paciente::class,'cod_paciente');
    }
    public function especialidad()
    {
    return $this->belongsTo(Especialidad::class,'id_especialidad');
    }
}
