<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChamadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamados', function (Blueprint $table) {
            $table->bigIncrements('id_chamado');
            $table->integer('fk_empresa');
            $table->integer('fk_cliente');
            $table->integer('fk_tratamento');
            $table->integer('fk_usuario_aberto');
            $table->integer('fk_usuario_fechado');
            $table->string('assunto', 100);
            $table->dateTime('data_fechado');
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
        Schema::dropIfExists('chamados');
    }
}
