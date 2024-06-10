{{-- resources/views/pessoas/edit_multiple.blade.php --}}

@extends('layouts.layout')

@section('title', 'Edição de Usuários')

@section('content')
    <form action="{{ route('pessoas.update') }}" method="post">
        @csrf
        @method('PUT')
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pessoas as $pessoa)
                    <tr>
                        <td>{{ $pessoa->id }}</td>
                        <td>
                            <input type="text" class="form-control" id="nome_{{ $pessoa->id }}" name="{{ $pessoa->id }}[nome]" value="{{ $pessoa->nome }}">
                        </td>
                        <td>
                            <input type="number" class="form-control" id="idade_{{ $pessoa->id }}" name="{{ $pessoa->id }}[idade]" value="{{ $pessoa->idade }}">
                        </td>
                        <td>
                            <select class="form-select" name="{{ $pessoa->id }}[status]">
                                <option value="1" {{ $pessoa->status == 1 ? 'selected' : '' }}>Ativo</option>
                                <option value="0" {{ $pessoa->status == 0 ? 'selected' : '' }}>Inativo</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <input type="submit" class="btn btn-primary" value="Editar Todos">
        </div>
    </form>
@endsection