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
            $table->bigIncrements('id_cliente');
            $table->integer('fk_empresa');
            $table->integer('fk_indicador')->nullable();
            $table->string('nome', 100);
            $table->string('cpf', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('sexo', 30)->nullable();
            $table->string('profissao', 100)->nullable();
            $table->integer('renda_media')->nullable();
            $table->boolean('inadimplente')->default(false);
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
