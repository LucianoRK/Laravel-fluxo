<?php

use App\Http\Models\Usuarios\Tipo_usuario;
use Illuminate\Database\Seeder;

class TiposUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = [
            [
                'id_tipo_usuario' => '1',
                'nome' => 'Master'
            ],
            [
                'id_tipo_usuario' => '2',
                'nome' => 'Administrador'
            ],
            [
                'id_tipo_usuario' => '3',
                'nome' => 'Dentista'
            ],
            [
                'id_tipo_usuario' => '4',
                'nome' => 'Colaborador'
            ]
        ];
        foreach($tipos as $tipo){
            Tipo_usuario::create($tipo);  
        };
    }
}
