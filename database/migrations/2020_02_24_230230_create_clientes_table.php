<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fk_empresa');
            $table->integer('fk_indicador')->nullable();
            $table->string('nome', 100);
            $table->string('cpf', 15);
            $table->string('rg', 10)->nullable();
            $table->date('data_nascimento');
            $table->string('sexo', 30);
            $table->string('estado_civil', 30);
            $table->string('nacionalidade', 30);
            $table->string('cel_titular', 20);
            $table->string('cel_recado', 100);
            $table->string('email', 100)->nullable();
            $table->string('profissao', 100)->nullable();
            $table->string('trabalho', 100)->nullable();
            $table->string('fone_trabalho', 100)->nullable();
            $table->integer('renda_media')->nullable();
            $table->string('residencia', 20)->nullable();
            $table->string('nome_mae_titular', 100);
            $table->longText('obs_cadastro')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
