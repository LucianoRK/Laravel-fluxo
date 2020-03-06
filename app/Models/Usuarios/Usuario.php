<?php

namespace App\Models\Usuarios;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        'login', 'senha',
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

    public function getAllUsuario()
    {
        $data = DB::table('usuarios')
            ->join('tipo_usuarios', 'tipo_usuarios.id', '=', 'usuarios.fk_tipo_usuario')
            ->select('usuarios.*', 'tipo_usuarios.nome as tipo_usuario')
            ->get();

        return $data;
    }
}
