<?php

namespace App\Models\Procedimentos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Procedimento_categoria extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'fk_empresa', 'nome', 'ativo'
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

    public function getAllCategoriaEmpresa($empresa)
    {
        return Procedimento_categoria::select('id', 'fk_empresa', 'nome', 'ativo')
            ->where([ ['fk_empresa', '=', $empresa], ['ativo', '=', true], ])
            ->orderBy('nome')
            ->get();
    }
}
