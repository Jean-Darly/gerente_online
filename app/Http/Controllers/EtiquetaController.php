<?php
// app/Http/Controllers/EtiquetaController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UtilidadesEtiquetasNomesTable;

class EtiquetaController extends Controller
{
    public function index()
    {
        return view('etiqueta.index');
    }

    public function create()
    {
        return view('etiqueta.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        UtilidadesEtiquetasNomesTable::create($request->all());

        return redirect()->route('etiqueta.index')->with('success', 'Registro criado com sucesso!');
    }
}
