<?php

namespace App\Http\Controllers;

use App\Models\Procedimentos\Procedimento_categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcedimentoCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Procedimento_categoria::select('id', 'fk_empresa', 'nome', 'ativo')
            ->where([ ['fk_empresa', '=', Auth::user()->fk_empresa], ['ativo', '=', true], ])
            ->orderBy('nome')
            ->get();

        // Usado para contar as linhas da tabela
        $count = 1;
        
        return view('ProcedimentosCategorias.index', compact('categorias', 'count'));
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
     * @param  \App\Models\Procedimentos\Procedimento_categoria  $procedimento_categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Procedimento_categoria $procedimento_categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Procedimentos\Procedimento_categoria  $procedimento_categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Procedimento_categoria $procedimento_categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Procedimentos\Procedimento_categoria  $procedimento_categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Procedimento_categoria $procedimento_categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Procedimentos\Procedimento_categoria  $procedimento_categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $desativado = Procedimento_categoria::where('id', $request->id)
            ->where('fk_empresa', Auth::user()->fk_empresa)
            ->update(['ativo' => false]);

        if ($desativado) {
            return json_encode(true);
        } else {
            return json_encode(false);
        }
    }
}
