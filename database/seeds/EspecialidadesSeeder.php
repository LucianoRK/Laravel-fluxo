<?php

use App\Models\Tratamentos\Especialidade;
use Illuminate\Database\Seeder;



class EspecialidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $especialidades = [
            [
                'id' => '1',
                'nome' => 'Clinico geral'
            ],
            [
                'id' => '2',
                'nome' => 'Ortodontia'
            ],
            [
                'id' => '3',
                'nome' => 'Implantodontia'
            ],
            [
                'id' => '4',
                'nome' => 'Odontopediatria'
            ],
            [
                'id' => '5',
                'nome' => 'Orofacial'
            ]
        ];
        foreach($especialidades as $especialidade){
            Especialidade::create($especialidade);  
        };
        
    }
}
