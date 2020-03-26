<?php

namespace App\Models\Enderecos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Estado extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'nome', 'uf', 'ativo', 
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

    public function getAllEstados()
    {
        return Estado::select('estados.*')
            ->where([ ['ativo', '=', true] ])
            ->orderBy('estados.nome')
            ->get();
    }
}
