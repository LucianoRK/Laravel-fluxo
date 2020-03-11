@extends('layouts.app')
@section('title', 'Agenda')


@section('content')
    <style>
        #horario{
            width: 60px;
        }
    </style>
    @foreach ($horarios as $horario)
        <div class="row mb-2">
            <div class="input-group col-8">
                <span class="input-group-text text-white bg-primary" id="horario"><strong>{{$horario}}</strong></span>
                <button type="button" class="form-control btn btn-white btn-block agenda_visivel text-left"></button>
                <input type="text" class="form-control agenda_editavel agenda_nome bg-white" placeholder="Nome" aria-describedby="horario">
                <input type="text" class="form-control agenda_editavel agenda_telefone bg-white" placeholder="Telefone">
                <button class="btn btn-success agenda_btn_salvar "><i class="la la-check text-white"></i></button>
                <button class="btn btn-danger agenda_btn_cancelar"><i class="la la-close text-white"></i></button>
            </div>
            <div class="col-4 form">
                <button class="btn btn-info">EDITAR</button>
                <button class="btn btn-danger">DELETAR</button>
                <button class="btn btn-success">CADASTRAR</button>
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

        $(document).ready(function(){
            agendarAvaliacao();
        });
    </script>
@endsection

