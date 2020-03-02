<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonificacaoHistoricosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonificacao_historicos', function (Blueprint $table) {
            $table->bigIncrements('id_bonificacao_historico');
            $table->integer('fk_bonificacao');
            $table->integer('fk_parcela');
            $table->integer('valor_entrada');
            $table->integer('valor_usado');
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bonificacao_historicos');
    }
}
