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

    public function getAllUsuarioAtivo($fk_empresa)
    {
        $data = DB::table('usuarios')
            ->where([ ['usuarios.ativo', '=', true], ['fk_empresa', '=', $fk_empresa], ])
            ->join('tipo_usuarios', 'tipo_usuarios.id', '=', 'usuarios.fk_tipo_usuario')
            ->select('usuarios.*', 'tipo_usuarios.nome as tipo_usuario')
            ->orderBy('usuarios.nome')
            ->get();

        return $data;
    }

    public function getAllUsuarioInativo($fk_empresa)
    {
        $data = DB::table('usuarios')
            ->where([ ['usuarios.ativo', '=', false], ['fk_empresa', '=', $fk_empresa], ])
            ->join('tipo_usuarios', 'tipo_usuarios.id', '=', 'usuarios.fk_tipo_usuario')
            ->select('usuarios.*', 'tipo_usuarios.nome as tipo_usuario')
            ->orderBy('usuarios.nome')
            ->get();

        return $data;
    }

    public function desativarUsuario($usuario, $fk_empresa)
    { 
        $data = DB::table('usuarios')
            ->where([ ['id', '=', $usuario], ['fk_empresa', '=', $fk_empresa], ])
            ->update(['ativo' => false]);

        return $data;
    }

    public function ativarUsuario($usuario, $fk_empresa)
    { 
        $data = DB::table('usuarios')
            ->where([ ['id', '=', $usuario], ['fk_empresa', '=', $fk_empresa], ])
            ->update(['ativo' => true]);

        return $data;
    }

    public function getDadosUsuario($usuario, $fk_empresa)
    {
        $data = DB::table('usuarios')
        ->where([ ['usuarios.id', '=', $usuario], ['usuarios.fk_empresa', '=', $fk_empresa], ['usuarios.ativo', '=', true], ])
        ->join('empresas', 'empresas.id', '=', 'usuarios.fk_empresa')
        ->join('tipo_usuarios', 'tipo_usuarios.id', '=', 'usuarios.fk_tipo_usuario')
        ->select('usuarios.*', 'empresas.nome AS nome_empresa', 'tipo_usuarios.nome AS nome_tipo_usuario')
        ->first();

        return $data;
    }

    public function verificaLoginExiste($login)
    {
        $data = DB::table('usuarios')
        ->where([ ['login', '=', $login], ])
        ->select('id')
        ->first();

        return $data;
    }

    public function verificaUsuarioExiste($usuario, $fk_empresa)
    {
        $data = DB::table('usuarios')
        ->where([ ['usuarios.id', '=', $usuario], ['usuarios.fk_empresa', '=', $fk_empresa], ['usuarios.ativo', '=', true], ])
        ->select('id', 'senha')
        ->first();

        return $data; 
    }
}
