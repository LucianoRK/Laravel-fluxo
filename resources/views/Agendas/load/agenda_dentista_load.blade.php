@foreach ($agenda_lista as $agenda)
<div class="row mb-2 agenda_linha">
    <div class="input-group col-md-8 agenda_campos">
        <span class="input-group-text text-white bg-primary horario_width"><strong>{{ $agenda['hora'] }}</strong></span>
        <button type="button" class="form-control text-left agenda_mostrar agenda_mostrar_nome bg-white" agenda_id='{{ $agenda['id_agenda'] }}'>{{ $agenda['nome'] }} </button>
    </div>
    <div class="col-md-4">
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

$(document).ready(function(){
   
});
</script>