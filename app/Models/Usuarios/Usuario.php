<?php

namespace App\Models\Usuarios;

use App\Models\Empresas\Empresa;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Usuario extends Authenticatable
{
    use Notifiable;

    public function getAuthPassword()
    {
        return $this->senha;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'fk_empresa', 'fk_tipo_usuario', 'nome', 'cpf', 'data_nascimento', 'email', 'login', 'senha', 'ativo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'senha', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAllUsuarioAtivo($fk_empresa)
    {
        $data = DB::table('usuarios')
            ->where([ ['ativo', '=', '1'], ['fk_empresa', '=', "$fk_empresa"], ])
            ->join('tipo_usuarios', 'tipo_usuarios.id', '=', 'usuarios.fk_tipo_usuario')
            ->select('usuarios.*', 'tipo_usuarios.nome as tipo_usuario')
            ->orderBy('usuarios.nome')
            ->get();

        return $data;
    }

    public function getAllUsuarioInativo($fk_empresa)
    {
        $data = DB::table('usuarios')
            ->where([ ['ativo', '=', '0'], ['fk_empresa', '=', "$fk_empresa"], ])
            ->join('tipo_usuarios', 'tipo_usuarios.id', '=', 'usuarios.fk_tipo_usuario')
            ->select('usuarios.*', 'tipo_usuarios.nome as tipo_usuario')
            ->orderBy('usuarios.nome')
            ->get();

        return $data;
    }
}
