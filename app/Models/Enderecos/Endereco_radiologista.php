<?php

namespace App\Models\Enderecos;

use Illuminate\Database\Eloquent\Model;

class Endereco_radiologista extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fk_empresa', 'fk_radiologista', 'fk_cidade', 'cep', 'rua', 'numero', 'complemento', 'ativo'
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

    public function getEnderecoRadiologista($radiologia)
    {
        return Endereco_radiologista::select('endereco_radiologistas.*', 'cidades.fk_estado')
            ->where([['endereco_radiologistas.fk_radiologista', '=', $radiologia],])
            ->leftJoin('cidades', 'cidades.id', '=', 'endereco_radiologistas.fk_cidade')
            ->first();
    }
}
