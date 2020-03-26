<?php

namespace App\Models\Empresas;

use Illuminate\Database\Eloquent\Model;

class Protetico extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
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

    public function getAllproteticoAtivoEmpresa($fk_empresa)
    {
        return Protetico::select('proteticos.*')
            ->where([ ['proteticos.ativo', '=', true], ['fk_empresa', '=', $fk_empresa] ])
            ->orderBy('proteticos.razao_social')
            ->get();
    }

    public function getAllproteticoInativoEmpresa($fk_empresa)
    {
        return Protetico::select('proteticos.*')
            ->where([ ['proteticos.ativo', '=', false], ['fk_empresa', '=', $fk_empresa] ])
            ->orderBy('proteticos.razao_social')
            ->get();
    }

    public function getDadosProteticoEmpresa($protetico, $fk_empresa)
    {
        return Protetico::select('proteticos.*', 'empresas.nome AS nome_empresa')
            ->where([ ['proteticos.id', '=', $protetico], ['proteticos.fk_empresa', '=', $fk_empresa], ['proteticos.ativo', '=', true] ])
            ->join('empresas', 'empresas.id', '=', 'proteticos.fk_empresa')
            ->orderBy('proteticos.razao_social')
            ->first();
    }

    public function verificaUsuarioExisteEmpresa($protetico, $fk_empresa)
    {
        return Protetico::select('id')
            ->where([ ['id', '=', $protetico], ['fk_empresa', '=', $fk_empresa], ['ativo', '=', true] ])
            ->first();
    }
}
