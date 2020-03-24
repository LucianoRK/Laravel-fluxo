@extends('layouts.app')
@section('title', 'Agenda')


@section('content')
    <style>
        :root {
            --largura_horario: 60px; /* Valor da largura do horario */
        }
        #horario {
            width: var(--largura_horario);
        }
    </style>
    <div class="row mb-3">
        <div class="input-group col-md-8">
            <input type="date" class="btn btn-primary data_agenda" required>
            <select class="form-control dentista_agenda">
                <option value="0" selected='selected'>Agenda de Avaliações</option>
                @foreach ($dentistas as $dentista)
                    <option value="{{ $dentista->id }}">{{ $dentista->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
   
    @foreach ($horarios as $horario)
        <div class="row mb-2">
            <div class="input-group col-md-8 agenda_line">
                <span class="input-group-text text-white bg-primary" id="horario"><strong>{{$horario}}</strong></span>
                <button type="button" class="form-control btn-white btn-block agenda_visivel text-left"></button>
                <div class="btn-group dropdown">
                    <input type="text" class="form-control agenda_editavel agenda_nome bg-white" placeholder="Nome" aria-describedby="horario">
                    <button class="btn btn-info agenda_editavel btn_buscar_cliente" data-toggle="dropdown"><i class="la la-search text-white"></i></button>
                    <div class="dropdown-menu drop-select-agenda lista_clintes" x-placement="bottom-start"></div>
                </div>
                <input type="text" class="form-control agenda_editavel agenda_telefone bg-white" placeholder="Telefone">
                <button class="btn btn-success agenda_btn_salvar "><i class="la la-check text-white"></i></button>
                <button class="btn btn-danger agenda_btn_cancelar"><i class="la la-close text-white"></i></button>
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

        function agendar(){
            $('.agenda_visivel').on('click',function(){
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
                if($('.dentista_agenda').val() == 0){
                    $('.btn_buscar_cliente').hide(); 
                }
                salvarAgendamento();
                cancelarAgendamento();
            });
        }
        
        function salvarAgendamento(){
            $('.agenda_btn_salvar').on('click',function(){
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
            $('.agenda_btn_cancelar').on('click',function(){
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

        function infosChange(){
            $('.data_agenda').change(function(){     
                location.reload();
            });
            $('.dentista_agenda').change(function(){     
                location.reload();
            });
        }

        function buscarCliente(){
            $('.btn_buscar_cliente').on('click', function(){
                $(".lista_clintes").css("width","120%");
                let dentista =  $('.dentista_agenda').val();

                let nome = $(this).parent().find('.agenda_nome').val();

                $(this).parent().find( ".lista_clintes" ).load( "lista-clientes-filtrado" ,{
                    _token: "{{ csrf_token() }}",
                    nome: nome, 
                    dentista: dentista
                }, function(clientes){
                    
                });        
            })
        }

        $(document).ready(function(){
            
            infosChange();
            agendar();
            buscarCliente();
        });
    </script>
@endsection

