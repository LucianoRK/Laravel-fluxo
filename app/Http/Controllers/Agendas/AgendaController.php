<?php

namespace App\Http\Controllers;

use App\Models\Agendas\Agenda;
use App\Models\Tratamentos\Tratamento;
use App\Models\Usuarios\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return View('Agendas.agenda', compact('dentistas'));
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

    public function horariosAgenda()
    {
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

    public function gravarAvaliacao(Request $request)
    {
        $agenda                      = new Agenda();
        $agenda->fk_empresa          = Auth::user()->fk_empresa;
        $agenda->fk_usuario_dentista = $request->dentista;
        $agenda->nome                = $request->nome;
        $agenda->status              = '1';
        $agenda->data_agendamento    = $request->data;
        $agenda->hora_agendamento    = $request->horario;
        $agenda->save();
    }

    public function gravarAgendamentoTratamento(Request $request)
    {
        /*
        *Busco o dentista associado no tratamento,
        *para não ter a possibilidade de trocar de profissional no agendamento
        */
        $tratamento                  = Tratamento::where('id', $request->id_tratamento)->get()->first();
        $agenda                      = new Agenda();
        $agenda->fk_empresa          = Auth::user()->fk_empresa;
        $agenda->fk_usuario_dentista = $tratamento->fk_usuario_dentista;
        $agenda->fk_cliente          = $tratamento->fk_cliente;
        $agenda->fk_tratamento       = $request->id_tratamento;
        $agenda->status              = '1'; //agendado
        $agenda->data_agendamento    = $request->data;
        $agenda->hora_agendamento    = $request->horario;
        $agenda->save();
    }

    public function agendaVazia($horario)
    {
        $agenda = [
            "hora"               => substr($horario, 0, 5),
            "hora_agendamento"   => $horario,
            "hora_presenca"      => "",
            "data_agendamento"   => "",
            "id_agenda"          => "",
            "nome"               => "",
            "fk_tratamento"      => "",
            "status"             => "",
            "cor_horario"        => "bg-primary",
            "nome_especialidade" => "",
        ];
        return $agenda;
    }

    public function getAgendados(Request $request)
    {
        $agenda_lista = [];

        $agendas = Agenda::select(
            'agendas.data_agendamento',
            'agendas.hora_agendamento',
            'agendas.hora_presenca',
            'agendas.id as id_agenda',
            'agendas.nome as nome_agenda',
            'clientes.nome as nome_cliente',
            'agendas.fk_tratamento',
            'agendas.status',
            'especialidades.nome as nome_especialidade'
        )
            ->leftJoin('clientes', 'clientes.id', '=', 'agendas.fk_cliente')
            ->leftJoin('tratamentos', 'tratamentos.id', '=', 'agendas.fk_tratamento')
            ->leftjoin('especialidades', 'especialidades.id', '=', 'tratamentos.fk_especialidade')
            ->where('agendas.fk_usuario_dentista', $request->dentista)
            ->where('agendas.fk_empresa', Auth::user()->fk_empresa)
            ->where('agendas.data_agendamento', $request->data)
            ->where('agendas.status', '<' , '3')
            ->get();

        $horarios = $this->horariosAgenda();

        foreach ($horarios as $horario) {
            if (count($agendas) > 0) {
                $agenda_item = [];
                foreach ($agendas as $agenda) {
                    if ($agenda->hora_agendamento == $horario) {
                        if ($agenda->fk_tratamento) {
                            $nome_apresentar = $agenda->nome_cliente . ' - ' . $agenda->nome_especialidade . ' - [' . $agenda->fk_tratamento . ']';
                        } else {
                            $nome_apresentar = $agenda->nome_agenda;
                        }
                  
                        $agenda_item = [
                            "hora"               => substr($horario, 0, 5),
                            "hora_agendamento"   => $horario,
                            "hora_presenca"      => $agenda->hora_presenca,
                            "data_agendamento"   => $agenda->data_agendamento,
                            "id_agenda"          => $agenda->id_agenda,
                            "nome"               => $nome_apresentar,
                            "fk_tratamento"      => $agenda->fk_tratamento,
                            "status"             => $agenda->status,
                            "cor_horario"        => $this->corHorario($agenda->status, $agenda->data_agendamento, $agenda->hora_agendamento),
                            "nome_especialidade" => $agenda->nome_especialidade
                        ];
                    }
                }
                if (count($agenda_item) > 0) {
                    array_push($agenda_lista, $agenda_item);
                } else {
                    array_push($agenda_lista, $this->agendaVazia($horario));
                }
            } else {
                array_push($agenda_lista, $this->agendaVazia($horario));
            }
        }

        if ($request->agenda_dentista == 'true') {
            return View('Agendas.load.agenda_dentista_load', compact('agenda_lista'));
        } else {
            return View('Agendas.load.agenda_load', compact('agenda_lista'));
        }
    }

    private function corHorario($status, $data_agendamento, $horario_agendamento)
    {
        $data_hoje = date('Y-m-d');
        $agora = strtotime(date('H:i:s'));
        $horario_agendamento_str = strtotime($horario_agendamento);

        if($data_agendamento < $data_hoje && $status != 2){
            return 'bg-danger';
        }
        if($data_agendamento == $data_hoje && $horario_agendamento_str < $agora && $status != 2){
            return 'bg-danger';
        }
        switch ($status) {
            case 1:
                return 'bg-primary';
            case 2:
                return 'bg-success';
            default:
                return 'bg-primary';
        }
    }

    public function presenca(Request $request, Agenda $agenda)
    {
        $agenda->where('id', $request->id_agenda)->update(['status' => 2]);
    }

    public function cancelarAgendamento(Request $request, Agenda $agenda)
    {
        $agenda->where('id', $request->id_agenda)->update(['status' => 3]);
    }
}
