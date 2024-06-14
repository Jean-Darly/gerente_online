<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UtilidadesEtiquetasNomesTable extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
    ];
        // Relacionamento com a tabela utilidades_etiquetas_tables
        public function etiquetas()
        {
            return $this->hasMany(UtilidadesEtiquetasTable::class, 'id_etiqueta', 'id');
        }
}
