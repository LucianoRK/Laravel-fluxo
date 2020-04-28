<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Logs\LogSistemaController;
use App\Http\Requests\SalvarEdicaoUsuarioRequest;
use App\Http\Requests\SalvarUsuarioRequest;
use App\Models\Empresas\Empresa;
use App\Models\Enderecos\Endereco_usuario;
use App\Models\Enderecos\Estado;
use App\Models\Permissoes\Permissao_mm_usuario;
use App\Models\Usuarios\Tipo_usuario;
use App\Models\Usuarios\Usuario;
use App\Models\Usuarios\Usuario_mm_empresa;
use App\Models\Usuarios\Usuario_mm_especialidade;
use App\Rules\PasswordRule;
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
    public function index(Empresa $empresa)
    {
        // Usado para contar as linhas da tabela
        $count = 1;

        $usuarios['ativos'] = Usuario::select('usuarios.*', 'tipo_usuarios.nome as tipo_usuario')
            ->where([ ['usuarios.ativo', '=', true], ['fk_empresa', '=', Auth::user()->fk_empresa], ])
            ->join('tipo_usuarios', 'tipo_usuarios.id', '=', 'usuarios.fk_tipo_usuario')
            ->orderBy('usuarios.nome')
            ->get();

        $usuarios['inativos'] = Usuario::select('usuarios.*', 'tipo_usuarios.nome as tipo_usuario')
            ->where([ ['usuarios.ativo', '=', false], ['fk_empresa', '=', Auth::user()->fk_empresa], ])
            ->join('tipo_usuarios', 'tipo_usuarios.id', '=', 'usuarios.fk_tipo_usuario')
            ->orderBy('usuarios.nome')
            ->get();

        $empresa = $empresa->getNomeEmpresa(Auth::user()->fk_empresa);

        return view('usuarios.index', compact('usuarios', 'empresa', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empresa $empresa, Tipo_usuario $tipo_usuario, Estado $estado)
    {
        $empresa        = $empresa->getNomeEmpresa(Auth::user()->fk_empresa);
        $tipos_usuarios = $tipo_usuario->getAllTiposUsuarios();
        $estados        = $estado->getAllEstados();

        // Usado no editar usuario preciso passar no criar usuario se não da erro.
        $array_espe[]   = false;

        return view('usuarios.novoUsuario', compact('empresa', 'tipos_usuarios', 'estados', 'array_espe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalvarUsuarioRequest $request)
    {
        // Se for dentista preciso validar se foi selecionado ao menos uma especialidade
        if ($request->fk_tipo_usuario == 3) {
            if (!isset($request->clinico_geral) && !isset($request->implantodontia) && !isset($request->odontopediatria) && !isset($request->orofacial) && !isset($request->ortodontia)) {
                return redirect()->back()->with('especialidade', 'Por favor, selecione ao menos uma especialidade')->withInput();
            }
        }

        $usuario                    = new Usuario();
        $usuario->fk_empresa        = Auth::user()->fk_empresa;
        $usuario->fk_tipo_usuario   = $request->fk_tipo_usuario;
        $usuario->nome              = $request->nome;
        $usuario->cpf               = preg_replace('/[^0-9]/is', '', $request->cpf);
        $usuario->data_nascimento   = $request->data_nascimento;
        $usuario->email             = $request->email;
        $usuario->celular           = $request->celular;
        $usuario->login             = $request->login;
        $usuario->senha             = Hash::make($request->senha);
        $usuario->save();
        LogSistemaController::logSistemaTipoInsert('usuarios', $usuario);

        $endereco                   = new Endereco_usuario();
        $endereco->fk_empresa       = Auth::user()->fk_empresa;
        $endereco->fk_usuario       = $usuario->id;
        $endereco->fk_cidade        = $request->cidade;
        $endereco->cep              = $request->cep;
        $endereco->logradouro       = $request->logradouro;
        $endereco->numero           = $request->numero;
        $endereco->bairro           = $request->bairro;
        $endereco->complemento      = $request->complemento;
        $endereco->save();
        LogSistemaController::logSistemaTipoInsert('endereco_usuarios', $endereco);

        $usuario_mm_empresa             = new Usuario_mm_empresa();
        $usuario_mm_empresa->fk_usuario = $usuario->id;
        $usuario_mm_empresa->fk_empresa = Auth::user()->fk_empresa;
        $usuario_mm_empresa->save();
        LogSistemaController::logSistemaTipoInsert('usuario_mm_empresas', $usuario_mm_empresa);

        if ($request->fk_tipo_usuario == 3) {
            $usuario_mm_esp                   = new Usuario_mm_especialidade();
            $usuario_mm_esp->fk_empresa       = Auth::user()->fk_empresa;
            $usuario_mm_esp->fk_usuario       = $usuario->id;
            $usuario_mm_esp->fk_especialidade = 1;

            if (isset($request->clinico_geral)) {
                $usuario_mm_esp['ativo'] = 1;
            } else {
                $usuario_mm_esp['ativo'] = 0;
            }

            $usuario_mm_esp->save();
            LogSistemaController::logSistemaTipoInsert('usuario_mm_especialidade', $usuario_mm_esp);
        }
        if ($request->fk_tipo_usuario == 3) {
            $usuario_mm_esp                   = new Usuario_mm_especialidade();
            $usuario_mm_esp->fk_empresa       = Auth::user()->fk_empresa;
            $usuario_mm_esp->fk_usuario       = $usuario->id;
            $usuario_mm_esp->fk_especialidade = 2;

            if (isset($request->ortodontia)) {
                $usuario_mm_esp['ativo'] = 1;
            } else {
                $usuario_mm_esp['ativo'] = 0;
            }

            $usuario_mm_esp->save();
            LogSistemaController::logSistemaTipoInsert('usuario_mm_especialidade', $usuario_mm_esp);
        }
        if ($request->fk_tipo_usuario == 3) {
            $usuario_mm_esp                   = new Usuario_mm_especialidade();
            $usuario_mm_esp->fk_empresa       = Auth::user()->fk_empresa;
            $usuario_mm_esp->fk_usuario       = $usuario->id;
            $usuario_mm_esp->fk_especialidade = 3;

            if (isset($request->implantodontia)) {
                $usuario_mm_esp['ativo'] = 1;
            } else {
                $usuario_mm_esp['ativo'] = 0;
            }

            $usuario_mm_esp->save();
            LogSistemaController::logSistemaTipoInsert('usuario_mm_especialidade', $usuario_mm_esp);
        }
        if ($request->fk_tipo_usuario == 3) {
            $usuario_mm_esp                   = new Usuario_mm_especialidade();
            $usuario_mm_esp->fk_empresa       = Auth::user()->fk_empresa;
            $usuario_mm_esp->fk_usuario       = $usuario->id;
            $usuario_mm_esp->fk_especialidade = 4;

            if (isset($request->odontopediatria)) {
                $usuario_mm_esp['ativo'] = 1;
            } else {
                $usuario_mm_esp['ativo'] = 0;
            }

            $usuario_mm_esp->save();
            LogSistemaController::logSistemaTipoInsert('usuario_mm_especialidade', $usuario_mm_esp);
        }
        if ($request->fk_tipo_usuario == 3) {
            $usuario_mm_esp                   = new Usuario_mm_especialidade();
            $usuario_mm_esp->fk_empresa       = Auth::user()->fk_empresa;
            $usuario_mm_esp->fk_usuario       = $usuario->id;
            $usuario_mm_esp->fk_especialidade = 5;
            
            if (isset($request->orofacial)) {
                $usuario_mm_esp['ativo'] = 1;
            } else {
                $usuario_mm_esp['ativo'] = 0;
            }

            $usuario_mm_esp->save();
            LogSistemaController::logSistemaTipoInsert('usuario_mm_especialidade', $usuario_mm_esp);
        }

        return redirect('/usuarios')->with('success', 'Sucesso!');
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
        $estado         = new Estado();
        $especialidades = new Usuario_mm_especialidade();
        $array_espe[]   = false;
        $estados        = $estado->getAllEstados();
        $especialidades = $especialidades->getEspecialidadesUsuarioEmpresa($u->id, Auth::user()->fk_empresa);

        $usuario = Usuario::select(
            "usuarios.*", 
            "endereco_usuarios.fk_cidade",
            "endereco_usuarios.cep",
            "endereco_usuarios.logradouro",
            "endereco_usuarios.numero",
            "endereco_usuarios.bairro",
            "endereco_usuarios.complemento",
            "cidades.fk_estado",
            "empresas.nome AS nome_empresa",
            "tipo_usuarios.nome AS nome_tipo_usuario"
            )
            ->leftJoin('endereco_usuarios', 'endereco_usuarios.fk_usuario', '=', 'usuarios.id')
            ->leftJoin('cidades', 'cidades.id', '=', 'endereco_usuarios.fk_cidade')
            ->join('empresas', 'empresas.id', '=', 'usuarios.fk_empresa')
            ->join('tipo_usuarios', 'tipo_usuarios.id', '=', 'usuarios.fk_tipo_usuario')
            ->where('usuarios.id', '=', $u->id)
            ->where('usuarios.fk_empresa', '=', Auth::user()->fk_empresa)
            ->where('usuarios.ativo', '=', true)
            ->first();

        if ($especialidades) {
            foreach ($especialidades as $especialidade) {
                $array_espe[] = $especialidade['fk_especialidade'];
            }
        }

        return view('usuarios.editarUsuario', compact('estados', 'usuario', 'array_espe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuarios\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(SalvarEdicaoUsuarioRequest $request, $id)
    {
        $user             = new Usuario(); 
        $endereco_usuario = new Endereco_usuario();

        // Verifica se existe o usuario e se é da empresa do usuario logado
        $usuario_existe = $user->verificaUsuarioExisteEmpresa($id, Auth::user()->fk_empresa);

        if (!$usuario_existe) {
            return redirect()->back()->with('warning', 'Usuário não encontrado');
        }

        // Se for dentista preciso validar se foi selecionado ao menos uma especialidade
        if ($request->fk_tipo_usuario == 3) {
            if (!isset($request->clinico_geral) && !isset($request->implantodontia) && !isset($request->odontopediatria) && !isset($request->orofacial) && !isset($request->ortodontia)) {
                return redirect()->back()->with('especialidade', 'Por favor, selecione ao menos uma especialidade')->withInput();
            }
        }

        // Verifica se foi solicitado alteração de senha
        if (!$request->senha) {
            $nova_senha = $usuario_existe->senha;
        } else {
            $nova_senha = Hash::make($request->senha);
        }

        $usuario['nome']              = $request->nome;
        $usuario['cpf']               = preg_replace('/[^0-9]/is', '', $request->cpf);
        $usuario['data_nascimento']   = $request->data_nascimento;
        $usuario['email']             = $request->email;
        $usuario['celular']           = $request->celular;
        $usuario['senha']             = $nova_senha;
        $user->where('id', $id)->where('fk_empresa', Auth::user()->fk_empresa)->update($usuario);
        LogSistemaController::logSistemaTipoUpdate($id,'id', 'usuarios', $usuario);

        $endereco['fk_cidade']        = $request->cidade;
        $endereco['cep']              = $request->cep;
        $endereco['logradouro']       = $request->logradouro;
        $endereco['numero']           = $request->numero;
        $endereco['bairro']           = $request->bairro;
        $endereco['complemento']      = $request->complemento;
        $endereco_usuario->where('fk_usuario', $id)->where('fk_empresa', Auth::user()->fk_empresa)->update($endereco);
        LogSistemaController::logSistemaTipoUpdate($id, 'fk_usuario', 'endereco_usuarios', $endereco);

        if ($request->fk_tipo_usuario == 3) {
            $mm_esp = new Usuario_mm_especialidade();
            $mm_especialidade['fk_especialidade'] = 1;

            if (isset($request->clinico_geral)) {
                $mm_especialidade['ativo'] = 1;
            } else {
                $mm_especialidade['ativo'] = 0;
            }

            $mm_esp->where('fk_usuario', $id)
                   ->where('fk_empresa', Auth::user()->fk_empresa)
                   ->where('fk_especialidade', 1)
                   ->update($mm_especialidade);
            LogSistemaController::logSistemaTipoUpdate($id, 'fk_usuario', 'usuario_mm_especialidade', $mm_especialidade);
        }
        if ($request->fk_tipo_usuario == 3) {
            $mm_esp = new Usuario_mm_especialidade();
            $mm_especialidade['fk_especialidade'] = 2;

            if (isset($request->ortodontia)) {
                $mm_especialidade['ativo'] = 1;
            } else {
                $mm_especialidade['ativo'] = 0;
            }

            $mm_esp->where('fk_usuario', $id)
                   ->where('fk_empresa', Auth::user()->fk_empresa)
                   ->where('fk_especialidade', 2)
                   ->update($mm_especialidade);
            LogSistemaController::logSistemaTipoUpdate($id, 'fk_usuario', 'usuario_mm_especialidade', $mm_especialidade);
        }
        if ($request->fk_tipo_usuario == 3) {
            $mm_esp = new Usuario_mm_especialidade();
            $mm_especialidade['fk_especialidade'] = 3;

            if (isset($request->implantodontia)) {
                $mm_especialidade['ativo'] = 1;
            } else {
                $mm_especialidade['ativo'] = 0;
            }

            $mm_esp->where('fk_usuario', $id)
                   ->where('fk_empresa', Auth::user()->fk_empresa)
                   ->where('fk_especialidade', 3)
                   ->update($mm_especialidade);
            LogSistemaController::logSistemaTipoUpdate($id, 'fk_usuario', 'usuario_mm_especialidade', $mm_especialidade);
        }
        if ($request->fk_tipo_usuario == 3) {
            $mm_esp = new Usuario_mm_especialidade();
            $mm_especialidade['fk_especialidade'] = 4;

            if (isset($request->odontopediatria)) {
                $mm_especialidade['ativo'] = 1;
            } else {
                $mm_especialidade['ativo'] = 0;
            }

            $mm_esp->where('fk_usuario', $id)
                   ->where('fk_empresa', Auth::user()->fk_empresa)
                   ->where('fk_especialidade', 4)
                   ->update($mm_especialidade);
            LogSistemaController::logSistemaTipoUpdate($id, 'fk_usuario', 'usuario_mm_especialidade', $mm_especialidade);
        }
        if ($request->fk_tipo_usuario == 3) {
            $mm_esp = new Usuario_mm_especialidade();
            $mm_especialidade['fk_especialidade'] = 5;

            if (isset($request->orofacial)) {
                $mm_especialidade['ativo'] = 1;
            } else {
                $mm_especialidade['ativo'] = 0;
            }

            $mm_esp->where('fk_usuario', $id)
                   ->where('fk_empresa', Auth::user()->fk_empresa)
                   ->where('fk_especialidade', 5)
                   ->update($mm_especialidade);
            LogSistemaController::logSistemaTipoUpdate($id, 'fk_usuario', 'usuario_mm_especialidade', $mm_especialidade);
        }

        return redirect('/usuarios')->with('success', 'Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuarios\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $user, $id)
    {
        $usuario['ativo'] = false;
        $desativado       = $user->where('id', $id)->where('fk_empresa', Auth::user()->fk_empresa)->update($usuario);

        LogSistemaController::logSistemaTipoUpdate($id, 'id', 'usuarios', $usuario);

        if ($desativado) {
            return json_encode(true);
        } else {
            return json_encode(false);
        }
    }

    public function ativar(Usuario $user, $id)
    {
        $usuario['ativo'] = true;
        $ativado          = $user->where('id', $id)->where('fk_empresa', Auth::user()->fk_empresa)->update($usuario);

        LogSistemaController::logSistemaTipoUpdate($id, 'id', 'usuarios', $usuario);

        if ($ativado) {
            return json_encode(true);
        } else {
            return json_encode(false);
        }
    }

    public function minhaConta(Usuario $u)
    {
        $dados = $u->getDadosUsuarioEmpresa(Auth::user()->id, Auth::user()->fk_empresa);  

        return view('usuarios.minhaConta.index', compact('dados'));
    }

    public function alterarSenha(Request $request, Usuario $u)
    {
        $request->validate([
            'senha'        => ['required', 'string', new PasswordRule],
            'repita_senha' => ['required', 'string', new PasswordRule, 'same:senha'],
        ]);

        $usuario['senha'] =  Hash::make($request->senha);

        $u->where('id', Auth::user()->id)
          ->where('fk_empresa', Auth::user()->fk_empresa)
          ->update($usuario);
        
        LogSistemaController::logSistemaTipoUpdate(Auth::user()->id, 'id', 'usuarios', $usuario);

        return redirect('/minhaConta')->with('success', 'Sucesso!');
    }
}
