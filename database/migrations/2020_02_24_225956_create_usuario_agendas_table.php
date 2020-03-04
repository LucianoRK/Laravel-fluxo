<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_agendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fk_usuario');
            $table->date('data');
            $table->time('hora_intervalo_inicio')->nullable();
            $table->time('hora_intervalo_fim')->nullable();
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
        Schema::dropIfExists('usuario_agendas');
    }
}
