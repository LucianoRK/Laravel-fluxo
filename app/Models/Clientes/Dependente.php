<?php

namespace App\Models\Clientes;

use Illuminate\Database\Eloquent\Model;

class Dependente extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "id","fk_empresa","fk_cliente","fk_dependente_tipo","nome","cpf","rg","data_nascimento","sexo","nacionalidade","cel_dependente","email","email","ativo"
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
