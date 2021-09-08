<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;
    public $table = "especialidades";
    protected $fillable = [
        'nombre',
        'id_medico',
    ];

    public function medico()
    {
        return $this->belongsTo(Medico::class,'id_medico');
    }
}
