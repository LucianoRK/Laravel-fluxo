<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConjugeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conjuge', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fk_empresa');
            $table->integer('fk_cliente');
            $table->string('nome', 100);
            $table->string('cpf', 15);
            $table->string('rg', 10)->nullable();
            $table->date('data_nascimento');
            $table->string('sexo', 30);
            $table->string('nacionalidade', 30);
            $table->string('celular', 20);
            $table->string('profissao', 100)->nullable();
            $table->integer('renda_media')->nullable();
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
        Schema::dropIfExists('conjuge');
    }
}
