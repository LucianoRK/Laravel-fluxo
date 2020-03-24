<?php

namespace App\Http\Controllers;

use App\Models\Clientes\Cliente;
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
    public function update(Request $request, Cliente $cliente)
    {
        //
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
            ->get();

        return View('Agendas.load.lista_clientes_filtrado',compact('clientes'));
    }
}
