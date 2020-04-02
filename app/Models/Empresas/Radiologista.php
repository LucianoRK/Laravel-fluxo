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

    public function getAllradiologistaAtivoEmpresa($fk_empresa)
    {
        return Radiologista::select('radiologistas.*')
            ->where([['radiologistas.ativo', '=', true], ['fk_empresa', '=', $fk_empresa]])
            ->orderBy('radiologistas.razao_social')
            ->get();
    }

    public function getAllradiologistaInativoEmpresa($fk_empresa)
    {
        return Radiologista::select('radiologistas.*')
            ->where([['radiologistas.ativo', '=', false], ['fk_empresa', '=', $fk_empresa]])
            ->orderBy('radiologistas.razao_social')
            ->get();
    }

    public function getDadosRadiologistaEmpresa($radiologista, $fk_empresa)
    {
        return Radiologista::select('radiologistas.*', 'empresas.nome AS nome_empresa')
            ->where([['radiologistas.id', '=', $radiologista], ['radiologistas.fk_empresa', '=', $fk_empresa], ['radiologistas.ativo', '=', true]])
            ->join('empresas', 'empresas.id', '=', 'radiologistas.fk_empresa')
            ->orderBy('radiologistas.razao_social')
            ->first();
    }

    public function verificaRadiologistaExisteEmpresa($radiologista, $fk_empresa)
    {
        return Radiologista::select('id')
            ->where([['id', '=', $radiologista], ['fk_empresa', '=', $fk_empresa], ['ativo', '=', true]])
            ->first();
    }
}
