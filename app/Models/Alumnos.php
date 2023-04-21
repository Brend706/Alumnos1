<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['nombre', 'correo', 'id_carrera'];

    public function carrera(){
        //Relacion de 1 a 1
        //Un alumno solo tiene 1 carrera
        return $this->belongsTo(Carreras::class)->withTrashed();
    }
}


