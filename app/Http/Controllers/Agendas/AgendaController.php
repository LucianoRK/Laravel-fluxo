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
        $dentistas = Usuario::select('id', 'nome')
            ->where('fk_tipo_usuario', 3)
            ->where('fk_empresa', Auth::user()->fk_empresa)
            ->where('ativo', 1)
            ->get();
    
        return View('Agendas.agenda',compact('dentistas'));
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
                $formato = '%02d:%02d:00';
                array_push($horarios, sprintf($formato, $hora, $min * $intervalo_min));
            }
        }
    
        return $horarios;
    }

    public function agendaVazia($horario){
        $agenda = [
            "hora"             => substr($horario, 0 , 5),
            "hora_agendamento" => $horario,
            "hora_presenca"    => "",
            "id_agenda"        => "",
            "nome_agenda"      => "",
            "nome_cliente"     => "",
            "fk_tratamento"    => "",
            "status"           => ""
        ];
        return $agenda;
    }

    public function getAgendados(Request $request){
        $agenda_item = [];
        $agenda_lista = [];

        $agendas = Agenda::select(
                'agendas.hora_agendamento',
                'agendas.hora_presenca',
                'agendas.id as id_agenda',
                'agendas.nome as nome_agenda', 
                'clientes.nome as nome_cliente',
                'agendas.fk_tratamento',
                'agendas.status'
            )
            ->leftJoin('clientes', 'clientes.id', '=', 'agendas.fk_cliente')
            ->where('agendas.fk_usuario_dentista', $request->dentista)
            ->where('agendas.fk_empresa', Auth::user()->fk_empresa)
            ->where('agendas.data_agendamento', $request->data)
            ->get();
        
        $horarios = $this->horariosAgenda();

        foreach($horarios as $horario){
            if(count($agendas) > 0){
                foreach($agendas as $agenda){
                    if($agenda->hora_agendamento == $horario){
                        $agenda_item = [
                            "hora"             => substr($horario, 0 , 5),
                            "hora_agendamento" => $horario,
                            "hora_presenca"    => $agenda->hora_presenca,
                            "id_agenda"        => $agenda->id_agenda,
                            "nome_agenda"      => $agenda->nome_agenda,
                            "nome_cliente"     => $agenda->nome_cliente,
                            "fk_tratamento"    => $agenda->fk_tratamento,
                            "status"           => $agenda->status
                        ];
                    }else{
                        $agenda_item = $this->agendaVazia($horario);
                    }
                    array_push($agenda_lista, $agenda_item);
                }
            }else{
                array_push($agenda_lista, $this->agendaVazia($horario));
            }
        }
        return View('Agendas.load.agenda_load',compact('agenda_lista'));
    }
}
