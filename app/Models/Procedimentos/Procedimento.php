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

    public function verificaProcedimentoExisteEmpresa($procedimento, $fk_empresa)
    {
        return Procedimento::select('id')
            ->where([ ['id', '=', $procedimento], ['fk_empresa', '=', $fk_empresa], ['ativo', '=', true] ])
            ->first();
    }
}
