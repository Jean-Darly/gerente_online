<!-- // Na view da rota 'listaEtiquetas.blade.php' -->
@if (isset($etiquetas) && count($etiquetas) > 0)
    <div class="card mt-5">
        <div class="card-header">
            <h2>Lista de etiquetas:</h2>
        </div>

        <!-- formulário para a pesquisa -->
        <form action="/etiqueta" method="GET" class="d-flex mb-0">
            <div class="input-group ms-3 me-3 mt-3">
                <input type="text" class="form-control" placeholder="Pesquisar" aria-label="Pesquisar" name="search">
                <button class="btn btn-outline-black bg-secondary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>

        <div class="card-body">
            @foreach ($etiquetas as $etiqueta)
                <div class="row my-2 py-2 border-bottom align-items-center"
                    style="transition: background-color 0.3s ease; border: 1px solid #ddd; box-shadow: 2px 2px 5px rgba(0,0,0,0.1);">
                    <div class="col-6">
                        <p class="mb-0" style="font-size: 1.2em;"><strong>{{ $etiqueta->nome }}</strong></p>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('etiqueta.edit', $etiqueta->id) }}" class="btn btn-primary">
                            <i class="bi bi-pencil-fill"></i> Editar
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $etiquetas->links('pagination::bootstrap-5') }}
    </div>
@endif
