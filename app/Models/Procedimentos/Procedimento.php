<?php

namespace App\Models\Procedimentos;

use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'fk_empresa', 'fk_especialidade', 'fk_categoria', 'nome', 'protetico', 'ativo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    public function getAllProcedimentoEmpresa($empresa)
    {
        return Procedimento::select('procedimentos.id', 'procedimentos.valor_sugerido', 'especialidades.nome AS nome_esp', 'procedimento_categorias.nome AS nome_cat',
                'procedimentos.nome AS nome_proc', 'protetico'
            )
            ->where([['procedimentos.fk_empresa', '=', $empresa], ['procedimentos.ativo', '=', true]])
            ->join('especialidades', 'especialidades.id', '=', 'procedimentos.fk_especialidade')
            ->join('procedimento_categorias', 'procedimento_categorias.id', '=', 'procedimentos.fk_categoria')
            ->orderBy('procedimento_categorias.nome')
            ->get();
    }

    public function getProcedimentoEmpresa($empresa, $id)
    {
        return Procedimento::select('procedimentos.id', 'procedimentos.valor_sugerido', 'especialidades.nome AS nome_esp', 'procedimento_categorias.nome AS nome_cat',
                'procedimentos.nome AS nome_proc', 'protetico'
            )
            ->where([['procedimentos.id', '=', $id], ['procedimentos.fk_empresa', '=', $empresa], ['procedimentos.ativo', '=', true]])
            ->join('especialidades', 'especialidades.id', '=', 'procedimentos.fk_especialidade')
            ->join('procedimento_categorias', 'procedimento_categorias.id', '=', 'procedimentos.fk_categoria')
            ->orderBy('procedimento_categorias.nome')
            ->first();
    }

    public function verificaProcedimentoExisteEmpresa($procedimento, $fk_empresa)
    {
        return Procedimento::select('id')
            ->where([ ['id', '=', $procedimento], ['fk_empresa', '=', $fk_empresa], ['ativo', '=', true] ])
            ->first();
    }
}
