<?php
// app/Http/Controllers/UtilidadesEtiquetasTableController.php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\UtilidadesEtiquetasTable;
use Illuminate\Database\QueryException;
use App\Models\UtilidadesEtiquetasConfiguracoesTable;

class UtilidadesEtiquetasTableController extends Controller
{
    public function index()
    {
        $carrinhoEtiquetas = UtilidadesEtiquetasTable::all();
        return view('etiquetaCarrinho.index', compact('carrinhoEtiquetas'));
    }

    public function create()
    {
        // Define a data de hoje corretamente no timezone do servidor
        $today = Carbon::today();//date('Y-m-d 00:00:00');

        $etiquetasQuery = UtilidadesEtiquetasTable::select('utilidades_etiquetas_tables.*', 'utilidades_etiquetas_nomes_tables.nome')
            ->join('utilidades_etiquetas_nomes_tables', 'utilidades_etiquetas_tables.id_etiqueta', '=', 'utilidades_etiquetas_nomes_tables.id')
            ->where('utilidades_etiquetas_tables.created_at', '>=', $today);
        // ->where('utilidades_etiquetas_tables.status', 1);

        // Exibir a consulta SQL gerada
        // dd($etiquetasQuery->toSql(), $etiquetasQuery->getBindings());

        $etiquetas = $etiquetasQuery->get();

        return view('etiquetaCarrinho.create', compact('etiquetas'));
    }

    public function store(Request $request)
    {
        // Dump and die tipo var_dump
        // dd($request->all());

        // Validações
        $request->validate([
            'id_etiqueta' => 'required|integer',
            'validade' => 'required|date',
            'quantidade' => 'required|integer|min:1',
            'obs' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        try {
            // Permitir apenas os campos especificados
            UtilidadesEtiquetasTable::create($request->only(['id_etiqueta', 'validade', 'quantidade', 'obs', 'status']));

            // Redirecionar de volta para a página do formulário com mensagem de sucesso
            return redirect()->route('carrinhoEtiqueta.create')->with('success', 'Registro criado com sucesso!')->withInput();

        } catch (QueryException $e) {
            // Tratar erro de duplicidade
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->withErrors(['nome' => 'O nome da etiqueta já existe.'])->withInput();
            }
            // Tratar outros erros de banco de dados
            return redirect()->back()->withErrors(['db_error' => 'Erro ao criar a etiqueta, tente novamente.'])->withInput();
        }
    }

    public function edit($id)
    {
        $etiqueta = UtilidadesEtiquetasTable::findOrFail($id);
        return view('etiquetaCarrinho.edit', compact('etiqueta'));
    }

    public function editEtiqueta(Request $request, $id)
    {
        try {
            // Validação dos dados recebidos
            $request->validate([
                'nome' => 'required|string|max:255',
                'validade' => 'required|date',
                'quantidade' => 'required|integer|min:0|max:999',
                'status' => 'required|in:0,1',
                'obs' => 'required|string|max:255',
            ]);

            // Encontrar a etiqueta mesclada pelo ID
            $etiqueta = UtilidadesEtiquetasTable::findOrFail($id);

            // Atualizar os dados da etiqueta com os dados do formulário
            $etiqueta->validade = $request->validade;
            $etiqueta->quantidade = $request->quantidade;
            $etiqueta->status = $request->status;
            $etiqueta->obs = $request->obs;
            $etiqueta->save();

            // Redirecionar de volta para a mesma view com uma mensagem de sucesso
            return redirect()->route('carrinhoEtiqueta.create')->with('success', 'Etiqueta ( ::: ' . $request->nome . ' ::: ) atualizada com sucesso!')->withInput();
        } catch (\Exception $e) {
            // Em caso de erro, redirecionar de volta com mensagem de erro
            return redirect()->back()->with('error', 'Erro ao atualizar etiqueta para impressão: ' . $e->getMessage())->withInput();
        }
    }

    public function listaMesclada()
    {
        $etiquetas = UtilidadesEtiquetasTable::select('utilidades_etiquetas_tables.*', 'utilidades_etiquetas_nomes_tables.nome')
            ->join('utilidades_etiquetas_nomes_tables', 'utilidades_etiquetas_tables.id_etiqueta', '=', 'utilidades_etiquetas_nomes_tables.id')
            ->get();

        return view('etiquetaCarrinho.listaMesclada', compact('etiquetas'));
    }

    public function update(Request $request, $id)
    {
        // Validações
        $request->validate([
            'id_etiqueta' => 'required|integer' . $id,
            'validade' => 'required|date',
            'quantidade' => 'required|integer|min:1',
            'obs' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        try {
            // Atualização da etiqueta
            $etiqueta = UtilidadesEtiquetasTable::findOrFail($id);
            // Permitir apenas os campos especificados
            $etiqueta->update($request->only(['id_etiqueta', 'validade', 'quantidade', 'obs', 'status']));
            return redirect()->route('etiquetaCarrinho.index')->with('success', 'Registro atualizado com sucesso!')->withInput();
        } catch (QueryException $e) {
            // Tratar erro de duplicidade
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->withErrors(['nome' => 'O nome da etiqueta já existe.'])->withInput();
            }
            // Tratar outros erros de banco de dados
            return redirect()->back()->withErrors(['db_error' => 'Erro ao atualizar a etiqueta, tente novamente.'])->withInput();
        }
    }
    public function destroy($id)
    {
        $etiqueta = UtilidadesEtiquetasTable::findOrFail($id);
        $etiqueta->delete();

        return redirect()->route('etiquetaCarrinho.index')->with('success', 'Registro excluído com sucesso!');
    }
    public function print()
    {
        // return config('app.timezone') . now();
        $layoutEtiquetas = UtilidadesEtiquetasConfiguracoesTable::all()->where('status', 1);
        $carrinhoEtiquetas = UtilidadesEtiquetasTable::select('utilidades_etiquetas_tables.*', 'utilidades_etiquetas_nomes_tables.nome')
            ->join('utilidades_etiquetas_nomes_tables', 'utilidades_etiquetas_tables.id_etiqueta', '=', 'utilidades_etiquetas_nomes_tables.id')
            ->get();
        return view('etiquetaCarrinho.print', compact('carrinhoEtiquetas', 'layoutEtiquetas'));
    }
    public function layout()
    {
        // return config('app.timezone') . now();		
        $layoutEtiquetas = UtilidadesEtiquetasConfiguracoesTable::select('nome', 'qt_linha_pagina', 'qt_coluna_pagina')
            ->where('status', 1)
            ->get();
        return view('etiquetaCarrinho.layout', compact('layoutEtiquetas'));
    }
}
