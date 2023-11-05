<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bimestres extends Model
{
    use HasFactory;

    protected $table = "bimestres";
    
    public function boletas()
    {
        return $this->hasMany(Boletas::class, 'idBimestre', 'id');
    }
}
