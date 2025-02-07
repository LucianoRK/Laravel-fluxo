<?php

namespace App\Models\Enderecos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Endereco_usuario extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'fk_usuario', 'fk_cidade', 'cep', 'logradouro', 'numero', 'complemento', 'ativo'
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

    public function getEnderecoUsuario($usuario)
    {
        return Endereco_usuario::select('endereco_usuarios.*', 'cidades.fk_estado')
            ->where([ ['endereco_usuarios.fk_usuario', '=', $usuario], ])
            ->leftJoin('cidades', 'cidades.id', '=', 'endereco_usuarios.fk_cidade')
            ->first();
    }
}
