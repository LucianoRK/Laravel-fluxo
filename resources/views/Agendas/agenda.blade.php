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
    <div class="agenda_lista"></div>
    <script>
        function getAgenda(){
            let data = $('.data_agenda').val();
            let dentista = $('.dentista_agenda').val();
            let route_agenda = 'agenda-lista';
            let tipo_usuario_logado = '{{Auth::user()->fk_tipo_usuario}}';
            
            if(tipo_usuario_logado == 3){
                route_agenda = 'agenda-lista-dentista';
                $('.dentista_agenda').hide();
            }
       
            $( ".agenda_lista" ).load( route_agenda ,{
                _token: "{{ csrf_token() }}",
                data: data, 
                dentista: dentista
            });        
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
            infosChange();
            getAgenda();
        });
    </script>
@endsection

