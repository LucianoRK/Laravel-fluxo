<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fk_empresa');
            $table->integer('fk_cliente');
            $table->string('nome', 100);
            $table->string('parentesco', 100)->nullable();
            $table->string('cpf', 15)->nullable();
            $table->string('rg', 15)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('sexo', 20)->nullable();
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
        Schema::dropIfExists('dependentes');
    }
}
