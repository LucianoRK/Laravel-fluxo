<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Controllers\Logs\LogSistemaController;
use App\Http\Requests\ProcedimentoRequest;
use App\Models\Procedimentos\Procedimento;
use App\Models\Procedimentos\Procedimento_categoria;
use App\Models\Tratamentos\Especialidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcedimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Procedimento $p)
    {
        $procedimentos = Procedimento::select(
                'procedimentos.id', 
                'procedimentos.valor_sugerido', 
                'especialidades.nome AS nome_esp', 
                'procedimento_categorias.nome AS nome_cat',
                'procedimentos.nome AS nome_proc', 
                'protetico'
            )
            ->join('especialidades', 'especialidades.id', '=', 'procedimentos.fk_especialidade')
            ->join('procedimento_categorias', 'procedimento_categorias.id', '=', 'procedimentos.fk_categoria')
            ->where([['procedimentos.ativo', '=', true]])
            ->where([['especialidades.ativo', '=', true]])
            ->where([['procedimento_categorias.ativo', '=', true]])
            ->orderBy('procedimento_categorias.nome')
            ->get();

        // Usado para contar as linhas da tabela
        $count = 1;

        return view('Procedimentos.index', compact('procedimentos', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Procedimento_categoria $c, Especialidade $p)
    {
        $categorias = Procedimento_categoria::select('id', 'nome', 'ativo')
            ->where([['ativo', '=', true]])
            ->orderBy('nome')
            ->get();

        $especialidades = $p->getAllEspecialidades();

        return view('Procedimentos.novoProcedimento', compact('categorias', 'especialidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!isset($request->clinico_geral) && !isset($request->implantodontia) && !isset($request->odontopediatria) && !isset($request->orofacial)) {
            return redirect()->back()->with('especialidade', 'Por favor, selecione ao menos uma especialidade');
        }

        $request->validate([
            'categoria' => ['required'],
            'nome_procedimento' => ['required', 'min: 4', 'max: 50']
        ]);

        if (!$request->valor_sugerido) {
            $valor_sugerido = 0;
        } else {
            $valor_sugerido = Helper::currencyBrForMysql($request->valor_sugerido);
        }

        if ($request->protetico) {
            $protetico = true;
        } else {
            $protetico = false;
        }

        if (isset($request->clinico_geral)) {
            $p                   = new Procedimento();
            $p->fk_especialidade = 1;
            $p->fk_categoria     = $request->categoria;
            $p->nome             = $request->nome_procedimento;
            $p->protetico        = $protetico;
            $p->valor_sugerido   = $valor_sugerido;
            $p->save();
            LogSistemaController::logSistemaTipoInsert('procedimentos', $p);
        }
        if (isset($request->implantodontia)) {
            $p                   = new Procedimento();
            $p->fk_especialidade = 3;
            $p->fk_categoria     = $request->categoria;
            $p->nome             = $request->nome_procedimento;
            $p->protetico        = $protetico;
            $p->valor_sugerido   = $valor_sugerido;
            $p->save();
            LogSistemaController::logSistemaTipoInsert('procedimentos', $p);
        }
        if (isset($request->odontopediatria)) {
            $p                   = new Procedimento();
            $p->fk_especialidade = 4;
            $p->fk_categoria     = $request->categoria;
            $p->nome             = $request->nome_procedimento;
            $p->protetico        = $protetico;
            $p->valor_sugerido   = $valor_sugerido;
            $p->save();
            LogSistemaController::logSistemaTipoInsert('procedimentos', $p);
        }
        if (isset($request->orofacial)) {
            $p                   = new Procedimento();
            $p->fk_especialidade = 5;
            $p->fk_categoria     = $request->categoria;
            $p->nome             = $request->nome_procedimento;
            $p->protetico        = false;
            $p->valor_sugerido   = $valor_sugerido;
            $p->save();
            LogSistemaController::logSistemaTipoInsert('procedimentos', $p);
        }

        return redirect('/procedimentos')->with('success', 'Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Procedimentos\Procedimento  $procedimento
     * @return \Illuminate\Http\Response
     */
    public function show(Procedimento $procedimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Procedimentos\Procedimento  $procedimento
     * @return \Illuminate\Http\Response
     */
    public function edit(Procedimento $procedimento)
    {
        $procedimento = Procedimento::select(
                'procedimentos.id', 
                'procedimentos.valor_sugerido', 
                'especialidades.nome AS nome_esp', 
                'procedimento_categorias.nome AS nome_cat',
                'procedimentos.nome AS nome_proc', 
                'protetico'
            )
            ->join('especialidades', 'especialidades.id', '=', 'procedimentos.fk_especialidade')
            ->join('procedimento_categorias', 'procedimento_categorias.id', '=', 'procedimentos.fk_categoria')
            ->where([['procedimentos.id', '=', $procedimento->id], ['procedimentos.ativo', '=', true]])
            ->where([['especialidades.ativo', '=', true]])
            ->where([['procedimento_categorias.ativo', '=', true]])
            ->orderBy('procedimento_categorias.nome')
            ->first();

        // Converto para moeda BR    
        $procedimento['valor_sugerido'] = Helper::currencyMysqlForBr($procedimento['valor_sugerido']);

        return view('Procedimentos.editarProcedimento', compact('procedimento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Procedimentos\Procedimento  $procedimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Procedimento $p)
    {
        // Verifica se existe este pocedimento e se é da empresa do usuario logado
        $procedimento_existe = $p->verificaProcedimentoExisteEmpresa($id);

        if (!$procedimento_existe) {
            return redirect()->back()->with('warning', 'Procedimento não encontrado');
        }

        if (!$request->valor_sugerido) {
            $proc['valor_sugerido'] = 0;
        } else {
            // Converto para moeda BR    
            $proc['valor_sugerido'] = Helper::currencyBrForMysql($request->valor_sugerido);
        }

        $edit = $p->where('id', $id)->update($proc);
        LogSistemaController::logSistemaTipoUpdate($id, 'id', 'procedimentos', $proc);

        if ($edit) {
            return redirect('/procedimentos')->with('success', 'Sucesso!');
        } else {
            return redirect('/procedimentos')->with('success', 'Erro!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Procedimentos\Procedimento  $procedimento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Procedimento $p, $id)
    {
        $procedimento['ativo'] = false;
        $desativado            = $p->where('id', $id)->update($procedimento);

        LogSistemaController::logSistemaTipoUpdate($id, 'id', 'procedimentos', $procedimento);

        if ($desativado) {
            return json_encode(true);
        } else {
            return json_encode(false);
        }
    }
}
