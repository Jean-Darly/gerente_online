<?php
namespace App\Http\Controllers;

use App\Models\UtilidadesEtiquetasConfiguracoesTable as UECT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class UtilidadesEtiquetasConfiguracoesTableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configuracoes = UECT::all();

        return view('configuracaoEtiqueta.index', compact('configuracoes'));
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
        //

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
    public function update(Request $request, $id)
    {
        Log::info('Dados recebidos: ', $request->all());
    
        try {
            // Validação dos dados recebidos
            $validatedData = $request->validate([
                'nome' => 'required|max:255',
                'altura_etiqueta' => 'required|numeric',
                'largura_etiqueta' => 'required|numeric',
                'qt_coluna_pagina' => 'required|integer',
                'qt_linha_pagina' => 'required|integer',
                'margem_etiqueta_topo' => 'required|numeric',
                'margem_etiqueta_esquerda' => 'required|numeric',
                'margem_etiqueta_direita' => 'required|numeric',
                'margem_etiqueta_rodape' => 'required|numeric',
                'margem_pagina_topo' => 'required|numeric',
                'margem_pagina_esquerda' => 'required|numeric',
                'margem_pagina_direita' => 'required|numeric',
                'margem_pagina_rodape' => 'required|numeric',
                'tamanhoFonteL01' => 'required|integer',
                'tamanhoFonteL02' => 'required|integer',
                'tamanhoFonteL03' => 'required|integer',
                'tamanhoFonteL04' => 'required|integer',
            ]);
    
            Log::info('Validação bem-sucedida.', $validatedData);
    
            // Trata o campo status
            $newStatus = $request->has('status') ? 1 : 0;
    
            // Inicia uma transação
            DB::beginTransaction();
    
            try {
                // Encontra o registro existente
                $etiquetaConfiguracao = UECT::findOrFail($id);
                Log::info('Registro encontrado: ', $etiquetaConfiguracao->toArray());
    
                // Se o novo status for 1, desativa todos os outros registros
                if ($newStatus == 1) {
                    UECT::where('id', '!=', $etiquetaConfiguracao->id)->update(['status' => 0]);
                }
    
                // Atualiza o registro atual
                $etiquetaConfiguracao->update($validatedData + ['status' => $newStatus]);
                Log::info('Registro atualizado com sucesso: ', $etiquetaConfiguracao->toArray());
    
                // Confirma a transação
                DB::commit();
    
                // Redireciona com mensagem de sucesso
                return redirect()->route('configuracaoEtiqueta.index')->with('success', 'Registro atualizado com sucesso!');
            } catch (\Exception $e) {
                // Em caso de erro, reverte a transação
                DB::rollback();
                throw $e; // Lança novamente a exceção para ser tratada fora do método
            }
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Erro de validação: ', $e->errors());
            return redirect()->back()->withErrors($e->errors());
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Erro de consulta ao banco de dados: ', $e->errorInfo);
            // Captura a exceção de violação de unicidade e redireciona com mensagem de erro
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->with('error', 'Este nome já existe. Por favor, escolha um nome diferente.');
            }
            // Captura outras exceções de banco de dados e redireciona com mensagem genérica de erro
            return redirect()->back()->with('error', 'Ocorreu um erro ao atualizar o registro.');
        } catch (\Exception $e) {
            Log::error('Erro inesperado: ', ['exception' => $e]);
            return redirect()->back()->with('error', 'Ocorreu um erro inesperado. Por favor, tente novamente.');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
