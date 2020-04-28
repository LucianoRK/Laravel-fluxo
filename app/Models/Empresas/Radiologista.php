<?php

namespace App\Models\Empresas;

use Illuminate\Database\Eloquent\Model;

class Radiologista extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'fk_empresa', 'razao_social', 'nome_fantasia', 'cnpj', 'email', 'telefone', 'celular', 'valor_sugerido', 'ativo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public function verificaRadiologistaExisteEmpresa($radiologista, $fk_empresa)
    {
        return Radiologista::select('id')
            ->where([['id', '=', $radiologista], ['fk_empresa', '=', $fk_empresa], ['ativo', '=', true]])
            ->first();
    }
}
