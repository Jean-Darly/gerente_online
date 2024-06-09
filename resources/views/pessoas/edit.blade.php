{{-- resources/views/pessoas/edit_multiple.blade.php --}}

@extends('layouts.layout')

@section('title', 'Edição de Usuários')

@section('content')
    <form action="{{ route('pessoas.update') }}" method="post">
        @csrf
        @method('PUT')
        @foreach ($pessoas as $pessoa)
            <div>
                <h3>Usuário: {{ $pessoa->id }}</h3>
                <label for="nome_{{ $pessoa->id }}">Nome:</label>
                <input type="text" id="nome_{{ $pessoa->id }}" name="{{ $pessoa->id }}[nome]" value="{{ $pessoa->nome }}">

                <label for="idade_{{ $pessoa->id }}">Idade:</label>
                <input type="number" id="idade_{{ $pessoa->id }}" name="{{ $pessoa->id }}[idade]" value="{{ $pessoa->idade }}">

                <label for="status_{{ $pessoa->id }}">Status:</label>
                <select name="{{ $pessoa->id }}[status]">
                    <option value="1" {{ $pessoa->status == 1 ? 'selected' : '' }}>Ativo</option>
                    <option value="0" {{ $pessoa->status == 0 ? 'selected' : '' }}>Inativo</option>
                </select>
            </div>
        @endforeach
        <input type="submit" value="Editar Todos">
    </form>
@endsection
