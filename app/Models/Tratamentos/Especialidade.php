<?php

namespace App\Models\Tratamentos;

use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome'
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

    public function getAllEspecialidades()
    {
        return Especialidade::select('*')
            ->where([ ['ativo', '=', true], ])
            ->orderBy('nome')
            ->get();
    }
}
