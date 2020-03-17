@extends('layouts.app')
@section('title', 'Agenda')


@section('content')
    <style>
        :root {
            --largura_horario: 60px; /* Valor da largura do horario */
        }
        #horario{
            width: var(--largura_horario);
        }
    </style>
    <div class="row mb-3">
        <div class="input-group col-md-8">
            <input type="date" class="btn btn-primary" required>
            <select class="form-control">
                <option>teste</option>
            </select>
        </div>
    </div>
    @foreach ($horarios as $horario)
        <div class="row mb-2">
            <div class="input-group col-md-8 agenda_line">
                <span class="input-group-text text-white bg-primary" id="horario"><strong>{{$horario}}</strong></span>
                <button type="button" class="form-control btn-white btn-block agenda_visivel text-left"></button>
                <input type="text" class="form-control agenda_editavel agenda_nome bg-white" placeholder="Nome" aria-describedby="horario">
                <input type="text" class="form-control agenda_editavel agenda_telefone bg-white" placeholder="Telefone">
                <button class="btn-success agenda_btn_salvar "><i class="la la-check text-white"></i></button>
                <button class="btn-danger agenda_btn_cancelar"><i class="la la-close text-white"></i></button>
            </div>
            <div class="col-md-4">
                <button class="btn btn-info">Editar</button>
                <button class="btn btn-danger">Deletar</button>
                <button class="btn btn-success">Cadastrar</button>
            </div>
        </div>
    @endforeach
    <script>
        $('.agenda_editavel').hide();
        esconderBotoes();
        function agendarAvaliacao(){
            $('.agenda_visivel').click(function(){
                let nome;
                let telefone;
                $('.agenda_editavel').hide();
                $('.agenda_visivel').show();
                esconderBotoes();
                $(this).hide();
                $(this).parent().find('.agenda_editavel').show();
                $(this).parent().find('.agenda_nome').select();
                $(this).parent().find('.agenda_btn_salvar').show();
                $(this).parent().find('.agenda_btn_cancelar').show();
                salvarAgendamento();
                cancelarAgendamento();
            });
        }
        function salvarAgendamento(){
            $('.agenda_btn_salvar').click(function(){
                let nome;
                let telefone;
                let texto;

                nome = $(this).parent().find('.agenda_nome').val();
                telefone = $(this).parent().find('.agenda_telefone').val();
                texto = '[ AVALIAÇÃO ] '+ nome + ' - ' + telefone;

                $('.agenda_editavel').hide();
                $('.agenda_visivel').show();
                esconderBotoes();
                $(this).parent().find('.agenda_visivel').text(texto);
            });
        }
        function cancelarAgendamento(){
            $('.agenda_btn_cancelar').click(function(){
                $('.agenda_editavel').hide();
                $('.agenda_visivel').show();
                esconderBotoes();
                $(this).parent().find('.agenda_visivel').text('');
            });
        }
        function esconderBotoes(){
            $('.agenda_btn_salvar').hide();
            $('.agenda_btn_cancelar').hide();
        }
        function data_agenda(){
            $('.data_agenda').change(function(){
                
                alert($(this).val());
            });
        }

        $(document).ready(function(){
            data_agenda();
            agendarAvaliacao();
            $('.data_agenda').val(Date());
        });
    </script>
@endsection

