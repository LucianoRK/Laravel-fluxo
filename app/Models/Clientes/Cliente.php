<?php

namespace App\Models\Clientes;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'fk_empresa', 'fk_indicador', 'nome', 'cpf', 'data_nascimento', 'sexo', 'cel_titular', 'cel_recado', 'email', 'celular_recado', 'profissao', 'renda_media', 'inadimplente', 'ativo'
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
}
