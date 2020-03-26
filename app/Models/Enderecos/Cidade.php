<?php

namespace App\Models\Enderecos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cidade extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'fk_estado', 'nome', 'ativo'
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

    public function getAllCidadeEstado($fk_estado)
    {
        return Cidade::select('cidades.*')
            ->where([ ['fk_estado', '=', $fk_estado] ])
            ->orderBy('cidades.nome')
            ->get();
    }
}
