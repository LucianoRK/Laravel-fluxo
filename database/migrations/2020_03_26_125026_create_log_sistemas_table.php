<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogSistemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_sistemas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tabela', 100);
            $table->integer('tipo');
            $table->longText('descricao');
            $table->integer('fk_empresa');
            $table->integer('fk_usuario');
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
        Schema::dropIfExists('log_sistemas');
    }
}
