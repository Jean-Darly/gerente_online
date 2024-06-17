<!DOCTYPE html>
<html>

<head>
    <title>Botões que mudam o fundo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    @php
        $col = 6;
        $row = 16;
    @endphp

    <script>
        function submeterFormulario(param) {
            var coordenadas = $("#coordenadas").val();
            var cor = param.id;
            $("#cor").val(param.id);
            alert(cor);
            if (coordenadas == "" && cor == "cinza") {
                alert("Não tem nenhuma etiqueta CINZA\nEscolha ao mens uma.");
                return false;
            } 
            return param.form.submit();
        }
        $(document).ready(function () {
            var coordenadas = [];
            var cinza = 0;
            $('button.btn').click(function () {
                var buttonValue = $(this).val();
                var buttonId = $(this).attr('id');
                var buttonClass = $(this).attr('class');

                // Verificar se o elemento buttonValue existe no coordenadas
                var index = coordenadas.indexOf('(' + buttonValue + ')');
                if (index !== -1) {
                    // Remove coordenada no array o elemento do buttonValue
                    cinza--;
                    coordenadas.splice(index, 1);
                    $('#coordenadas').val(coordenadas);
                    $(this).removeClass('bg-secondary');
                    $(this).addClass('bg-primary');
                } else {
                    // Insere coordenada no array o elemento do buttonValue
                    cinza++;
                    coordenadas.push('(' + buttonValue + ')');
                    $('#coordenadas').val(coordenadas);
                    $(this).removeClass('bg-primary');
                    $(this).addClass('bg-secondary');
                }
                // alert(coordenadas);s
            });
        });
    </script>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Etiqueta</h5>
                    </div>
                    <div class="card-body">
                        @for ($r = 1; $r <= $row; $r++)
                            <div class="row mb-1">
                                @for ($c = 1; $c <= $col; $c++)
                                    <div class="col">
                                        <button type="button" value="{{$r < 10 ? "0" . $r : $r}},{{$c < 10 ? "0" . $c : $c}}"
                                            id="jean" style="width:100%;"
                                            class="text-white btn btn-outline-secondary bg-primary">
                                            {{$r < 10 ? "0" . $r : $r}}::{{$c<10?"0".$c:$c}} </button>
                                    </div>
                                @endfor
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="col">
                <form method="POST" id="printEtiqueta" action="/etiquetaCarrinho/print">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Instruções</h5>
                        </div>
                        <div class="card-body">
                            <div class="row p-3">
                                <div class="col">
                                    Imprima apenas as etiquetas de cor AZUL.
                                </div>
                                <div class="col">
                                    <input type="button" onclick="submeterFormulario(this);" id="azul" value="Azul"
                                        style="width:100%;" class="text-white btn btn-outline-secondary bg-primary"
                                        name="Azul">
                                </div>
                            </div>
                            <div class="row p-3">
                                <div class="col">
                                    Imprima apenas as etiquetas de cor CINZAS.
                                </div>
                                <div class="col">
                                    <input type="button" onclick="submeterFormulario(this);" value="Cinza" id="cinza"
                                        style="width:100%;" class="text-white btn btn-outline-dark bg-secondary"
                                        name="Cinza">
                                </div>
                            </div>
                            <div class="row p-3">
                                <div class="col">
                                    Imprima TODAS as etiquetas cor CINZAS e CINZA.
                                </div>
                                <div class="col">
                                    <input type="button" onclick="submeterFormulario(this);" value="Laranja"
                                        id="laranja" style="width:100%;"
                                        class="text-dark btn btn-outline-dark bg-warning" name="Laranja">
                                    <input type="text" name="coordenadas" id="coordenadas">
                                    <input type="text" name="cor" id="cor">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>