<?php

namespace App\Models\Logs;

use Illuminate\Database\Eloquent\Model;

class Log_sistema extends Model
{
    protected $table = 'log_sistema';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'tabela', 'tipo', 'fk_usuario', 'fk_empresa'  
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
