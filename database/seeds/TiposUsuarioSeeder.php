<?php

use App\Models\Usuarios\Tipo_usuario;
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
                'id' => '1',
                'nome' => 'Master'
            ],
            [
                'id' => '2',
                'nome' => 'Administrador'
            ],
            [
                'id' => '3',
                'nome' => 'Dentista'
            ],
            [
                'id' => '4',
                'nome' => 'Colaborador'
            ]
        ];
        foreach($tipos as $tipo){
            Tipo_usuario::create($tipo);  
        };
    }
}
