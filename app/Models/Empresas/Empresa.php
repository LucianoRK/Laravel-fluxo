<?php

namespace App\Models\Empresas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Empresa extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nome', 'telefone', 'cnpj', 'data_ativacao', 'bloqueada', 'data_bloqueio', 'ativo',
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

    public function getNomeEmpresa($fk_empresa)
    {
        $data = DB::table('empresas')->find($fk_empresa);

        return $data;
    }

    public function getAllEmpresasUsuario($id_usuario)
    {
        $data = DB::table('usuario_mm_empresas')
            ->where([ ['fk_usuario', '=', $id_usuario], ['empresas.ativo', '=', true], ])
            ->join('empresas', 'empresas.id', '=', 'usuario_mm_empresas.fk_empresa')
            ->select('empresas.nome', 'empresas.id')
            ->orderBy('empresas.nome')
            ->get();

        return $data;
    }
}
