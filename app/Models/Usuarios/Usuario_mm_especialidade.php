<?php

namespace App\Models\Usuarios;

use Illuminate\Database\Eloquent\Model;

class Usuario_mm_especialidade extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fk_empresa', 'fk_usuario', 'fk_especialidade'
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

    public function getEspecialidadesUsuarioEmpresa($usuario, $fk_empresa)
    {
        return Usuario_mm_especialidade::select('fk_especialidade')
            ->where([ ['fk_usuario', '=', $usuario], ['fk_empresa', '=', $fk_empresa], ['ativo', '=', true] ])
            ->groupBy('fk_especialidade')
            ->get();
    }
}
