<?php

namespace App\Models\Permissoes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Permissao_mm_usuario extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fk_usuario', 'fk_pemissao', 'acesso_regra'
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

    public function getAllPermissoesUsuario($usuario, $fk_empresa)
    {
        $data = DB::table('permissao_mm_usuarios')
        ->where([ ['fk_usuario', '=', $usuario], ['fk_empresa', '=', $fk_empresa], ['acesso_regra', '=', true], ])
        ->select('fk_permissao')
        ->get();

        return $data;
    }
}
