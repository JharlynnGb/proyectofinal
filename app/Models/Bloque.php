<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloque extends Model
{
    use HasFactory;

    protected $table = "bloques";
    protected $fillable = ['descripcion'];

    public function estudiantes()
    {
        return $this->hasMany(Estudiantes::class, 'Bloque', 'id');
    }
}
