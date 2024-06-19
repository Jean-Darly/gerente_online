@php
# pega o retorno do sql passado pelo controller e junta tudo em um só array
# de acordo com a quantidade se nome X tem quantidade Y o novo array tera x repedido y vezes
$mergeNovoArray = [];
foreach ($carrinhoEtiquetas as $item) {
    for ($i = 0; $i < $item['quantidade']; $i++) {
        $mergeNovoArray[] = $item;
    }
    // para ler use o indice ex.:$mergeNovoArray[0]-nome
}

# pega as configurações do layout vindo do controller
foreach ($layoutEtiquetas as $loe) {
    $id = $loe['id'];
    $nome = $loe['nome'];
    $altura_etiqueta = $loe['altura_etiqueta'];
    $largura_etiqueta = $loe['largura_etiqueta'];
    $qt_coluna_pagina = $loe['qt_coluna_pagina'];
    $qt_linha_pagina = $loe['qt_linha_pagina'];
    $margem_etiqueta_topo = $loe['margem_etiqueta_topo'];
    $margem_etiqueta_esquerda = $loe['margem_etiqueta_esquerda'];
    $margem_etiqueta_direita = $loe['margem_etiqueta_direita'];
    $margem_etiqueta_rodape = $loe['margem_etiqueta_rodape'];
    $margem_pagina_topo = $loe['margem_pagina_topo'];
    $margem_pagina_esquerda = $loe['margem_pagina_esquerda'];
    $margem_pagina_direita = $loe['margem_pagina_direita'];
    $margem_pagina_rodape = $loe['margem_pagina_rodape'];
    $tamanhoFonteL01 = $loe['tamanhoFonteL01'];
    $tamanhoFonteL02 = $loe['tamanhoFonteL02'];
    $tamanhoFonteL03 = $loe['tamanhoFonteL03'];
    $tamanhoFonteL04 = $loe['tamanhoFonteL04'];
    $status = $loe['status'];
    $created_at = $loe['created_at'];
    $updated_at = $loe['updated_at'];
}

$coordenadas = isset($_POST['coordenadas']) ? $_POST['coordenadas'] : null;
$coordenadasCinza = isset($_POST['coordenadasCinza']) ? $_POST['coordenadasCinza'] : null;
$cor = isset($_POST['cor']) ? $_POST['cor'] : 'laranja';
if ($cor=="cinza") $coordenadas=$coordenadasCinza;
if ($cor=="laranja") $coordenadas=null;

$style = "
    @page {
        size: 210mm 297mm;
        margin: {$margem_pagina_topo}mm {$margem_pagina_direita}mm {$margem_pagina_rodape}mm {$margem_pagina_esquerda}mm; /*top, right, bottom, left*/
    }

    body {
        margin: 0;
        padding: 0;
        font-family: Ubuntu, sans-serif;
    }

    .rectangle {
        width: {$largura_etiqueta}mm;
        height: {$altura_etiqueta}mm;
        margin: {$margem_etiqueta_topo}mm {$margem_etiqueta_direita}mm {$margem_etiqueta_rodape}mm {$margem_etiqueta_esquerda}mm;
        border: 1px solid white;
        display: inline-block;
        vertical-align: top;
    }

    .rectangle_none {
        width: {$largura_etiqueta}mm;
        height: {$altura_etiqueta}mm;
        margin: {$margem_etiqueta_topo}mm {$margem_etiqueta_direita}mm {$margem_etiqueta_rodape}mm {$margem_etiqueta_esquerda}mm;
        border: 1px solid white;
        display: inline-block;
        vertical-align: top;
    }

    .linha01 {
        text-align: center;
        font-weight: bold;
        font-size: {$tamanhoFonteL01}px; /*22px;*/
    }

    .linha02 {
        text-align: center;
        font-size: {$tamanhoFonteL02}1px; /*17px;*/
    }

    .linha03 {
        text-align: center;
        font-size: {$tamanhoFonteL03}px; /*17px;*/
    }                        

    .linha04 {
        text-align: center;
        font-size: {$tamanhoFonteL04}px; /*11px;*/
    }     
";
$index=0;
@endphp
<!DOCTYPE html>
<html>

<head>
    <style>
        {{ $style }}
    </style>

</head>

<body>
    <div class="row">
        @for ($r = 1; $r <= $qt_linha_pagina; $r++)
            <div class="row">
                @for ($c = 1; $c <= $qt_coluna_pagina; $c++)
                @php
                    $linha =$r<10?"0".(string)$r:(string)$r;
                    $coluna=$c<10?"0".(string)$c:(string)$c;
                    $posicao = strpos($coordenadas, "({$linha},{$coluna})");
                @endphp                

                    @if ($posicao !== false) 
                        <!-- A coordenada foi encontrada na posição: -->
                        <div class="rectangle_none">
                            <div class="linha02"></div>
                            <div class="linha01"></div>
                            <div class="linha03"></div>
                            <div class="linha04"></div>
                        </div>
                    @else
                        <!-- A coordenada não foi encontrada. -->
                        <div class="rectangle">
                            @if ($index<count($mergeNovoArray))
                                <div class="linha02"></div>
                                <div class="linha01">{{ $mergeNovoArray[$index]->nome }}</div>
                                <div class="linha03">{{ $mergeNovoArray[$index]->obs }}</div>
                                <div class="linha04">{{ $mergeNovoArray[$index++]->validade }}</div>
                            @endif
                        </div>
                    @endif
                @endfor
            </div>
        @endfor
    </div>
</body>

</html>