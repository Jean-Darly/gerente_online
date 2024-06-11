{{-- resources/views/pessoas/create.blade.php --}}
@extends('layouts.layout')

@section('title', 'Criar nome para etiqueta')

@section('content')

    <div class="container mt-5">
        <h2>Itens do Carrinho de Etiquetas</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID Etiqueta</th>
                    <th>Validade</th>
                    <th>Quantidade</th>
                    <th>Observações</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Adicione aqui as linhas da tabela com os dados existentes, se houver -->

                <!-- Linha de formulário para adicionar novo item -->
                <tr>
                    <form action="{{ route('carrinhoEtiqueta.store') }}" method="POST">
                        @csrf
                        <td>
                            <input type="number" class="form-control" id="id_etiqueta" name="id_etiqueta">
                        </td>
                        <td>
                            <input type="date" class="form-control" id="validade" name="validade" required>
                        </td>
                        <td>
                            <input type="number" class="form-control" id="quantidade" name="quantidade" required>
                        </td>
                        <td>
                            <input type="text" class="form-control" id="obs" name="obs">
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                        </td>
                    </form>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
