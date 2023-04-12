<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('correo', 50);
            //LLAVE FORANEA:
            $table->foreignId('id_carrera')->constrained('carreras')->onUpdate('cascade')->onDelete('restrict');
            /*Cuando se actualice la carrera, se actualizara automaticamente en el alumno
            Y cuando se desee eliminar la carrera no se permitira borrarla si la tiene algun alumno*/
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
