<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferenciaTratamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferencia_tratamentos', function (Blueprint $table) {
            $table->bigIncrements('id_transferencia_tratamento');
            $table->integer('fk_empresa');
            $table->integer('fk_tratamento');
            $table->integer('fk_usuario_dentista_origem');
            $table->integer('fk_usuario_dentista_destino');
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
        Schema::dropIfExists('transferencia_tratamentos');
    }
}
