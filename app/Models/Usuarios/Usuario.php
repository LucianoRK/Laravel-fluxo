<?php

namespace App\Models\Usuarios;

use App\Models\Empresas\Empresa;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
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
        'id', 'fk_empresa', 'fk_tipo_usuario', 'nome', 'cpf', 'data_nascimento', 'email', 'celular','login', 'senha', 'ativo',
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

    public function getAllusuarioAtivoEmpresa($fk_empresa)
    {
        return Usuario::select('usuarios.*', 'tipo_usuarios.nome as tipo_usuario')
            ->where([ ['usuarios.ativo', '=', true], ['fk_empresa', '=', $fk_empresa], ])
            ->join('tipo_usuarios', 'tipo_usuarios.id', '=', 'usuarios.fk_tipo_usuario')
            ->orderBy('usuarios.nome')
            ->get();
    }

    public function getAllUsuarioInativoEmpresa($fk_empresa)
    {
        return Usuario::select('usuarios.*', 'tipo_usuarios.nome as tipo_usuario')
            ->where([ ['usuarios.ativo', '=', false], ['fk_empresa', '=', $fk_empresa], ])
            ->join('tipo_usuarios', 'tipo_usuarios.id', '=', 'usuarios.fk_tipo_usuario')
            ->orderBy('usuarios.nome')
            ->get();
    }

    public function verificaLoginExiste($login)
    {
        return Usuario::select('id')
            ->where([ ['login', '=', $login], ])
            ->first();
    }

    public function verificaUsuarioExisteEmpresa($usuario, $fk_empresa)
    {
        return Usuario::select('id', 'senha')
            ->where([ ['usuarios.id', '=', $usuario], ['usuarios.fk_empresa', '=', $fk_empresa], ['usuarios.ativo', '=', true], ])
            ->first();
    }
}
