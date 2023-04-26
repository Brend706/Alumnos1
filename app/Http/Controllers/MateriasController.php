<?php

namespace App\Http\Controllers;

use App\Models\Carreras;
use App\Models\Materias;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = Materias::select('materias.id', 'materia', 'id_carrera', 'carrera')
        ->join('carreras', 'carreras.id', '=', 'materias.id_carrera')->get();
        $carreras = Carreras::all();
        return view('materias', compact('materias', 'carreras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $materia = new Materias($request->input());
        $materia->saveOrFail();
        Alert::toast('Materia registrada correctamente!','success');
        return redirect('materias');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Mostrar materia para editar
        $materia = Materias::find($id);
        return view('editMateria', compact('materia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $materia = Materias::find($id);
        $materia->fill($request->input())->saveOrFail();
        return redirect('materias');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materia = Materias::find($id);
        $materia->delete();
        return redirect('materias')->with('confirmacion', 'ok');
    }

    public function materiasDeLaCarrera(string $id){
        //Mostrar materias por carrera
        $materias = DB::table('materias')->where('id_carrera', "=", $id)->get();
        $carrera = Carreras::find($id);
        return view('matxCarrera', compact('materias', 'carrera'));
    }

    public function destroyMateria( string $carrer, string $id){
        $materia = Materias::find($id);
        $materia->delete();
        return redirect("carrera/materias/$carrer")->with('confirmacion', 'ok');
    }
}
