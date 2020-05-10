@foreach ($agenda_lista as $agenda)
<div class="row mb-2 agenda_linha">
    <div class="input-group col-md-8 agenda_campos">
        <span class="input-group-text text-white {{ $agenda['cor_horario'] }} horario_width" ><strong>{{ $agenda['hora'] }}</strong></span>
        <div class="form-control select_cliente_busca"></div>
        <button type="button" class="form-control text-left agenda_mostrar agenda_mostrar_nome bg-white" agenda_id='{{ $agenda['id_agenda'] }}'>{{ $agenda['nome'] }} </button>
        <input type="text" class="form-control agenda_adicionar agenda_adicionar_nome bg-white" placeholder="Nome" aria-describedby="horario">
        <input type="text" class="form-control agenda_adicionar agenda_adicionar_telefone bg-white" placeholder="Telefone" aria-describedby="horario">
    </div>
    <div class="col-md-4 agenda_adicionar">
        <button class="btn btn-info    agenda_btn_buscar_cliente" title="Buscar por nome"><i class="la la-search text-white"></i></button>
        <button class="btn btn-success agenda_btn_salvar" title="Agendar"><i class="la la-check text-white"></i></button>
        <button class="btn btn-danger  agenda_btn_cancelar" title="Cancelar agendamento"><i class="la la-close text-white"></i></button>
    </div>
    @if ($agenda['id_agenda'])
        @if ($agenda['status'] == 1 && $agenda['data_agendamento'] == date('Y-m-d')) 
            <!-- Agendado -->
            <div class="col-md-4">
                <button class="btn btn-info agenda_btn_presenca" agenda_id="{{ $agenda['id_agenda'] }}" title="Presença"><i class="la la-check-square text-white"></i></button>
            </div>
        @endif
    @endif
    <input type="hidden" class="horario" value="{{ $agenda['hora_agendamento'] }}">
    <input type="hidden" class="tratamento" value="{{ $agenda['fk_tratamento'] }}">
</div>
@endforeach
<script>
    resetarCampos();

    function buscarCliente() {
        $('.agenda_btn_buscar_cliente').on('click', function() {
            let dentista = $('.dentista_agenda').val();
            let nome = $(this).parents('.agenda_linha').find('.agenda_campos').find('.agenda_adicionar_nome').val();

            $(this).parents('.agenda_linha').find('.agenda_campos').find(".select_cliente_busca").load("lista-clientes-filtrado", {
                _token: "{{ csrf_token() }}",
                nome: nome,
                dentista: dentista,
            }, function(clientes) {
                $(this).parents('.agenda_linha').find('.agenda_campos').find('.agenda_mostrar').hide();
                $(this).parents('.agenda_linha').find('.agenda_campos').find('.agenda_adicionar').hide();
                $(this).parents('.agenda_linha').find('.agenda_campos').find('.select_cliente_busca').show();
            });
        })
    }

    function abrirCamposParaAdicionar() {
        $('.agenda_mostrar_nome').on('click', function() {
            let data_agendamento = $('.data_agenda').val();
            resetarCampos();
            if (!$(this).attr("agenda_id") && liberarAgendamento(data_agendamento)) {
                let nome;
                let telefone;
                $(this).hide();
                $(this).parent().find('.agenda_adicionar').show();
                $(this).parent().find('.agenda_adicionar_nome').select();
                $(this).parents('.agenda_linha').find('.agenda_adicionar').show();
                $(this).parents('.agenda_linha').find('.agenda_mostrar').hide();

                if ($('.dentista_agenda').val() == 0) {
                    $('.agenda_btn_buscar_cliente').hide();
                }
            }
        });
    }

    function liberarAgendamento(data) {
        let hoje  = new Date();
        let parts = data.split('-')
        data      = new Date(parts[0], parts[1] - 1, parts[2], 23, 59, 59) // ex: 2020-05-10 23:59:59    

        return data >= hoje ? true : false
    }

    function salvarAgendamento() {
        $('.agenda_btn_salvar').on('click', function() {
            resetarCampos();
            let horario = $(this).parents('.agenda_linha').find('.horario').val();
            let dentista = $('.dentista_agenda').val();
            let data = $('.data_agenda').val();

            if ($(this).parents('.agenda_linha').find('.select_clientes').val() > 0) {

                let texto = $(this).parents('.agenda_linha').find('.select_clientes').find(":selected").text();
                let id_tratamento = $(this).parents('.agenda_linha').find('.select_clientes').val();

                $(this).parents('.agenda_linha').find('.agenda_campos').find('.agenda_mostrar_nome').text(texto);

                $.post("gravar-agendamento-tratamento", {
                    _token: "{{ csrf_token() }}",
                    data: data,
                    horario: horario,
                    id_tratamento: id_tratamento
                }, function() {
                    getAgenda();
                });
            } else {
                let nome = $(this).parents('.agenda_linha').find('.agenda_campos').find('.agenda_adicionar_nome').val();
                let telefone = $(this).parents('.agenda_linha').find('.agenda_campos').find('.agenda_adicionar_telefone').val();
                let texto = '[ AVALIAÇÃO ] ' + nome + ' - ' + telefone;

                $(this).parents('.agenda_linha').find('.agenda_campos').find('.agenda_mostrar_nome').text(texto);
                $.post("gravar-avaliacao", {
                    _token: "{{ csrf_token() }}",
                    dentista: dentista,
                    data: data,
                    nome: texto,
                    horario: horario
                }, function() {
                    getAgenda();
                });
            }
        });
    }

    function presenca() {
        $('.agenda_btn_presenca').on('click', function() {
            let nome = $(this).parents('.agenda_linha').find('.agenda_campos').find('.agenda_adicionar_nome').text();
            Swal.fire({
                title: 'Deseja marcar como presença ?',
                text: nome,
                showCancelButton: true,
                confirmButtonColor: '#2cb396',
                cancelButtonColor: '#ff4d68',
                confirmButtonText: 'Sim',
                cancelButtonText: 'Não'
                }).then((result) => {
                if (result.value) {
                    $(this).hide();
                    let agenda_id = $(this).attr('agenda_id')
                    $.post("presenca", {
                        _token: "{{ csrf_token() }}",
                        id_agenda: agenda_id
                    }, function() {
                        getAgenda();
                    });
                }
            })
        });
    }

    function cancelarAgendamento() {
        $('.agenda_btn_cancelar').on('click', function() {
            resetarCampos();
            $(this).parents('.agenda_linha').find('.agenda_campos').find('.agenda_mostrar_nome').text('');
        });
    }

    $(document).ready(function() {
        resetarCampos();
        abrirCamposParaAdicionar();
        salvarAgendamento();
        cancelarAgendamento();
        buscarCliente();
        presenca();
    });
</script>