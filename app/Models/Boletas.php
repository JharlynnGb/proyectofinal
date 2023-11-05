<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boletas extends Model
{
    use HasFactory;
    protected  $table = "boletas";

    public function estudiante()
    {
        return $this->belongsTo(Estudiantes::class, 'idEstudiante', 'id');
    }

    public function bimestre()
    {
        return $this->belongsTo(Bimestres::class, 'idBimestre', 'id');
    }

    public function profesor()
    {
        return $this->belongsTo(profesores::class, 'idProfesor', 'id');
    }
}
