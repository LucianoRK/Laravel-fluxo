<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTratamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamentos', function (Blueprint $table) {
            $table->bigIncrements('id_tratamento');
            $table->integer('fk_empresa');
            $table->integer('fk_usuario_dentista')->nullable();
            $table->integer('fk_cliente')->nullable();
            $table->integer('fk_dependente')->nullable();
            $table->integer('fk_especialidade')->nullable();
            $table->smallInteger('status');
            $table->dateTime('data_efetivacao')->nullable();
            $table->dateTime('data_conclusao')->nullable();
            $table->dateTime('data_cancelamento')->nullable();
            $table->bigInteger('valor_contratado');
            $table->bigInteger('valor_atual');
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
        Schema::dropIfExists('tratamentos');
    }
}
