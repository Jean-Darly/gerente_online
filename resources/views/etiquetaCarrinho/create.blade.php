{{-- resources/views/etiqueta/create.blade.php --}}

@extends('layouts.layout')

@section('title', 'Carrinho de Etiquetas')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Adicionar Nova Etiqueta</h2>
        </div>
        <div class="card-body">
            <form id="etiquetaForm" method="POST" action="{{ route('etiquetaCarrinho.store') }}">
                @csrf
                <div class="row md-12">
                    <div class="col-md-3">
                        <label for="nome_etiquete" class="form-label">Nome Etiqueta</label>
                        @include('etiqueta.autocomplete')
                    </div>
                    <div class="col-md-2">
                        <label for="validade" class="form-label">Validade</label>
                        <input type="date" class="form-control" id="validade" name="validade"
                            value="{{ old('validade') }}" min="{{ now()->addDay()->toDateString() }}">
                    </div>
                    <div class="col-md-1">
                        <label for="quantidade" class="form-label">Quantidade</label>
                        <input type="number" class="form-control" id="quantidade" name="quantidade"
                            value="{{ old('quantidade') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="obs" class="form-label">Observações</label>
                        <input type="text" class="form-control" id="obs" name="obs" value="{{ old('obs') }}">
                    </div>
                    <div class="col-md-2">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Ativo</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inativo</option>
                        </select>
                    </div>
                    <div class="col-md-1 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100"><i class="bi bi-plus"></i> Criar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('etiquetaCarrinho.listaMesclada', ['etiquetas' => $etiquetas])
@endsection