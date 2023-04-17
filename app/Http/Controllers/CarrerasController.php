<?php

namespace App\Http\Controllers;

use App\Models\Carreras;
use Illuminate\Http\Request;

class CarrerasController extends Controller
{
   
    public function index()
    {
        //muestran o devuelve todos los elementos guardados en la db
        $carreras = Carreras::all();
        return view('carreras', compact('carreras'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //se encarga de guardar nuevos objetos o elementos en la db
        $carrera = new Carreras($request->input());
        $carrera->saveOrFail();
        return redirect('carreras');
    }

    public function show(string $id)
    {
        //busca la carrera mediante el id
        $carrera = Carreras::find($id);
        return view('editCarrera', compact('carrera'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $carrera = Carreras::find($id);
        $carrera->fill($request->input())->saveOrFail();
        return redirect('carreras');
    }

    public function destroy(string $id)
    {
        $carrera = Carreras::find($id);
        $carrera->delete();
        return redirect('carreras');
    }
}
