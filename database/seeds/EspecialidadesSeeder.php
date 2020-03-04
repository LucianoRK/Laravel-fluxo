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
                'id_especialidade' => '1',
                'nome' => 'Clinico geral'
            ],
            [
                'id_especialidade' => '2',
                'nome' => 'Ortodontia'
            ],
            [
                'id_especialidade' => '3',
                'nome' => 'Implantodontia'
            ],
            [
                'id_especialidade' => '4',
                'nome' => 'Odonto Pediatria'
            ],
            [
                'id_especialidade' => '5',
                'nome' => 'Orofacial'
            ]
        ];
        foreach($especialidades as $especialidade){
            Especialidade::create($especialidade);  
        };
        
    }
}
