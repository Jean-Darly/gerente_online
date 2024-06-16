<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('utilidades_etiquetas_configuracoes_tables', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->float('altura_etiqueta');
            $table->float('largura_etiqueta');
            $table->integer('qt_coluna_pagina');
            $table->integer('qt_linha_pagina');
            $table->float('margem_etiqueta_topo');
            $table->float('margem_etiqueta_esquerda');
            $table->float('margem_etiqueta_direita');
            $table->float('margem_etiqueta_rodape');
            $table->float('margem_pagina_topo');
            $table->float('margem_pagina_esquerda');
            $table->float('margem_pagina_direita');
            $table->float('margem_pagina_rodape');
            $table->integer('tamanhoFonteL01')->default(22);
            $table->integer('tamanhoFonteL02')->default(17);
            $table->integer('tamanhoFonteL03')->default(17);
            $table->integer('tamanhoFonteL04')->default(11);
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilidades_etiquetas_configuracoes_tables');
    }
};
