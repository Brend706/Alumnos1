<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carreras extends Model
{
    use HasFactory;
    use SoftDeletes; //borra el elemento en la vista pero no en la base de datos
    protected $fillable = ['carrera'];
}
