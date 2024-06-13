<!-- resources/views/layouts/teste.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <!-- Cabeçalho da página -->
    <title>Etiqueta</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body>
    <div class="container">
        <!-- Conteúdo da página -->
        <div class="container">
            <h1>index etiqueta</h1>
            <div class="container mt-5">
                <h1>Autocomplete com jQuery e Laravel</h1>
                <form id="etiquetaForm" method="POST" action="http://127.0.0.1:8000/etiqueta/store">
                    <input type="hidden" name="_token" value="h8oREr4IfK3CUfEkboJR0dcATZvQFpR8ZPJsJjia"
                        autocomplete="off">
                    <div class="mb-3">
                        <label for="etiqueta" class="form-label">Escolha uma etiqueta:</label>
                        <input type="text" class="form-control" id="etiqueta" name="etiqueta"
                            placeholder="Digite ou escolha uma etiqueta">
                        <input type="hidden" id="etiqueta_id" name="etiqueta_id">
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- No final do body -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="http://127.0.0.1:8000/js/autocomplete.js"></script>

</body>

</html>