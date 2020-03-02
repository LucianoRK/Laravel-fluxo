<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->bigIncrements('id_agenda');
            $table->integer('fk_empresa');
            $table->integer('fk_usuario_dentista')->nullable();
            $table->integer('fk_cliente')->nullable();
            $table->integer('fk_tratamento')->nullable();
            $table->smallInteger('status');
            $table->string('nome');
            $table->date('data_agendamento');
            $table->time('hora_agendamento');
            $table->time('hora_presenca')->nullable();
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
        Schema::dropIfExists('agendas');
    }
}
