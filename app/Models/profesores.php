<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profesores extends Model
{
    use HasFactory;

    protected $table = "profesores";

    protected $fillable = [
        'User_id',
        'dni',
        'Nombres',
        'Apellidos',
        'Correo',
        'Telefono',
        'Direccion',
        'FechaNacimiento',
    ];

    public function boletas()
    {
        return $this->hasMany(Boletas::class, 'idProfesor', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'User_id', 'id');
    }
}
