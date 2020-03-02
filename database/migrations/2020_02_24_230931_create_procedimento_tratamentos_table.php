<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedimentoTratamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedimento_tratamentos', function (Blueprint $table) {
            $table->bigIncrements('id_procedimento_tratamento');
            $table->integer('fk_tratamento');
            $table->integer('fk_procedimento');
            $table->integer('fk_usuario_dentista');
            $table->integer('valor')->nullable();
            $table->boolean('concluido')->nullable();;
            $table->smallInteger('percentual_concluido')->nullable();
            $table->timestamp('data_conclusao')->nullable();
            $table->string('observacoes')->nullable();
            $table->boolean('cancelado')->default(false);
            $table->timestamp('data_cancelado')->nullable();
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
        Schema::dropIfExists('procedimento_tratamentos');
    }
}
