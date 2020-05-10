@extends('layouts.app')
@section('title', 'Agenda')

@section('content')
    <style>
        :root {
            --largura_horario: 60px; /* Valor da largura do horario */
        }
        .horario_width {
            width: var(--largura_horario);
        }
        .vcenter {
            display: inline-block;
            vertical-align: middle;
            float: none;
        }
    </style>
    <div class="row mb-3">
        <div class="input-group col-md-8">
            <input type="date" class="btn btn-primary data_agenda" required>
            <select class="form-control dentista_agenda">
                @foreach ($dentistas as $dentista)
                    <option value="{{ $dentista->id }}">{{ $dentista->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4 vcenter">
            <div class="preloader pl-xxs pls-primary loader_agenda">
                <svg class="pl-circular" viewBox="25 25 50 50">
                    <circle class="plc-path" cx="50" cy="50" r="20"/>
                </svg>
            </div>
        </div>
    </div>
    <div class="agenda_lista"> </div>
    <script>
        function getAgenda(){
            resetarCampos();
            
            let data                = $('.data_agenda').val();
            let dentista            = $('.dentista_agenda').val();

            if(data && dentista){
                $('.loader_agenda').show();
                $('.agenda_mostrar').attr("disabled", true);
                let agenda_dentista     = false;
                let tipo_usuario_logado = '{{Auth::user()->fk_tipo_usuario}}';

                if(tipo_usuario_logado == 3){
                    agenda_dentista = true;
                    dentista = '{{Auth::user()->id}}';
                    $('.dentista_agenda').hide();
                }
                $( ".agenda_lista" ).load( "agenda-lista" ,{
                    _token: "{{ csrf_token() }}",
                    data: data, 
                    dentista: dentista,
                    agenda_dentista: agenda_dentista
                }, function(){
                    $('.loader_agenda').hide();
                });    
            }               
        }

        function infosChange(){
            $('.data_agenda').change(function(){    
                getAgenda();
            });
            $('.dentista_agenda').change(function(){     
                getAgenda();
            });
        }
        
        function resetarCampos(){
            $('.agenda_mostrar').show();
            $('.agenda_adicionar').hide();
            $('.select_cliente_busca').hide();
        }

        $(document).ready(function(){
            $('.loader_agenda').hide();
            infosChange();
            getAgenda();
            setInterval(
                function(){ 
                    getAgenda();
                }, 
            300000); //5 min 300000
        });
    </script>
@endsection

