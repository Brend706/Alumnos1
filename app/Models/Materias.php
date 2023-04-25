<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Materias extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;
    protected $fillable = ['materia', 'id_carrera'];

    //relacion con el modelo Carrera
    //materia pertenece a una carrera (1 a 1)
    //carrera tiene muchas materias... 
    public function carrera(){
        return $this->belongsTo(Carreras::class)->withTrashed();
    }
}
