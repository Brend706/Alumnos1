<?php

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\MateriasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::resource('carreras', \App\Http\Controllers\CarrerasController::class);
Route::resource('alumnos', \App\Http\Controllers\AlumnosController::class);
Route::resource('materias', \App\Http\Controllers\MateriasController::class);
Route::resource('instructors', App\Http\Controllers\InstructorController::class);

Route::post('addMateria/{carrera}', [MateriasController::class, 'agregarMateria']);
//Route::put('putMateria/{carrera}/{materia}', [MateriasController::class, 'actualizarMateria']);
Route::get('carrera/materias/{id}', [MateriasController::class, 'materiasDeLaCarrera']);
Route::delete('deleteMateria/{carrera}/{materia}', [MateriasController::class, 'destroyMateria']);

Route::post('addAlumno/{carrera}', [AlumnosController::class, 'agregarAlumno']);
Route::get('carrera/alumnos/{id}', [AlumnosController::class, 'alumnosDeLaCarrera']);