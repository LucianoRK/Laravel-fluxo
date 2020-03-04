<?php

use App\Models\Usuarios\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create(
            [
                'nome' => 'Administrador',
                'cpf' => '38589697029',
                'login' => 'admin',
                'senha' => Hash::make('@AdminX1690'),
                'qtd_acesso' => '10',
                'ativo' => '1'
            ]
        );
    }
}
