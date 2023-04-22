<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumnos extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;
    protected $fillable = ['nombre', 'correo', 'id_carrera'];

    public function carrera(){
        //Relacion de 1 alumno a 1 carrera
        return $this->belongsTo(Carreras::class)->withTrashed();
    }
}


