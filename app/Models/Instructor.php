<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instructor extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;
    protected $fillable = ['instructor', 'id_materia'];

    //Relacion entre materia
    //Un Instructor imparte una materia (1 a 1)
    public function materia(){
        return $this->belongsTo(Materias::class)->withTrashed();
    }
}
