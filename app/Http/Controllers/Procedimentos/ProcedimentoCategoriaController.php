<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Logs\LogSistemaController;
use App\Models\Procedimentos\Procedimento;
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
    public function index(Procedimento_categoria $c)
    {
        $categorias = Procedimento_categoria::select('id', 'nome', 'ativo')
            ->where([ ['ativo', '=', true] ])
            ->orderBy('nome')
            ->get();

        // Usado para contar as linhas da tabela
        $count = 1;
        
        return view('Procedimentos.Categorias.index', compact('categorias', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Procedimentos.Categorias.novaCategoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Procedimento_categoria $categoria,Request $request)
    {
        $request->validate([
            'nome_categoria' => ['required','min: 4', 'max: 20']
        ]);

        $categoria->nome       = $request->nome_categoria;
        $categoria->save();
        
        LogSistemaController::logSistemaTipoInsert('procedimento_categorias', $categoria);

        return redirect('/procedimentosCategorias')->with('success', 'Sucesso!');
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
    public function destroy(Request $request, $id)
    {
        $c                  = new Procedimento_categoria();
        $categoria['ativo'] = false;
        $desativado         = $c->where('id', $id)->update($categoria);

        // Desativa todos os procedimentos vinculado a categoria 
        $p                     = new Procedimento();
        $procedimento['ativo'] = false;
        $p->where('fk_categoria', $id)->update($procedimento);

        LogSistemaController::logSistemaTipoUpdate($id, 'id', 'procedimento_categorias', $categoria);
        LogSistemaController::logSistemaTipoUpdate($id, 'fk_categoria', 'procedimentos', $categoria);

        if ($desativado) {
            return json_encode(true);
        } else {
            return json_encode(false);
        }
    }
}
