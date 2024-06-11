<?php
// app/Http/Controllers/UtilidadesEtiquetasTableController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UtilidadesEtiquetasTable;

class UtilidadesEtiquetasTableController extends Controller
{
    public function index()
    {
        $carrinhoEtiquetas = UtilidadesEtiquetasTable::all();
        return view('etiquetaCarrinho.index', compact('carrinhoEtiquetas'));
    }

    public function create()
    {
        return view('etiquetaCarrinho.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        UtilidadesEtiquetasTable::create($request->all());

        return redirect()->route('etiquetaCarrinho.index')->with('success', 'Registro criado com sucesso!');
    }

    public function edit($id)
    {
        $etiqueta = UtilidadesEtiquetasTable::findOrFail($id);
        return view('etiquetaCarrinho.edit', compact('etiqueta'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $etiqueta = UtilidadesEtiquetasTable::findOrFail($id);
        $etiqueta->update($request->all());

        return redirect()->route('etiquetaCarrinho.index')->with('success', 'Registro atualizado com sucesso!');
    }
    public function destroy($id)
    {
        $etiqueta = UtilidadesEtiquetasTable::findOrFail($id);
        $etiqueta->delete();

        return redirect()->route('etiquetaCarrinho.index')->with('success', 'Registro excluído com sucesso!');
    }
}
