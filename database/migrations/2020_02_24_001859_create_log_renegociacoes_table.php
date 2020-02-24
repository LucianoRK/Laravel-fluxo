<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogRenegociacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_renegociacoes', function (Blueprint $table) {
            $table->bigIncrements('id_log_renegociacao');
            $table->integer('fk_usuario');
            $table->integer('fk_tratamento');
            $table->integer('fk_renegociacao');
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
        Schema::dropIfExists('log_renegociacoes');
    }
}
