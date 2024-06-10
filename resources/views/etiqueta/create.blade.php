@extends('layouts.layout')

@section('title', 'Lista de Usuários')

@section('content')
    <div class="container">
        <h1>Inserir Pessoa</h1>

        <form method="POST" action="{{ route('pessoas.store') }}">
            @csrf

            <div class="form-group">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="idade" class="form-label">Idade:</label>
                <input type="number" class="form-control" id="idade" name="idade" required min="18">
            </div>

            <div class="form-group">
                <label for="status" class="form-label">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
        @include('pessoas.listaPessoas', ['pessoas' => $pessoas])
@endsection