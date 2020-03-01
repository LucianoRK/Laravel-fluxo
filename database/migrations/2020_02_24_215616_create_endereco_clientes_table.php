<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecoClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco_clientes', function (Blueprint $table) {
            $table->bigIncrements('id_endereco_cliente');
            $table->integer('fk_cliente');
            $table->integer('fk_cidade');
            $table->string('cep', 15)->nullable();
            $table->string('rua', 100)->nullable();
            $table->smallInteger('numero')->nullable();
            $table->string('complemento', 100)->nullable();
            $table->boolean('ativo')->default(true);;
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
        Schema::dropIfExists('endereco_clientes');
    }
}
