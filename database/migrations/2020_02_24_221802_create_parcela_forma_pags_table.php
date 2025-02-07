<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelaFormaPagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcela_forma_pags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fk_pagamento');
            $table->smallInteger('forma_pag')->nullable();
            $table->bigInteger('valor_pago');
            $table->boolean('baixa_automatica');
            $table->boolean('ativo');
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
        Schema::dropIfExists('parcela_forma_pags');
    }
}
