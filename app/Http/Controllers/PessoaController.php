<?php

namespace App\Http\Controllers;

use App\Models\Pessoa\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function create()
    {

        // Buscar todas as pessoas com status 1
        // $pessoas = Pessoa::where('status', 1)->get();
        $pessoas = Pessoa::all();


        // Redirecionar para a rota de listagem de pessoas com as pessoas encontradas
        
        return view('pessoas.create')->with('pessoas', $pessoas); // Retorna a view de criação
    }

    public function store(Request $request)
    {
        // Validar os dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'idade' => 'required|integer|min:18',
            'status' => 'required|boolean',
        ]);

        // Criar um novo objeto Pessoa
        $pessoa = new Pessoa;
        $pessoa->nome = $request->input('nome');
        $pessoa->idade = $request->input('idade');
        $pessoa->status = $request->input('status');

        // Salvar a pessoa no banco de dados
        $pessoa->save();

        // Buscar todas as pessoas com status 1
        // $pessoas = Pessoa::where('status', 1)->get();
        $pessoas = Pessoa::all();

        // Redirecionar para a rota de listagem de pessoas com as pessoas encontradas
        return redirect()->route('pessoas.create')->with('pessoas', $pessoas);
    }
}
