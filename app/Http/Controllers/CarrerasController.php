<?php

namespace App\Http\Controllers;

use App\Models\Carreras;
use Illuminate\Http\Request;

class CarrerasController extends Controller
{
   
    public function index()
    {
        //Donde se muestran todos los elementos guardados en la db
        $carreras = Carreras::all();
        return view('carreras', compact('carreras'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
