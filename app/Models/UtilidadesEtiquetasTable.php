<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UtilidadesEtiquetasTable extends Model
{
    protected $fillable = [
        'id_etiqueta',
        'validade',
        'quantidade',
        'obs',
        'status'
    ];
        // Relacionamento com a tabela utilidades_etiquetas_nomes_tables
        public function etiquetaNome()
        {
            return $this->belongsTo(UtilidadesEtiquetasNomesTable::class, 'id_etiqueta', 'id');
        }
}
