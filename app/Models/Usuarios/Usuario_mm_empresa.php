<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Model;

class Usuario_mm_empresa extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fk_usuario', 'fk_empresa',
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

    public function getAllEmpresasUsuario($id_usuario)
    {
        return Usuario_mm_empresa::select('empresas.nome', 'empresas.id')
            ->where([ ['fk_usuario', '=', $id_usuario], ['empresas.ativo', '=', true], ])
            ->join('empresas', 'empresas.id', '=', 'usuario_mm_empresas.fk_empresa')
            ->orderBy('empresas.nome')
            ->get();
    }
}
