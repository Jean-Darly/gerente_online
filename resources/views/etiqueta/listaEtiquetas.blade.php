<!-- // Na view da rota 'listaEtiquetas.blade.php' -->
@if (isset($etiquetas) && count($etiquetas) > 0)
    <div class="card mt-5">
        <div class="card-header">
            <h2>Lista de etiquetas:</h2>
        </div>
        <div class="card-body">
            @foreach ($etiquetas as $etiqueta)
                <div class="row my-2 py-2 border-bottom align-items-center" style="transition: background-color 0.3s ease; border: 1px solid #ddd; box-shadow: 2px 2px 5px rgba(0,0,0,0.1);">
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
@endif
