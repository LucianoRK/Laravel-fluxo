<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissaoMmUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissao_mm_usuarios', function (Blueprint $table) {
            $table->integer('fk_usuario');
            $table->integer('fk_empresa');
            $table->integer('fk_permissao');
            $table->boolean('acesso_regra');
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
        Schema::dropIfExists('permissao_mm_usuarios');
    }
}
