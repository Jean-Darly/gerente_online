<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::rename('utilidades_etiquetas_nomes_table', 'utilidades_etiquetas_nomes_tables');
        Schema::rename('utilidades_etiquetas_table', 'utilidades_etiquetas_tables');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::rename('utilidades_etiquetas_nomes_tables', 'utilidades_etiquetas_nomes_table');
        Schema::rename('utilidades_etiquetas_tables', 'utilidades_etiquetas_table');
    }
}
