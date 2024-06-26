{{-- resources/views/pessoas/edit_multiple.blade.php --}}

@extends('layouts.layout')

@section('title', 'Edição de Usuários')

@section('content')
    <!-- Formulário para editar e deletar -->
    <div class="container">
        <h2 class="text-center">Editar e Deletar</h2>
        <form method="post" action="{{ route('etiqueta.update', $etiqueta->id) }}">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ $etiqueta->nome }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="actions" class="col-sm-2 col-form-label">Ações</label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteModal">Deletar</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal para deletar -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Deletar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Você tem certeza que deseja deletar o registro {{ $etiqueta->nome }}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form method="post" action="{{ route('etiqueta.delete', $etiqueta->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
