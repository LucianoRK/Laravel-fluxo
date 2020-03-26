<?php

namespace App\Http\Controllers;

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
        $procedimentos = $p->getAllProcedimentoEmpresa(Auth::user()->fk_empresa);

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
        $categorias     = $c->getAllCategoriaEmpresa(Auth::user()->fk_empresa);
        $especialidades = $p->getAllEspecialidades();

        return view('Procedimentos.novoProcedimento', compact('categorias', 'especialidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Procedimento $p)
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
            $value = str_replace(".", "", $request->valor_sugerido);
            $valor = str_replace(",", ".", $value);
            $valor_sugerido = $valor;
        }

        if ($request->protetico) {
            $protetico = true;
        } else {
            $protetico = false;
        }

        if (isset($request->clinico_geral)) {
            $p->fk_empresa       = Auth::user()->fk_empresa;
            $p->fk_especialidade = 1;
            $p->fk_categoria     = $request->categoria;
            $p->nome             = $request->nome_procedimento;
            $p->protetico        = $protetico;
            $p->valor_sugerido   = $valor_sugerido;
            $p->save();
        }
        if (isset($request->implantodontia)) {
            $p->fk_empresa       = Auth::user()->fk_empresa;
            $p->fk_especialidade = 3;
            $p->fk_categoria     = $request->categoria;
            $p->nome             = $request->nome_procedimento;
            $p->protetico        = $protetico;
            $p->valor_sugerido   = $valor_sugerido;
            $p->save();
        }
        if (isset($request->odontopediatria)) {
            $p->fk_empresa       = Auth::user()->fk_empresa;
            $p->fk_especialidade = 4;
            $p->fk_categoria     = $request->categoria;
            $p->nome             = $request->nome_procedimento;
            $p->protetico        = $protetico;
            $p->valor_sugerido   = $valor_sugerido;
            $p->save();
        }
        if (isset($request->orofacial)) {
            $p->fk_empresa       = Auth::user()->fk_empresa;
            $p->fk_especialidade = 5;
            $p->fk_categoria     = $request->categoria;
            $p->nome             = $request->nome_procedimento;
            $p->protetico        = false;
            $p->valor_sugerido   = $valor_sugerido;
            $p->save();
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
        $procedimento = $procedimento->getProcedimentoEmpresa(Auth::user()->fk_empresa, $procedimento->id);

        return view('Procedimentos.editarProcedimento', compact('procedimento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Procedimentos\Procedimento  $procedimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Procedimento $procedimento)
    {
        if (!$request->valor_sugerido) {
            $proc['valor_sugerido'] = 0;
        } else {
            $value = str_replace(".", "", $request->valor_sugerido);
            $valor = str_replace(",", ".", $value);
            $proc['valor_sugerido'] = $valor;
        }

        $procedimento->where('id', $procedimento->id)->where('fk_empresa', Auth::user()->fk_empresa)->update($proc);

        return redirect('/procedimentos')->with('success', 'Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Procedimentos\Procedimento  $procedimento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $desativado = Procedimento::where('id', $request->id)
            ->where('fk_empresa', Auth::user()->fk_empresa)
            ->update(['fk_usuario_desativou' => Auth::user()->id, 'ativo' => false]);

        if ($desativado) {
            return json_encode(true);
        } else {
            return json_encode(false);
        }
    }
}
