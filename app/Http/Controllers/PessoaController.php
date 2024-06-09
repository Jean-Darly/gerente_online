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
    // app/Http/Controllers/PessoaController.php

    public function edit()
    {
        $pessoas = Pessoa::all();
        return view('pessoas.edit', compact('pessoas'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token', '_method');

        foreach ($data as $id => $values) {
            $pessoa = Pessoa::findOrFail($id);
            $pessoa->update($values);
        }

        return redirect()->route('pessoas.edit')->with('success', 'Usuários atualizados com sucesso!');
    }

    // public function edit()
    // {
    //     $pessoas = Pessoa::all();
    //     return view('pessoas.edit')->with('pessoas', $pessoas);
    // }
    // public function update(Request $request, $id)
    // {
    //     $pessoa = Pessoa::find($id);
    //     $pessoa->update($request->all());
    //     return redirect()->route('pessoas.index');
    // }
    // public function update(Request $request, $id)
    // {
    //     // Validação dos dados do formulário
    //     $request->validate([
    //         'nome' => 'required',
    //         'idade' => 'required|integer',
    //         'status' => 'required|boolean',
    //     ]);

    //     // Encontra a pessoa pelo ID
    //     $pessoa = Pessoa::find($id);

    //     // Atualiza os dados da pessoa
    //     $pessoa->nome = $request->nome;
    //     $pessoa->idade = $request->idade;
    //     $pessoa->status = $request->status;

    //     // Salva as alterações no banco de dados
    //     $pessoa->save();

    //     // Redireciona o usuário para a página de lista de pessoas com uma mensagem de sucesso
    //     return redirect()->route('pessoas.index')->with('success', 'Pessoa atualizada com sucesso!');
    // }


    // public function edit()
    // {

    //     // Buscar todas as pessoas com status 1
    //     // $pessoas = Pessoa::where('status', 1)->get();
    //     $pessoas = Pessoa::all();


    //     // Redirecionar para a rota de listagem de pessoas com as pessoas encontradas

    //     return view('pessoas.edit')->with('pessoas', $pessoas); // Retorna a view de criação
    // }
}
