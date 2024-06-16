<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UtilidadesEtiquetasConfiguracoesTable extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'utilidades_etiquetas_configuracoes_tables';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'altura_etiqueta',
        'largura_etiqueta',
        'qt_coluna_pagina',
        'qt_linha_pagina',
        'margem_etiqueta_topo',
        'margem_etiqueta_esquerda',
        'margem_etiqueta_direita',
        'margem_etiqueta_rodape',
        'margem_pagina_topo',
        'margem_pagina_esquerda',
        'margem_pagina_direita',
        'margem_pagina_rodape',
        'status',
        'tamanhoFonteL01',
        'tamanhoFonteL02',
        'tamanhoFonteL03',
        'tamanhoFonteL04',
    ];
}
