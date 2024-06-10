
        <!-- // Na view da rota 'listaPessoas.blade.php' -->
        @if (isset($pessoas) && count($pessoas) > 0)
            <h2>Lista das pessoas:</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pessoas as $pessoa)
                        <tr>
                            <td>{{ $pessoa->nome }}</td>
                            <td>{{ $pessoa->idade }}</td>
                            <td>
                                @if ($pessoa->status==1)
                                    Ativo
                                @else
                                    Inativo
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>