<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Controllers\Logs\LogSistemaController;
use App\Models\Clientes\Dependente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DependenteController extends Controller
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
     * @param  \App\Models\Clientes\Dependente  $dependente
     * @return \Illuminate\Http\Response
     */
    public function show(Dependente $dependente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes\Dependente  $dependente
     * @return \Illuminate\Http\Response
     */
    public function edit(Dependente $dependente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes\Dependente  $dependente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dependente = new Dependente(); 

        // Verifica se existe e se é da empresa do usuario logado
        $dependente_existe = Dependente::select('id')
            ->where([ ['id', '=', $id], ['fk_empresa', '=', Auth::user()->fk_empresa], ['ativo', '=', true] ])
            ->first();

        if (!$dependente_existe) {
            return redirect()->back()->with('warning', 'Dependente não encontrado');
        }

        $dados_dependente['nome']              = $request->nome;
        $dados_dependente['cpf']               = Helper::deixaApenasNumeros($request->cpf);
        $dados_dependente['rg']                = Helper::deixaApenasNumeros($request->rg);
        $dados_dependente['data_nascimento']   = $request->data_nascimento;
        $dados_dependente['sexo']              = $request->sexo;
        $dados_dependente['nacionalidade']     = $request->nacionalidade;
        $dados_dependente['cel_dependente']    = $request->cel_dependente;
        $dados_dependente['email']             = $request->email;
        $dados_dependente['obs_cadastro']      = $request->obs_cadastro;
        $dependente->where('id', $id)->where('fk_empresa', Auth::user()->fk_empresa)->update($dados_dependente);
        LogSistemaController::logSistemaTipoUpdate($id,'id', 'clientes', $dados_dependente);

        return redirect()->back()->with('success', 'Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes\Dependente  $dependente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dependente $dependente)
    {
        //
    }
}
