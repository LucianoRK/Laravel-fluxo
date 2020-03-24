<?php

namespace App\Http\Controllers;

use App\Models\Agendas\Agenda;
use App\Models\Usuarios\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dentistas = DB::table('usuarios')->select('id', 'nome')
            ->where('fk_tipo_usuario', 3)
            ->where('fk_empresa', Auth::user()->fk_empresa)
            ->where('ativo', 1)
            ->get();
        $horarios  = $this->horariosAgenda();
    
        return View('Agendas.agenda',compact('horarios', 'dentistas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        dd($request);
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
     * @param  \App\Models\Agendas\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agendas\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agendas\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agendas\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        //
    }

    public function horariosAgenda(){
        $hora_inicial = 8;
        $hora_final = 23;
        $intervalo_min = 15;
        $horarios = [];

        for ($hora = $hora_inicial; $hora < $hora_final; $hora++) { 
            for ($min = 0; $min < 4; $min++) { 
                $formato = '%02d:%02d';
                array_push($horarios, sprintf($formato, $hora, $min * $intervalo_min));
            }
        }
    
        return $horarios;
    }
}
