<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalvarUsuarioRequest;
use App\Models\Empresas\Empresa;
use App\Models\Enderecos\Endereco_usuario;
use App\Models\Enderecos\Estado;
use App\Models\Usuarios\Tipo_usuario;
use App\Models\Usuarios\Usuario;
use App\Models\Usuarios\Usuario_mm_empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user                   = new Usuario();
        $empresa                = new Empresa();

        $usuarios['ativos']     = $user->getAllusuarioAtivo(Auth::user()->fk_empresa);
        $usuarios['inativos']   = $user->getAllusuarioInativo(Auth::user()->fk_empresa);
        $empresa                = $empresa->getNomeEmpresa(Auth::user()->fk_empresa);

        return view('usuarios.index', compact('usuarios', 'empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresa        = new Empresa();
        $tipo_usuario   = new Tipo_usuario();
        $estado         = new Estado();

        $empresas       = $empresa->getAllEmpresasUsuario(Auth::user()->id);
        $tipos_usuarios = $tipo_usuario->getAllTiposUsuarios();
        $estados        = $estado->getAllEstados();

        return view('usuarios.formNovoUsuario', compact('empresas', 'tipos_usuarios', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalvarUsuarioRequest $request)
    {
        $usuario                    = new Usuario();
        $usuario->fk_empresa        = $request->fk_empresa;
        $usuario->fk_tipo_usuario   = $request->fk_tipo_usuario;
        $usuario->nome              = $request->nome;
        $usuario->cpf               = preg_replace('/[^0-9]/is', '', $request->cpf);
        $usuario->data_nascimento   = $request->data_nascimento;
        $usuario->email             = $request->email;
        $usuario->celular           = $request->celular;
        $usuario->login             = $request->login;
        $usuario->senha             = Hash::make($request->senha);
        $usuario->save();

        $endereco                   = new Endereco_usuario();
        $endereco->fk_usuario       = Auth::user()->id;
        $endereco->fk_cidade        = $request->cidade;
        $endereco->cep              = $request->cep;
        $endereco->rua              = $request->rua;
        $endereco->numero           = $request->numero_casa;
        $endereco->complemento      = $request->complemento;
        $endereco->save();

        $usuario_mm_empresa             = new Usuario_mm_empresa();
        $usuario_mm_empresa->fk_usuario = $usuario->id;
        $usuario_mm_empresa->fk_empresa = Auth::user()->fk_empresa;
        $usuario_mm_empresa->save();
        
        return redirect('/usuarios/create')->with('success', 'Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuarios\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuarios\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuarios\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuarios\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = new Usuario();
        $user = $user->desativarUsuario($request->id, Auth::user()->fk_empresa);

        if ($user) {
            return json_encode(true);
        } else {
            return json_encode(false);
        }
    }

    public function ativar(Request $request)
    {
        $user = new Usuario();
        $user = $user->ativarUsuario($request->id, Auth::user()->fk_empresa);

        if ($user) {
            return json_encode(true);
        } else {
            return json_encode(false);
        }
    }
}
