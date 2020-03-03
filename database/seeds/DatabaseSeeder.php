<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nome' => 'Administrador',
            'cpf' => '38589697029',
            'login' => 'admin',
            'senha' => Hash::make('@AdminX1690'),
            'qtd_acesso' => '10',
            'ativo' => '1',
        ]);
    }
}
