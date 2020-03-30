<?php

namespace App\Http\Controllers\Feriados;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Logs\LogSistemaController;
use App\Models\Feriados\Feriado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeriadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feriados = Feriado::select('id', 'fk_empresa', 'data', 'descricao', 'ativo')
            ->where([ ['fk_empresa', '=', Auth::user()->fk_empresa], ['data', '>=', date('Y-m-d')], ['ativo', '=', true], ])
            ->orderBy('descricao')
            ->get();

        // Usado para contar as linhas da tabela
        $count = 1;

        return view('Feriados.index', compact('feriados', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Feriados.novoFeriado');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Feriado $f)
    {
        $request->validate([
            'descricao' => 'required',
            'data' => 'required|date|after_or_equal:data_hoje',
        ]);

        $f->fk_empresa  = Auth::user()->fk_empresa;
        $f->data        = $request->data;
        $f->descricao   = $request->descricao;
        $f->save();
        LogSistemaController::logSistemaTipoInsert('feriados', $f);

        return redirect('/feriados')->with('success', 'Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feriados\Feriado  $feriado
     * @return \Illuminate\Http\Response
     */
    public function show(Feriado $feriado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feriados\Feriado  $feriado
     * @return \Illuminate\Http\Response
     */
    public function edit(Feriado $feriado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feriados\Feriado  $feriado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feriado $feriado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feriados\Feriado  $feriado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feriado $f, $id)
    {
        $feriado['ativo'] = false;
        $desativado       = $f->where('id', $id)->where('fk_empresa', Auth::user()->fk_empresa)->update($feriado);

        LogSistemaController::logSistemaTipoUpdate($id, 'id', 'feriados', $feriado);

        if ($desativado) {
            return json_encode(true);
        } else {
            return json_encode(false);
        }
    }
}
