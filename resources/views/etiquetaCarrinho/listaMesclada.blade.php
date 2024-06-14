<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header">
            <h2>Lista Mesclada de Etiquetas Para Impressão</h2>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-sm-1"><strong>ID</strong></div>
                <div class="col-sm-2"><strong>Nome</strong></div>
                <div class="col-sm-2"><strong>Validade</strong></div>
                <div class="col-sm-1"><strong>Quant.</strong></div>
                <div class="col-sm-2"><strong>Status</strong></div>
                <div class="col-sm-2"><strong>Observações</strong></div>
                <div class="col-sm-2"><strong>Ação</strong></div>
            </div>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @foreach ($etiquetas as $etiqueta)
                        <form action="{{ route('carrinhoEtiqueta.editEtiqueta', $etiqueta->id) }}" method="POST" class="mb-3">
                            @csrf
                            @php
                                $ativo = '';
                                if ($etiqueta->status == 0) {
                                    $ativo = 'bg-warning';
                                }
                            @endphp
                            <div class="row mb-2 p-1 {{ $ativo }}">
                                <div class="col-sm-1">{{ $etiqueta->id }}</div>
                                <div class="col-sm-2">
                                    <input type="text" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Não é possivel alterar o nome por aqui..."
                                        class="form-control text-secondary {{ $etiqueta->status == 0 ? $ativo : 'bg-light' }}"
                                        name="nome" value="{{ $etiqueta->nome }}" readonly>
                                </div>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control {{$ativo}}" name="validade"
                                        value="{{ $etiqueta->validade }}" required>
                                </div>
                                <div class="col-sm-1">
                                    <input type="number" class="form-control {{$ativo}}" name="quantidade"
                                        value="{{ $etiqueta->quantidade }}" required maxlength="3">
                                </div>
                                <div class="col-sm-2">
                                    <select class="form-select {{$ativo}}" name="status" required>
                                        <option value="1" {{ $etiqueta->status == 1 ? 'selected' : '' }}>Ativo</option>
                                        <option value="0" {{ $etiqueta->status == 0 ? 'selected' : '' }}>Inativo</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control {{$ativo}}" name="obs" value="{{ $etiqueta->obs }}"
                                        required>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit"
                                        class="{{ $etiqueta->status == 0 ? 'btn btn-secondary ' : 'btn btn-primary' }}">
                                        <i class="bi bi-pencil-fill"></i> Editar
                                    </button>
                                </div>
                            </div>
                        </form>
            @endforeach

        </div>
    </div>
</div>