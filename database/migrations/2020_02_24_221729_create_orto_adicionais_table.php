<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrtoAdicionaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orto_adicionais', function (Blueprint $table) {
            $table->bigIncrements('id_orto_adicional');
            $table->integer('fk_tratamento');
            $table->string('descricao', 100)->nullable();
            $table->bigInteger('valor');
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
        Schema::dropIfExists('orto_adicionais');
    }
}
