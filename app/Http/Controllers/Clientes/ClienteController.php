<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Controllers\Logs\LogSistemaController;
use App\Models\Clientes\Cliente;
use App\Models\Clientes\Dependente;
use App\Models\Enderecos\Endereco_cliente;
use App\Models\Enderecos\Estado;
use App\Models\Tratamentos\Tratamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Clientes\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente          = new Cliente(); 
        $endereco_cliente = new Endereco_cliente();

        // Verifica se existe e se é da empresa do usuario logado
        $cliente_existe = Cliente::select('id')
            ->where([ ['id', '=', $id], ['fk_empresa', '=', Auth::user()->fk_empresa], ['ativo', '=', true] ])
            ->first();

        if (!$cliente_existe) {
            return redirect()->back()->with('warning', 'Cliente não encontrado');
        }

        $dados_cliente['nome']              = $request->nome;
        $dados_cliente['cpf']               = Helper::deixaApenasNumeros($request->cpf);
        $dados_cliente['rg']                = Helper::deixaApenasNumeros($request->rg);
        $dados_cliente['data_nascimento']   = $request->data_nascimento;
        $dados_cliente['sexo']              = $request->sexo;
        $dados_cliente['estado_civil']      = $request->estado_civil;
        $dados_cliente['nacionalidade']     = $request->nacionalidade;
        $dados_cliente['cel_titular']       = $request->cel_titular;
        $dados_cliente['cel_recado']        = $request->cel_recado;
        $dados_cliente['email']             = $request->email;
        $dados_cliente['profissao']         = $request->profissao;
        $dados_cliente['trabalho']          = $request->trabalho;
        $dados_cliente['fone_trabalho']     = $request->fone_trabalho;
        $dados_cliente['renda_media']       = Helper::currencyBrForMysql($request->renda_media);
        $dados_cliente['residencia']        = $request->residencia;
        $dados_cliente['obs_cadastro']      = $request->obs_cadastro;
        $cliente->where('id', $id)->where('fk_empresa', Auth::user()->fk_empresa)->update($dados_cliente);
        LogSistemaController::logSistemaTipoUpdate($id,'id', 'clientes', $dados_cliente);

        $dados_endereco['fk_cidade']        = $request->cidade;
        $dados_endereco['cep']              = $request->cep;
        $dados_endereco['logradouro']       = $request->logradouro;
        $dados_endereco['numero']           = $request->numero;
        $dados_endereco['bairro']           = $request->bairro;
        $dados_endereco['complemento']      = $request->complemento;
        $endereco_cliente->where('fk_cliente', $id)->where('fk_empresa', Auth::user()->fk_empresa)->update($dados_endereco);
        LogSistemaController::logSistemaTipoUpdate($id, 'fk_cliente', 'endereco_clientes', $dados_endereco);

        return redirect()->back()->with('success', 'Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

    /**
     * Buscas os clientes por nome.
     *
     * @param  \App\Models\Clientes\Cliente  $nome
     * @return \Illuminate\Http\Response
     */
    public function listaClientesFiltrado(Request $request)
    {
        $clientes = Cliente::select(
            "clientes.id",
            "tratamentos.id as id_tratamento",
            "clientes.nome",
            "especialidades.nome as especialidade_descricao",
            "cpf"
        )
        ->join('tratamentos', 'tratamentos.fk_cliente', '=', 'clientes.id')
        ->join('especialidades', 'especialidades.id', '=', 'tratamentos.fk_especialidade')
        ->where('clientes.fk_empresa', '=', Auth::user()->fk_empresa)
        ->where('tratamentos.fk_usuario_dentista', '=', $request->dentista)
        ->where('clientes.nome', 'like', "%$request->nome%")
        ->where('clientes.ativo', '=', true)
        ->where('tratamentos.ativo', '=', true)
        ->where('especialidades.ativo', '=', true)
        ->get();

        return View('Agendas.load.lista_clientes_filtrado', compact('clientes'));
    }

    public function listaClientesFiltradoNavbar(Request $request)
    {
        $clientes = Cliente::select(
            "clientes.id",
            "clientes.nome",
            "clientes.cpf"
        )
        ->where('clientes.fk_empresa', '=', Auth::user()->fk_empresa)
        ->where('clientes.nome', 'like', "%$request->nome%")
        ->where('clientes.ativo', '=', true)
        ->limit(10)
        ->get();

        return View('clientes.searchNavbar.listaClientesFiltrados', compact('clientes'));
    }

    public function getDadosCliente($id)
    {
        $cliente = Cliente::select(
            "clientes.*", 
            "endereco_clientes.fk_cidade",
            "endereco_clientes.cep",
            "endereco_clientes.logradouro",
            "endereco_clientes.numero",
            "endereco_clientes.bairro",
            "endereco_clientes.complemento",
            "cidades.fk_estado"
        )
        ->join('endereco_clientes', 'endereco_clientes.fk_cliente', '=', 'clientes.id')
        ->join('cidades', 'cidades.id', '=', 'endereco_clientes.fk_cidade')
        ->where('clientes.id', '=', $id)
        ->where('clientes.fk_empresa', '=', Auth::user()->fk_empresa)
        ->where('clientes.ativo', '=', true)
        ->where('endereco_clientes.ativo', '=', true)
        ->where('cidades.ativo', '=', true)
        ->first();

        if (isset($cliente)) {
            if ($cliente['sexo'] == 'masculino') {
                $cliente['masculino'] = true;
            } else if ($cliente['sexo'] == 'femenino') {
                $cliente['femenino'] = true;
            }

            switch ($cliente['estado_civil']) {
                case 'solteiro':
                    $cliente['solteiro'] = true;
                    break;
                case 'casado':
                    $cliente['casado'] = true;
                    break;
                case 'separado':
                    $cliente['separado'] = true;
                    break;
                case 'divorciado':
                    $cliente['divorciado'] = true;
                    break;
                case 'viuvo':
                    $cliente['viuvo'] = true;
                    break;
            }

            if ($cliente['renda_media']) {
                $cliente['renda_media'] = Helper::currencyMysqlForBr($cliente['renda_media']);
            }

            switch ($cliente['residencia']) {
                case 'propria':
                    $cliente['propria'] = true;
                    break;
                case 'alugada':
                    $cliente['alugada'] = true;
                    break;
                case 'outros':
                    $cliente['outros'] = true;
                    break;
            }
        }

        return $cliente;
    }

    public function getDadosDependente($id)
    {
        $dependentes = Dependente::select(
            "dependentes.*",
            "dependentes_tipo.tipo_dependente"
        )
        ->join('dependentes_tipo', 'dependentes_tipo.id', '=', 'dependentes.fk_dependente_tipo')
        ->where('dependentes.fk_empresa', '=', Auth::user()->fk_empresa)
        ->where('dependentes.fk_cliente', '=', $id)
        ->where('dependentes.ativo', '=', true)
        ->where('dependentes_tipo.ativo', '=', true)
        ->get();

        return $dependentes;
    }

    public function getAllTratamentoCliente($id)
    {
        $tratamentos = Tratamento::select(
            "tratamentos.*",
            "usuarios.nome as nome_profissional",
            "clientes.nome as nome_paciente",
            "dependentes.nome as nome_dependente",
            "especialidades.nome as nome_especialidade"
        )
        ->join('usuarios', 'usuarios.id', '=', 'tratamentos.fk_usuario_dentista')
        ->join('clientes', 'clientes.id', '=', 'tratamentos.fk_cliente')
        ->join('especialidades', 'especialidades.id', '=', 'tratamentos.fk_especialidade')
        ->leftjoin('dependentes', 'dependentes.id', '=', 'tratamentos.fk_especialidade')
        ->where('tratamentos.fk_empresa', '=', Auth::user()->fk_empresa)
        ->where('tratamentos.fk_cliente', '=', $id)
        ->where('tratamentos.ativo', '=', true)
        ->get();

        return $tratamentos;
    }

    public function mostraTodosDadosCliente($id, Estado $estado)
    {
        $estados     = $estado->getAllEstados();
        $cliente     = self::getDadosCliente($id);
        $dependentes = self::getDadosDependente($id);
        $tratamentos = self::getAllTratamentoCliente($id);

        return view('clientes.index', compact('cliente', 'dependentes', 'tratamentos', 'estados'));
    }
}
