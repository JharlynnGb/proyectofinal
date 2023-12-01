<?php

namespace App\Models;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudiantes extends Model
{
    use HasFactory;

    protected $table = "estudiantes";

    protected $fillable = [
        'User_id', 'dni', 'Nombres', 'Apellidos', 'Correo', 'Telefono', 'Direccion', 'Bloque', 'Grado', 'Seccion', 'FechaNacimiento',
    ];

    public function boletas()
    {
        return $this->hasMany(Boletas::class, 'idEstudiante', 'id');
    }

    public function bloques()
    {
        return $this->belongsTo(Bloque::class, 'Bloque', 'id');
    }
    public function grados()
    {
        return $this->belongsTo(Grados::class, 'Grado', 'id');
    }
    public function secciones()
    {
        return $this->belongsTo(Seccion::class, 'Seccion', 'id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'User_id', 'id');
    }
}
