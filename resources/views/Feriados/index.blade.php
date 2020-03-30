@extends('layouts.app')

@section('title', 'Feriados')

@section('content')

@can('permissao', 11)
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-header text-success">
                        <div class="text-right">
                            <a class="btn btn-primary" href="feriados/create">Novo Feriado</a>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <span class="align-middle">FERIADOS</span>
                            </div>
                        </div>
                    </h5>
                    
                    <div class="table-responsive" style="max-width: 100% !important;">
                        <table class="table table-sm table-striped table_feriados">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" class="text-success">#</th>
                                    <th scope="col" class="text-success">DESCRIÇÃO</th>
                                    <th scope="col" class="text-success">DATA</th>
                                    <th scope="col" class="text-success">OPÇÕES</th>
                                </tr>
                            </thead>
                            <tbody class="container">
                                @if ($feriados) 
                                    @foreach ($feriados as $feriado)
                                        <tr>
                                            <td class="text-center">
                                                {{ $count++}}
                                            </td>
                                            <td class="text-center">
                                               {{ $feriado->descricao }}
                                            </td>
                                            <td class="text-center">
                                                {{ Helper::mysql_to_date($feriado->data) }}
                                            </td>

                                            <td class="text-center" id_feriado="{{ $feriado->id }}">
                                                <button class="btn btn-danger btn-sm desativar" title="Desativar"> 
                                                    <i class="la la-trash text-white font-size-22"></i> 
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endcan

<script>
    function desativar() {
        $('.desativar').on('click', function() {
            let id_feriado = $(this).parent().attr('id_feriado');
            desativaBotao(this);
            
            swal({
                title: 'Desativar?',
                text: '',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim',
                cancelButtonText: 'Não',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "feriados/"+id_feriado,
                        type: 'delete',
                        dataType: "JSON",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id_feriado
                        },
                        success: function (data){
                            if (data) {
                                swal({
                                    position: '',
                                    type: 'success',
                                    title: 'Sucesso!',
                                    showConfirmButton: false,
                                    timer: 1100
                                })

                                setTimeout( function() {
                                    window.location.reload()
                                }, 1100 );
                            } else {
                                swal({
                                    position: '',
                                    type: 'error',
                                    title: 'Erro!',
                                    showConfirmButton: false,
                                    timer: 1100
                                })
                            }
                        }
                    });
                }
                ativarBotao(this);
            })
        });
    }

    $(document).ready(function() {
        dataTable('table_feriados');
        desativar();
    });
</script>

@endsection