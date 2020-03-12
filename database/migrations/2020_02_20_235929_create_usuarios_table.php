<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fk_empresa');
            $table->integer('fk_tipo_usuario');
            $table->string('nome', 50);
            $table->string('cpf', 11);
            $table->date('data_nascimento')->nullable();
            $table->string('email', 50)->nullable();
            $table->string('celular', 20)->nullable();
            $table->string('login', 30);
            $table->string('senha', 100);
            $table->smallInteger('qtd_acesso');
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
        Schema::dropIfExists('usuarios');
    }
}
