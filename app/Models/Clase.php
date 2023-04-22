<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clase extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;
    protected $fillable = ['dia', 'hora', 'salon','id_materia', 'id_instructor'];

    //Relacion con materia e instructor

    //Una clase es impartida por un instructor
    public function instructor(){
        return $this->belongsTo(Instructor::class)->withTrashed();
    }

    //En una clase se imparte solo una materia
    public function materia(){
        return $this->belongsTo(Materias::class)->withTrashed();
    }
}
