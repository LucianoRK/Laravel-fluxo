<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcelas', function (Blueprint $table) {
            $table->bigIncrements('id_parcela');
            $table->integer('fk_empresa');
            $table->integer('fk_tratamento');
            $table->integer('fk_cliente');
            $table->integer('fk_orto_adicional')->default(null);
            $table->date('data_vencimento');
            $table->boolean('status_pago')->default(false);
            $table->dateTime('data_pagamento')->nullable();
            $table->bigInteger('valor');
            $table->bigInteger('descontos')->nullable();
            $table->bigInteger('bonificacoes')->nullable();
            $table->bigInteger('juros')->nullable();
            $table->bigInteger('multas')->nullable();
            $table->bigInteger('valor_pago')->nullable();
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
        Schema::dropIfExists('parcelas');
    }
}
