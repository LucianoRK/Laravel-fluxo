@extends('layouts.app')

@section('title', 'Procedimentos')

@section('content')

@can('permissao', 11)
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-header text-success">
                        <div class="text-right">
                            <a class="btn btn-primary" href="procedimentos/create">Novo Procedimento</a>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <span class="align-middle">PROCEDIMENTOS</span>
                            </div>
                        </div>
                    </h5>
                    
                    <div class="table-responsive" style="max-width: 100% !important;">
                        <table class="table table-sm table-striped table_procedimentos">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" class="text-success">#</th>
                                    <th scope="col" class="text-success">ESPECIALIDADE</th>
                                    <th scope="col" class="text-success">CATEGORIA</th>
                                    <th scope="col" class="text-success">PROCEDIMENTO</th>
                                    <th scope="col" class="text-success">VALOR SUGERIDO</th>
                                    <th scope="col" class="text-success">PROTETICO</th>
                                    <th scope="col" class="text-success">OPÇÕES</th>
                                </tr>
                            </thead>
                            <tbody class="container">
                                @if ($procedimentos) 
                                    @foreach ($procedimentos as $procedimento)
                                        <tr>
                                            <td class="text-center">
                                                {{ $count++}}
                                            </td>
                                            <td class="text-center">
                                               {{ $procedimento->nome_esp }}
                                            </td>
                                            <td class="text-center">
                                                {{ $procedimento->nome_cat }}
                                            </td>
                                            <td>
                                                [{{ $procedimento->id }}] - {{ $procedimento->nome_proc }}
                                            </td>
                                            <td class="text-center">
                                                {{ Helper::currencyMysqlForBr($procedimento->valor_sugerido) }}
                                            </td>
                                            <td class="text-center">
                                                {{ $procedimento->protetico ? 'Sim' : 'Não' }}
                                            </td>
                                            <td class="text-center" id_procedimento="{{ $procedimento->id }}">
                                                <a href="{{ url("procedimentos/$procedimento->id/edit") }}" class="btn btn-info btn-sm editar" title="Editar valor"> 
                                                    <i class="la la-edit text-white font-size-22"></i> 
                                                </a>

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
    function desativarProcedimento() {
        $('.desativar').on('click', function() {
            let id_procedimento = $(this).parent().attr('id_procedimento');
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
                        url: "procedimentos/"+id_procedimento,
                        type: 'delete',
                        dataType: "JSON",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id_procedimento
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
        dataTable('table_procedimentos');
        desativarProcedimento();
    });
</script>

@endsection