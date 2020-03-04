<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogParcelaRecebidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_parcela_recebidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fk_usuario');
            $table->integer('fk_tratamento');
            $table->integer('fk_parcela');
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
        Schema::dropIfExists('log_parcela_recebidas');
    }
}
