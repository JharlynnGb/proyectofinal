<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;


use Spatie\Permission\Traits\HasRoles; // Para Spatie/Permission


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table = "usuarios";
    protected $fillable = [
        'username', 'correo', 'password', 'rol', 'estado',
    ];

    public function estudiante()
    {
        return $this->hasOne(estudiantes::class,'User_id','id');
    }

    public function docente()
    {
        return $this->hasOne(profesores::class,'User_id','id');
    }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Always encrypt the password when it is updated.
     *
     * @param $value
     * @return string
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
