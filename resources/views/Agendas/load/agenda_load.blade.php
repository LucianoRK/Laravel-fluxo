@foreach ($agenda_lista as $agenda)
<div class="row mb-2 agenda_linha">
    <div class="input-group col-md-8 agenda_campos">
        <span class="input-group-text text-white bg-primary horario_width"><strong>{{ $agenda['hora'] }}</strong></span>
        <div class="form-control select_cliente_busca"></div>
        <button type="button" class="form-control text-left agenda_mostrar agenda_mostrar_nome bg-white">{{ $agenda['nome'] }} </button>
        <input type="text" class="form-control agenda_adicionar agenda_adicionar_nome bg-white" placeholder="Nome" aria-describedby="horario">     
        <input type="text" class="form-control agenda_adicionar agenda_adicionar_telefone bg-white" placeholder="Telefone" aria-describedby="horario">     
    </div>
    <div class="col-md-4 agenda_mostrar">
        <button class="btn btn-info">Editar</button>
        <button class="btn btn-danger">Deletar</button>
        <button class="btn btn-success">Cadastrar</button>
    </div>
    <div class="col-md-4 agenda_adicionar">
        <button class="btn btn-info    agenda_btn_buscar_cliente"><i class="la la-search text-white"></i></button>
        <button class="btn btn-success agenda_btn_salvar"><i class="la la-check text-white"></i></button>
        <button class="btn btn-danger  agenda_btn_cancelar"><i class="la la-close text-white"></i></button>
    </div>
    <input type="hidden" class="horario" value="{{ $agenda['hora_agendamento'] }}"> 
    <input type="hidden" class="tratamento" value="{{ $agenda['fk_tratamento'] }}"> 
</div>
@endforeach
<script>
resetarCampos();

function buscarCliente(){
    $('.agenda_btn_buscar_cliente').on('click', function(){
        let dentista =  $('.dentista_agenda').val();
        let nome     = $(this).parents('.agenda_linha').find('.agenda_campos').find('.agenda_adicionar_nome').val();

        $(this).parents('.agenda_linha').find('.agenda_campos').find( ".select_cliente_busca" ).load( "lista-clientes-filtrado" ,{
            _token: "{{ csrf_token() }}",
            nome: nome, 
            dentista: dentista,
        }, function(clientes){
            $(this).parents('.agenda_linha').find('.agenda_campos').find('.agenda_mostrar').hide();
            $(this).parents('.agenda_linha').find('.agenda_campos').find('.agenda_adicionar').hide();
            $(this).parents('.agenda_linha').find('.agenda_campos').find('.select_cliente_busca').show();
        });        
    })
}

function abrirCamposParaAdicionar(){
    $('.agenda_mostrar_nome').on('click',function(){
        let nome;
        let telefone;
        resetarCampos();
        $(this).hide();
        $(this).parent().find('.agenda_adicionar').show();
        $(this).parent().find('.agenda_adicionar_nome').select();
        $(this).parents('.agenda_linha').find('.agenda_adicionar').show();
        $(this).parents('.agenda_linha').find('.agenda_mostrar').hide();

        if($('.dentista_agenda').val() == 0){
            $('.agenda_btn_buscar_cliente').hide(); 
        }
    });
}

function salvarAgendamento(){
    $('.agenda_btn_salvar').on('click',function(){
        resetarCampos();
        let nome     = $(this).parents('.agenda_linha').find('.agenda_campos').find('.agenda_adicionar_nome').val();
        let telefone = $(this).parents('.agenda_linha').find('.agenda_campos').find('.agenda_adicionar_telefone').val();  
        let horario  = $(this).parents('.agenda_linha').find('.horario').val();  
        let dentista = $('.dentista_agenda').val();
        let data     = $('.data_agenda').val();
        let texto    = '[ AVALIAÇÃO ] '+ nome + ' - ' + telefone;
        
        $(this).parents('.agenda_linha').find('.agenda_campos').find('.agenda_mostrar_nome').text(texto);
        
        $.post( "gravar-avaliacao", {
            _token: "{{ csrf_token() }}",
            dentista: dentista,
            data: data,
            nome: texto,
            horario: horario
        });
    });
}

function cancelarAgendamento(){
    $('.agenda_btn_cancelar').on('click',function(){
        resetarCampos();
        $(this).parents('.agenda_linha').find('.agenda_campos').find('.agenda_mostrar_nome').text('');
    });
}

$(document).ready(function(){
    resetarCampos();
    abrirCamposParaAdicionar();
    salvarAgendamento();
    cancelarAgendamento();
    buscarCliente();
});
</script>