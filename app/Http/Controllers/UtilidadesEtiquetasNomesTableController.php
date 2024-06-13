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
        // Validação do formulário
        $request->validate([
            'nome' => 'required|string|max:255|unique:utilidades_etiquetas_nomes_tables,nome',
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.unique' => 'Este nome já existe. Por favor, escolha um nome diferente.',
            'nome.max' => 'O nome não pode ter mais de 255 caracteres.',
        ]);

        try {
            // Tenta criar o registro no banco de dados
            UtilidadesEtiquetasNomesTable::create($request->all());
            // Redireciona com mensagem de sucesso
            return redirect()->route('etiqueta.index')->with('success', 'Registro criado com sucesso!');
        } catch (\Illuminate\Database\QueryException $e) {
            // Captura a exceção de violação de unicidade e redireciona com mensagem de erro
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->with('error', 'Este nome já existe. Por favor, escolha um nome diferente.');
            }
            // Captura outras exceções de banco de dados e redireciona com mensagem genérica de erro
            return redirect()->back()->with('error', 'Ocorreu um erro ao criar o registro.');
        }
    }

    public function edit($id)
    {
        $etiqueta = UtilidadesEtiquetasNomesTable::findOrFail($id);
        return view('etiqueta.edit', compact('etiqueta'));
    }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nome' => 'required|string|max:255',
    //     ]);

    //     $etiqueta = UtilidadesEtiquetasNomesTable::findOrFail($id);
    //     $etiqueta->update($request->all());

    //     return redirect()->route('etiqueta.index')->with('success', 'Registro atualizado com sucesso!');
    // }
    public function update(Request $request, $id)
{
    // Validação do formulário
    $request->validate([
        'nome' => 'required|string|max:255|unique:utilidades_etiquetas_nomes_tables,nome,' . $id,
    ], [
        'nome.required' => 'O campo nome é obrigatório.',
        'nome.unique' => 'Este nome já existe. Por favor, escolha um nome diferente.',
        'nome.max' => 'O nome não pode ter mais de 255 caracteres.',
    ]);

    try {
        // Encontra o registro existente
        $etiqueta = UtilidadesEtiquetasNomesTable::findOrFail($id);
        // Atualiza o registro
        $etiqueta->update($request->all());
        // Redireciona com mensagem de sucesso
        return redirect()->route('etiqueta.index')->with('success', 'Registro atualizado com sucesso!');
    } catch (\Illuminate\Database\QueryException $e) {
        // Captura a exceção de violação de unicidade e redireciona com mensagem de erro
        if ($e->errorInfo[1] == 1062) {
            return redirect()->back()->with('error', 'Este nome já existe. Por favor, escolha um nome diferente.');
        }
        // Captura outras exceções de banco de dados e redireciona com mensagem genérica de erro
        return redirect()->back()->with('error', 'Ocorreu um erro ao atualizar o registro.');
    }
}

    public function destroy($id)
    {
        $etiqueta = UtilidadesEtiquetasNomesTable::findOrFail($id);
        $etiqueta->delete();

        return redirect()->route('etiqueta.index')->with('success', 'Registro excluído com sucesso!');
    }
    public function autocomplete(Request $request)
    {
        $term = $this->removeAccents($request->term);
        $etiquetas = UtilidadesEtiquetasNomesTable::where('nome', 'LIKE', '%' . $term . '%')->get(['id', 'nome as value']);
        $results = [];
        foreach ($etiquetas as $etiqueta) {
            $results[] = [
                'id' => $etiqueta->id,
                'value' => $etiqueta->nome,
            ];
        }

        return response()->json($etiquetas);
    }

    private function removeAccents($str)
    {
        return preg_replace(
            array('/[áàâãäå]/u', '/[ÁÀÂÃÄÅ]/u', '/[éèêë]/u', '/[ÉÈÊË]/u', '/[íìîï]/u', '/[ÍÌÎÏ]/u', '/[óòôõö]/u', '/[ÓÒÔÕÖ]/u', '/[úùûü]/u', '/[ÚÙÛÜ]/u', '/[ç]/u', '/[Ç]/u', '/[ñ]/u', '/[Ñ]/u'),
            array('a', 'A', 'e', 'E', 'i', 'I', 'o', 'O', 'u', 'U', 'c', 'C', 'n', 'N'),
            $str
        );
    }
}
