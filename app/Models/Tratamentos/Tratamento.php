<?php

namespace App\Models\Tratamentos;

use Illuminate\Database\Eloquent\Model;

class Tratamento extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 
        'fk_empresa', 
        'fk_usuario_dentista', 
        'fk_cliente', 
        'fk_dependente', 
        'fk_especialidade', 
        'status', 
        'data_efetivacao',
        'data_conclusao', 
        'data_cancelamento', 
        'valor_contratado',
        'valor_atual', 
        'ativo'
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
