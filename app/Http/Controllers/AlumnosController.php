<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use App\Models\Carreras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AlumnosController extends Controller
{
    public function index()
    {
        //$alumnos = Alumnos::all();
        /*Para traer el nombre especifico de la carrera hacemos una consulta mas avanzada a la db*/
        $alumnos = Alumnos::select('alumnos.id', 'nombre', 'correo', 'id_carrera', 'carrera')
        ->join('carreras', 'carreras.id', '=', 'alumnos.id_carrera')->get();
        $carreras = Carreras::all();
        return view('alumnos', compact('alumnos', 'carreras'));
    }

    public function store(Request $request)
    {
        $alumno = new Alumnos($request->input());
        $alumno->saveOrFail();
        Alert::toast('Alumno creado correctamente!', 'success');
        return redirect('alumnos');
    }

    public function show(string $id)
    {
        $alumno = Alumnos::find($id);
        $carreras = Carreras::all();
        return view('editAlumno', compact('alumno', 'carreras'));
    }

    public function update(Request $request, string $id)
    {
        $alumno = Alumnos::find($id);
        $alumno->fill($request->input())->saveOrFail();
        return redirect('alumnos');
    }

    public function destroy(string $id)
    {
        $alumno = Alumnos::find($id);
        $alumno->delete();
        return redirect('alumnos')->with('confirmacion', 'ok');
    }

    //MIS FUNCIONES...

    public function agregarAlumno(Request $request, string $carrera){
        $alumno = new Alumnos();
        $alumno->nombre = $request->nombre;
        $alumno->correo = $request->correo;
        $alumno->id_carrera = $carrera;
        $alumno->saveOrFail();
        return redirect("carrera/alumnos/$carrera");
    }

    public function alumnosDeLaCarrera(string $id){
        $alumnos = DB::table('alumnos')->where('id_carrera', '=', $id)->get();
        $carrera =  Carreras::find($id);
        return view('alumnosxCarrera', compact('alumnos', 'carrera'));
    }
}
