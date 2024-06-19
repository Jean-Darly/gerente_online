
        <!-- // Na view da rota 'listaEtiquetas.blade.php' -->
        @if (isset($etiquetas) && count($etiquetas) > 0)
            <h2>Lista de etiquetas:</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($etiquetas as $etiqueta)
                        <tr>
                            <td>{{ $etiqueta->nome }}</td>
                            <td>
                                <a href="{{ route('etiqueta.edit', $etiqueta->id) }}" class="btn btn-primary">
                                    Editar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>