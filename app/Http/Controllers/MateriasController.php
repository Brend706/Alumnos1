<?php

namespace App\Http\Controllers;

use App\Models\Carreras;
use App\Models\Materias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class MateriasController extends Controller
{
    public function index()
    {
        //vista general
        //Muestra todas las materias guardadas y desplega el nombre de la carrera segun el id_carrera
        $materias = Materias::select('materias.id', 'materia', 'id_carrera', 'carrera')
        ->join('carreras', 'carreras.id', '=', 'materias.id_carrera')->get();
        $carreras = Carreras::all();
        return view('materias', compact('materias', 'carreras'));
    }

    public function store(Request $request)
    {
        //crea materias desde la vista general de todas las materias
        $materia = new Materias($request->input());
        $materia->saveOrFail();
        Alert::toast('Materia registrada correctamente!','success');
        return redirect('materias');
    }

    public function show(string $id)
    {
        //Mostrar materia para editar
        $materia = Materias::find($id);
        return view('editMateria', compact('materia'));
    }

    public function update(Request $request, string $id)
    {
        //actualiza la materia desde la vista general
        $materia = Materias::find($id);
        $materia->fill($request->input())->saveOrFail();
        return redirect('materias');
    }

    public function destroy(string $id)
    {
        //borra la materia desde la vista general
        $materia = Materias::find($id);
        $materia->delete();
        return redirect('materias')->with('confirmacion', 'ok');
    }

    //Mis funciones 
    public function agregarMateria(Request $request, string $id){
        //
        $materia = new Materias();
        $materia->materia = $request->materia;
        $materia->id_carrera = $id;
        $materia->saveOrFail();

        Alert::toast('Materia registrada correctamente!','success');
        return redirect("carrera/materias/$id");
    }

    public function materiasDeLaCarrera(string $id){
        //Mostrar materias por carrera
        $materias = DB::table('materias')->where('id_carrera', "=", $id)->where('deleted_at', '=', null)->get();
        $carrera = Carreras::find($id);
        return view('matxCarrera', compact('materias', 'carrera'));
    }

    public function destroyMateria( string $carrera, string $id){
        $materia = Materias::find($id);
        $materia->delete();
        return redirect("carrera/materias/$carrera")->with('confirmacion', 'ok');
    }

    public function actualizarMateria(Request $request, string $carrera, string $id){
        $materia =  Materias::find($id);
        $materia->fill($request->input())->saveOrFail();
        return redirect("carrera/materias/$carrera", compact('materia'));
    }
}
