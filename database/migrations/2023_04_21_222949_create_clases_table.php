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
        Schema::create('clases', function (Blueprint $table) {
            $table->id();
            $table->date('dia');
            $table->time('hora');
            $table->string('salon');
            $table->foreignId('id_materia')->constrained('materias')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('id_instructor')->constrained('instructors')->onUpdate('cascade')->onDelete('restrict');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clases');
    }
};
