<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilidadesEtiquetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilidades_etiquetas_table', function (Blueprint $table) {
            $table->increments('id');
            $table->date('validade')->nullable(false);
            $table->integer('quantidade')->nullable(false);
            $table->string('status', 255)->nullable(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->integer('id_etiqueta')->unsigned()->nullable();
            $table->string('obs', 20)->nullable();
            
            $table->foreign('id_etiqueta')->references('id')->on('utilidades_etiquetas_nomes_table');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilidades_etiquetas_table');
    }
}
