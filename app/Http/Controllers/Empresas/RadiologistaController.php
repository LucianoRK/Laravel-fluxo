<?php

namespace App\Http\Controllers\Empresas;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Logs\LogSistemaController;
use App\Http\Requests\SalvarRadiologistaRequest;
use App\Models\Empresas\Empresa;
use App\Models\Empresas\Radiologista;
use App\Models\Enderecos\Endereco_radiologista;
use App\Models\Enderecos\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RadiologistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Radiologista $radiologista, Empresa $empresa)
    {
        // Usado para contar as linhas da tabela
        $count = 1;

        $radiologistas['ativos'] = Radiologista::select('radiologistas.*')
            ->where([['radiologistas.ativo', '=', true], ['fk_empresa', '=', Auth::user()->fk_empresa]])
            ->orderBy('radiologistas.razao_social')
            ->get();

        $radiologistas['inativos'] = Radiologista::select('radiologistas.*')
            ->where([['radiologistas.ativo', '=', false], ['fk_empresa', '=', Auth::user()->fk_empresa]])
            ->orderBy('radiologistas.razao_social')
            ->get();

        $empresa = $empresa->getNomeEmpresa(Auth::user()->fk_empresa);

        return view('empresas.radiologistas.index', compact('radiologistas', 'empresa', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empresa $empresa, Estado $estado)
    {
        $empresa = $empresa->getNomeEmpresa(Auth::user()->fk_empresa);
        $estados = $estado->getAllEstados();

        return view('empresas.radiologistas.novoRadiologista', compact('empresa', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalvarRadiologistaRequest $request)
    {
        if (!$request->valor_sugerido) {
            $valor_sugerido = 0;
        } else {
            $valor_sugerido = Helper::currencyBrForMysql($request->valor_sugerido);
        }

        $radiologista                    = new Radiologista();
        $radiologista->fk_empresa        = Auth::user()->fk_empresa;
        $radiologista->razao_social      = $request->razao_social;
        $radiologista->nome_fantasia     = $request->nome_fantasia;
        $radiologista->cnpj              = Helper::deixaApenasNumeros($request->cnpj);
        $radiologista->email             = $request->email;
        $radiologista->telefone          = $request->telefone;
        $radiologista->celular           = $request->celular;
        $radiologista->valor_sugerido    = $valor_sugerido;
        $radiologista->save();

        $endereco                   = new Endereco_radiologista();
        $endereco->fk_empresa       = Auth::user()->fk_empresa;
        $endereco->fk_radiologista  = $radiologista->id;
        $endereco->fk_cidade        = $request->cidade;
        $endereco->cep              = $request->cep;
        $endereco->logradouro       = $request->logradouro;
        $endereco->numero           = $request->numero;
        $endereco->bairro           = $request->bairro;
        $endereco->complemento      = $request->complemento;
        $endereco->save();

        LogSistemaController::logSistemaTipoInsert('radiologistas', $radiologista);
        LogSistemaController::logSistemaTipoInsert('endereco_radiologistas', $endereco);

        return redirect('/radiologistas')->with('success', 'Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresas\Radiologista  $radiologista
     * @return \Illuminate\Http\Response
     */
    public function show(Radiologista $radiologista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresas\Radiologista  $radiologista
     * @return \Illuminate\Http\Response
     */
    public function edit(Radiologista $radiologista)
    {
        $estado        = new Estado();
        $radiologistas = new Radiologista();
        $enderecos     = new Endereco_radiologista();


        $estados       = $estado->getAllEstados();

        $radiologista  = Radiologista::select(
                'radiologistas.*', 
                'empresas.nome AS nome_empresa',
                'endereco_radiologistas.fk_cidade',
                'endereco_radiologistas.cep',
                'endereco_radiologistas.logradouro',
                'endereco_radiologistas.numero',
                'endereco_radiologistas.bairro',
                'endereco_radiologistas.complemento',
                'cidades.fk_estado'
            )
            ->join('empresas', 'empresas.id', '=', 'radiologistas.fk_empresa')
            ->leftJoin('endereco_radiologistas', 'endereco_radiologistas.fk_radiologista', '=', 'radiologistas.id')
            ->leftJoin('cidades', 'cidades.id', '=', 'endereco_radiologistas.fk_cidade')
            ->where([
                    ['radiologistas.id', '=', $radiologista->id], 
                    ['radiologistas.fk_empresa', '=', Auth::user()->fk_empresa], 
                    ['radiologistas.ativo', '=', true]
            ])
            ->where([['empresas.ativo', '=', true]])
            ->where('endereco_radiologistas.ativo', '=', true)
            ->where([['cidades.ativo', '=', true]])
            ->orderBy('radiologistas.razao_social')
            ->first();

        if (!isset($radiologista)) {
            return view('Sistema.nenhumaInformacao');
        } 

        // Converte o valor para BR
        $radiologista['valor_sugerido'] = Helper::currencyMysqlForBr($radiologista['valor_sugerido']);

        return view('empresas.radiologistas.editarRadiologista', compact('estados', 'radiologista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresas\Radiologista  $radiologista
     * @return \Illuminate\Http\Response
     */
    public function update(SalvarRadiologistaRequest $request, Radiologista $r, $id)
    {
        $e = new Endereco_radiologista();

        // Verifica se existe o radiologista e se é da empresa do usuario logado
        $protetico_existe = $r->verificaRadiologistaExisteEmpresa($id, Auth::user()->fk_empresa);

        if (!$protetico_existe) {
            return redirect()->back()->with('warning', 'Protético não encontrado');
        }

        if (!$request->valor_sugerido) {
            $valor_sugerido = 0;
        } else {
            $valor_sugerido = Helper::currencyBrForMysql($request->valor_sugerido);
        }

        $radiologista['razao_social']   = $request->razao_social;
        $radiologista['nome_fantasia']  = $request->nome_fantasia;
        $radiologista['cnpj']           = Helper::deixaApenasNumeros($request->cnpj);
        $radiologista['email']          = $request->email;
        $radiologista['telefone']       = $request->telefone;
        $radiologista['celular']        = $request->celular;
        $radiologista['valor_sugerido'] = $valor_sugerido;
        $r->where('id', $id)->where('fk_empresa', Auth::user()->fk_empresa)->update($radiologista);

        $endereco['fk_cidade']        = $request->cidade;
        $endereco['cep']              = $request->cep;
        $endereco['logradouro']       = $request->logradouro;
        $endereco['numero']           = $request->numero;
        $endereco['bairro']           = $request->bairro;
        $endereco['complemento']      = $request->complemento;
        $e->where('fk_radiologista', $id)->where('fk_empresa', Auth::user()->fk_empresa)->update($endereco);

        LogSistemaController::logSistemaTipoUpdate($id, 'id', 'radiologistas', $radiologista);
        LogSistemaController::logSistemaTipoUpdate($id, 'fk_radiologista', 'endereco_radiologistas', $endereco);

        return redirect('/radiologistas')->with('success', 'Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresas\Radiologista  $radiologista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Radiologista $p, $id)
    {
        $radiologista['ativo'] = false;
        $desativado            = $p->where('id', $id)->where('fk_empresa', Auth::user()->fk_empresa)->update($radiologista);

        LogSistemaController::logSistemaTipoUpdate($id, 'id', 'radiologistas', $radiologista);

        if ($desativado) {
            return json_encode(true);
        } else {
            return json_encode(false);
        }
    }

    public function ativar(Radiologista $p, $id)
    {
        $usuario['ativo'] = true;
        $ativado          = $p->where('id', $id)->where('fk_empresa', Auth::user()->fk_empresa)->update($usuario);

        LogSistemaController::logSistemaTipoUpdate($id, 'id', 'radiologistas', $usuario);

        if ($ativado) {
            return json_encode(true);
        } else {
            return json_encode(false);
        }
    }
}
