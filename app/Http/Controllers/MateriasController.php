<?php

namespace App\Http\Controllers;

use App\Models\Carreras;
use App\Models\Materias;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = Materias::select('materias.id', 'id_carrera', 'carrera')
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
