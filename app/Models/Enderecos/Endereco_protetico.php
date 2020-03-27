<?php

namespace App\Models\Enderecos;

use Illuminate\Database\Eloquent\Model;

class Endereco_protetico extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

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

    public function getEnderecoProtetico($protetico)
    {
        return Endereco_protetico::select('endereco_proteticos.*', 'cidades.fk_estado')
            ->where([['endereco_proteticos.fk_protetico', '=', $protetico],])
            ->leftJoin('cidades', 'cidades.id', '=', 'endereco_proteticos.fk_cidade')
            ->first();
    }
}
