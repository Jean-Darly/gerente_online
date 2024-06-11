<?php
// app/Http/Controllers/UtilidadesEtiquetasNomesTableController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UtilidadesEtiquetasNomesTable;

class UtilidadesEtiquetasNomesTableController extends Controller
{
    public function index()
    {
        $etiquetas = UtilidadesEtiquetasNomesTable::all();
        return view('etiqueta.index', compact('etiquetas'));
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

    public function edit($id)
    {
        $etiqueta = UtilidadesEtiquetasNomesTable::findOrFail($id);
        return view('etiqueta.edit', compact('etiqueta'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $etiqueta = UtilidadesEtiquetasNomesTable::findOrFail($id);
        $etiqueta->update($request->all());

        return redirect()->route('etiqueta.index')->with('success', 'Registro atualizado com sucesso!');
    }
    public function destroy($id)
    {
        $etiqueta = UtilidadesEtiquetasNomesTable::findOrFail($id);
        $etiqueta->delete();

        return redirect()->route('etiqueta.index')->with('success', 'Registro excluído com sucesso!');
    }
}
