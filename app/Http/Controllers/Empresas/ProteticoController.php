<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Logs\LogSistemaController;
use App\Http\Requests\SalvarProteticoRequest;
use App\Models\Empresas\Empresa;
use App\Models\Empresas\Protetico;
use App\Models\Enderecos\Endereco_protetico;
use App\Models\Enderecos\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProteticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Protetico $protetico, Empresa $empresa)
    {
        // Usado para contar as linhas da tabela
        $count = 1;

        $proteticos['ativos']   = Protetico::select('proteticos.*')
            ->where([ ['proteticos.ativo', '=', true], ['fk_empresa', '=', Auth::user()->fk_empresa] ])
            ->orderBy('proteticos.razao_social')
            ->get();

        $proteticos['inativos'] = Protetico::select('proteticos.*')
            ->where([ ['proteticos.ativo', '=', false], ['fk_empresa', '=', Auth::user()->fk_empresa] ])
            ->orderBy('proteticos.razao_social')
            ->get();

        $empresa = $empresa->getNomeEmpresa(Auth::user()->fk_empresa);

        return view('empresas.proteticos.index', compact('proteticos', 'empresa', 'count'));
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

        return view('empresas.proteticos.novoProtetico', compact('empresa', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalvarProteticoRequest $request)
    {
        $protetico                    = new Protetico();
        $protetico->fk_empresa        = Auth::user()->fk_empresa;
        $protetico->razao_social      = $request->razao_social;
        $protetico->nome_fantasia     = $request->nome_fantasia;
        $protetico->cnpj              = preg_replace('/[^0-9]/is', '', $request->cnpj);
        $protetico->email             = $request->email;
        $protetico->telefone          = $request->telefone;
        $protetico->celular           = $request->celular;
        $protetico->save();

        $endereco                   = new Endereco_protetico();
        $endereco->fk_empresa       = Auth::user()->fk_empresa;
        $endereco->fk_protetico     = $protetico->id;
        $endereco->fk_cidade        = $request->cidade;
        $endereco->cep              = $request->cep;
        $endereco->logradouro       = $request->logradouro;
        $endereco->numero           = $request->numero;
        $endereco->bairro           = $request->bairro;
        $endereco->complemento      = $request->complemento;
        $endereco->save();

        LogSistemaController::logSistemaTipoInsert('proteticos', $protetico);
        LogSistemaController::logSistemaTipoInsert('endereco_proteticos', $endereco);

        return redirect('/proteticos')->with('success', 'Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresas\Protetico  $protetico
     * @return \Illuminate\Http\Response
     */
    public function show(Protetico $protetico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresas\Protetico  $protetico
     * @return \Illuminate\Http\Response
     */
    public function edit(Protetico $protetico)
    {
        $estado     = new Estado();
        $estados    = $estado->getAllEstados();

        $protetico  = Protetico::select(
                'proteticos.*', 
                'empresas.nome AS nome_empresa',
                'endereco_proteticos.fk_cidade',
                'endereco_proteticos.cep',
                'endereco_proteticos.logradouro',
                'endereco_proteticos.numero',
                'endereco_proteticos.bairro',
                'endereco_proteticos.complemento',
                'cidades.fk_estado'
            )
            ->join('empresas', 'empresas.id', '=', 'proteticos.fk_empresa')
            ->leftJoin('endereco_proteticos', 'endereco_proteticos.fk_protetico', '=', 'proteticos.id')
            ->leftJoin('cidades', 'cidades.id', '=', 'endereco_proteticos.fk_cidade')
            ->where([ ['proteticos.id', '=', $protetico->id], ['proteticos.fk_empresa', '=', Auth::user()->fk_empresa], ['proteticos.ativo', '=', true] ])
            ->orderBy('proteticos.razao_social')
            ->first();

        return view('empresas.proteticos.editarProtetico', compact('estados', 'protetico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresas\Protetico  $protetico
     * @return \Illuminate\Http\Response
     */
    public function update(SalvarProteticoRequest $request, Protetico $p, $id)
    {
        $e = new Endereco_protetico();

        // Verifica se existe o protético e se é da empresa do usuario logado
        $protetico_existe = $p->verificaProteticoExisteEmpresa($id, Auth::user()->fk_empresa);

        if (!$protetico_existe) {
            return redirect()->back()->with('warning', 'Protético não encontrado');
        }

        $usuario['razao_social']  = $request->razao_social;
        $usuario['nome_fantasia'] = $request->nome_fantasia;
        $usuario['cnpj']          = preg_replace('/[^0-9]/is', '', $request->cnpj);
        $usuario['email']         = $request->email;
        $usuario['telefone']      = $request->telefone;
        $usuario['celular']       = $request->celular;
        $p->where('id', $id)->where('fk_empresa', Auth::user()->fk_empresa)->update($usuario);

        $endereco['fk_cidade']        = $request->cidade;
        $endereco['cep']              = $request->cep;
        $endereco['logradouro']       = $request->logradouro;
        $endereco['numero']           = $request->numero;
        $endereco['bairro']           = $request->bairro;
        $endereco['complemento']      = $request->complemento;
        $e->where('fk_protetico', $id)->where('fk_empresa', Auth::user()->fk_empresa)->update($endereco);

        LogSistemaController::logSistemaTipoUpdate($id, 'id', 'proteticos', $usuario);
        LogSistemaController::logSistemaTipoUpdate($id, 'fk_protetico', 'endereco_proteticos', $endereco);

        return redirect('/proteticos')->with('success', 'Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresas\Protetico  $protetico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Protetico $p, $id)
    {
        $protetico['ativo'] = false;
        $desativado         = $p->where('id', $id)->where('fk_empresa', Auth::user()->fk_empresa)->update($protetico);

        LogSistemaController::logSistemaTipoUpdate($id, 'id', 'proteticos', $protetico);

        if ($desativado) {
            return json_encode(true);
        } else {
            return json_encode(false);
        }
    }

    public function ativar(Protetico $p, $id)
    {
        $usuario['ativo'] = true;
        $ativado          = $p->where('id', $id)->where('fk_empresa', Auth::user()->fk_empresa)->update($usuario);

        LogSistemaController::logSistemaTipoUpdate($id, 'id', 'proteticos', $usuario);

        if ($ativado) {
            return json_encode(true);
        } else {
            return json_encode(false);
        }
    }
}
