<?php

namespace App\Http\Controllers;

use App\Models\Empresas\Empresa;
use App\Models\Usuarios\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
