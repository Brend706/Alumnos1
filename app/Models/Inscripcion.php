<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inscripcion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id_alumno','id_clase'];

    //relacion con alumno y clase

    //Un alumno puede tener muchas clases
    //Una clase puede tener muchos alumnos
    public function alumno(){
        return $this->belongsToMany(Alumnos::class)->withTrashed();
    }

    public function clase(){
        return $this->belongsToMany(Clase::class)->withTrashed();
    }
}
