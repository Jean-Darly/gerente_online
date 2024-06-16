@extends('layouts.layout')

@section('title', 'Configuração das Etiquetas')

@section('content')

<div class="card">
    <div class="card-header">
        <h2>Configuração das Etiquetas</h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover w-100">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" style="width: 20px;">ID</th>
                        <th class="text-center" style="width: 150px;"
                            title="Coloque um nome descritivo para lembrar do que se trata.">Nome</th>
                        <th class="text-center bg-success" style="width: 50px;"
                            title="Quantidade de colunas na página.">QTC</th>
                        <th class="text-center bg-success" style="width: 50px;" title="Quantidade de linhas na página.">
                            QTL</th>
                        <th class="text-center bg-success" style="width: 50px;" title="Margem no topo da página.">MPT
                        </th>
                        <th class="text-center bg-success" style="width: 50px;" title="Margem direita da página.">MPD
                        </th>
                        <th class="text-center bg-success" style="width: 50px;" title="Margem no rodapé da página.">MPR
                        </th>
                        <th class="text-center bg-success" style="width: 50px;" title="Margem esqueda da página.">MPE
                        </th>
                        <th class="text-center bg-danger" style="width: 50px;" title="Altura da etiqueta.">ALE</th>
                        <th class="text-center bg-danger" style="width: 50px;" title="Largura da etiqueta.">LAE</th>
                        <th class="text-center bg-danger" style="width: 50px;" title="Margem no topo da etiqueta.">MET
                        </th>
                        <th class="text-center bg-danger" style="width: 50px;" title="Margem direita da etiqueta.">MED
                        </th>
                        <th class="text-center bg-danger" style="width: 50px;" title="Margem no rodapé da etiqueta.">MER
                        </th>
                        <th class="text-center bg-danger" style="width: 50px;" title="Margem esquerda da etiqueta.">MEE
                        </th>
                        <th class="text-center bg-warning" style="width: 50px;" title="Tamanho da letra na linha 1">TL1
                        </th>
                        <th class="text-center bg-warning" style="width: 50px;" title="Tamanho da letra na linha 2">TL2
                        </th>
                        <th class="text-center bg-warning" style="width: 50px;" title="Tamanho da letra na linha 3">TL3
                        </th>
                        <th class="text-center bg-warning" style="width: 50px;" title="Tamanho da letra na linha 4">TL4
                        </th>
                        <th class="text-center bg-primary" style="width: 10px;"
                            title="Marque a qual vai ser utilizada.">STE</th>
                        <th class="text-center bg-primary" style="width: 50px;" title="Ações">ACO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($configuracoes as $configuracao)
                        <form id="etiquetaForm" method="POST"
                            action="{{ route('configuracaoEtiqueta.update', $configuracao->id) }}">
                            @csrf
                            @method('PUT')
                            <tr>
                                <td class="text-center">{{ $configuracao->id }}</td>
                                <td class="text-center"><input name="nome" class="form-control" style="width: 100%;"
                                        type="text" value="{{ $configuracao->nome }}" required></td>
                                <td class="text-center"><input name="qt_coluna_pagina" class="form-control"
                                        style="width: 100%;" type="number" value="{{ $configuracao->qt_coluna_pagina }}"
                                        required></td>
                                <td class="text-center"><input name="qt_linha_pagina" class="form-control"
                                        style="width: 100%;" type="number" value="{{ $configuracao->qt_linha_pagina }}"
                                        required></td>
                                <td class="text-center"><input name="margem_pagina_topo" class="form-control"
                                        style="width: 100%;" type="number" value="{{ $configuracao->margem_pagina_topo }}"
                                        required></td>
                                <td class="text-center"><input name="margem_pagina_direita" class="form-control"
                                        style="width: 100%;" type="number"
                                        value="{{ $configuracao->margem_pagina_direita }}" required></td>
                                <td class="text-center"><input name="margem_pagina_rodape" class="form-control"
                                        style="width: 100%;" type="number" value="{{ $configuracao->margem_pagina_rodape }}"
                                        required></td>
                                <td class="text-center"><input name="margem_pagina_esquerda" class="form-control"
                                        style="width: 100%;" type="number"
                                        value="{{ $configuracao->margem_pagina_esquerda }}" required></td>
                                <td class="text-center"><input name="altura_etiqueta" class="form-control"
                                        style="width: 100%;" type="number" value="{{ $configuracao->altura_etiqueta }}"
                                        required></td>
                                <td class="text-center"><input name="largura_etiqueta" class="form-control"
                                        style="width: 100%;" type="number" value="{{ $configuracao->largura_etiqueta }}"
                                        required></td>
                                <td class="text-center"><input name="margem_etiqueta_topo" class="form-control"
                                        style="width: 100%;" type="number" value="{{ $configuracao->margem_etiqueta_topo }}"
                                        required></td>
                                <td class="text-center"><input name="margem_etiqueta_direita" class="form-control"
                                        style="width: 100%;" type="number"
                                        value="{{ $configuracao->margem_etiqueta_direita }}" required></td>
                                <td class="text-center"><input name="margem_etiqueta_rodape" class="form-control"
                                        style="width: 100%;" type="number"
                                        value="{{ $configuracao->margem_etiqueta_rodape }}" required></td>
                                <td class="text-center"><input name="margem_etiqueta_esquerda" class="form-control"
                                        style="width: 100%;" type="number"
                                        value="{{ $configuracao->margem_etiqueta_esquerda }}" required></td>
                                <td class="text-center"><input name="tamanhoFonteL01" class="form-control"
                                        style="width: 100%;" type="number" value="{{ $configuracao->tamanhoFonteL01 }}"
                                        required></td>
                                <td class="text-center"><input name="tamanhoFonteL02" class="form-control"
                                        style="width: 100%;" type="number" value="{{ $configuracao->tamanhoFonteL02 }}"
                                        required></td>
                                <td class="text-center"><input name="tamanhoFonteL03" class="form-control"
                                        style="width: 100%;" type="number" value="{{ $configuracao->tamanhoFonteL03 }}"
                                        required></td>
                                <td class="text-center"><input name="tamanhoFonteL04" class="form-control"
                                        style="width: 100%;" type="number" value="{{ $configuracao->tamanhoFonteL04 }}"
                                        required></td>
                                <td class="text-center">
                                    <input name="status" class="form-check-input" type="checkbox" value="1" {{ $configuracao->status == 1 ? 'checked' : '' }} />
                                </td>
                                <td class="text-center">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                </td>
                            </tr>
                        </form>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection