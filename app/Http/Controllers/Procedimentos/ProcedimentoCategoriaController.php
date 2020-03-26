<?php

namespace App\Http\Controllers;

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
        $categorias = $c->getAllCategoriaEmpresa(Auth::user()->fk_empresa);

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

        $categoria->fk_empresa = Auth::user()->fk_empresa;
        $categoria->nome       = $request->nome_categoria;
        $categoria->save();

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
    public function destroy(Request $request)
    {
        $desativado = Procedimento_categoria::where('id', $request->id)
            ->where('fk_empresa', Auth::user()->fk_empresa)
            ->update(['ativo' => false]);

        // Desativa todos os procedimentos vinculado a categoria 
        Procedimento::where('fk_empresa', Auth::user()->fk_empresa)
            ->where('fk_categoria', $request->id)
            ->update(['ativo' => false]);

        if ($desativado) {
            return json_encode(true);
        } else {
            return json_encode(false);
        }
    }
}
