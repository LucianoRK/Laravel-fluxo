@extends('layouts.app')

@section('title', 'Radiologistas')

@section('content')

@can('permissao', 12)
    <div class="row">
        <div class="col-md-12">
            <!-- RADIOLOGISTAS ATIVOS -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <h5 class="card-header text-success">
                            <div class="text-right">
                                <a class="btn btn-primary" href="radiologistas/create">Novo Radiologistas</a>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <span class="align-middle">RADIOLOGISTAS ATIVOS - [ {{ $empresa->nome }} ]</span>
                                </div>
                            </div>
                        </h5>

                        <table class="table table-bordered table-striped table_ativos">
                            <thead class="text-center">
                                <tr>
                                    <th class="text-success">#</th>
                                    <th class="text-success">RAZÃO SOCIAL</th>
                                    <th class="text-success">NOME FANTASIA</th>
                                    <th class="text-success">CONTATO</th>
                                    <th class="text-success">OPÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($radiologistas['ativos']) 
                                    @foreach ($radiologistas['ativos'] as $radiologista)
                                        <tr>
                                            <td class="text-center">
                                                {{ $count++}}
                                            </td>
                                            <td>
                                                [{{ $radiologista->id }}] - {{ $radiologista->razao_social }}
                                            </td>
                                            <td>
                                                {{ $radiologista->nome_fantasia }}
                                            </td>
                                            <td class="text-center">
                                                {{ $radiologista->celular }}
                                            </td>
                                            <td class="text-center" id_radiologista="{{ $radiologista->id }}">
                                                <a href="{{ url("radiologistas/$radiologista->id/edit") }}" class="btn btn-info btn-sm editar" title="Editar"> 
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

            <!-- RADIOLOGISTAS INATIVOS -->
            @if ( count($radiologistas['inativos']) > 0) 
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h5 class="card-header text-danger">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <span class="align-middle">RADIOLOGISTAS INATIVOS - [ {{ $empresa->nome }} ]</span>
                                    </div>
                                </div>
                            </h5>

                            <table class="table table-striped table-bordered table_inativos">
                                <thead class="text-center">
                                    <tr>
                                        <th class="text-success">#</th>
                                        <th class="text-success">RAZÃO SOCIAL</th>
                                        <th class="text-success">NOME FANTASIA</th>
                                        <th class="text-success">CONTATO</th>
                                        <th class="text-success">OPÇÕES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($radiologistas['inativos'] as $radiologista)
                                        <tr>
                                            <td class="text-center">
                                                {{ $count++ }}
                                            </td>
                                            <td>
                                                [{{ $radiologista->id }}] - {{ $radiologista->razao_social }}
                                            </td>
                                            <td>
                                                {{ $radiologista->nome_fantasia }}
                                            </td>
                                            <td class="text-center">
                                                {{ $radiologista->celular }}
                                            </td>
                                            <td class="text-center" id_radiologista="{{ $radiologista->id }}">
                                                <button class="btn btn-success btn-sm ativar" title="Ativar"> 
                                                    <i class="la la-check-square text-white font-size-22"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif 
        </div>
    </div>
@endcan

<script>
    function desativarRadiologista() {
        $('.desativar').on('click', function() {
            let id_radiologista = $(this).parent().attr('id_radiologista');
            desativaBotao(this);
            
            swal({
                title: 'Desativar?',
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
                        url: "radiologistas/"+id_radiologista,
                        type: 'delete',
                        dataType: "JSON",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id_radiologista
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

    function ativarRadiologista() {
        $('.ativar').on('click', function() {
            let id_radiologista = $(this).parent().attr('id_radiologista');
            desativaBotao(this);
            
            swal({
                title: 'Ativar?',
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
                        url: "radiologistas/ativar/"+id_radiologista,
                        type: 'put',
                        dataType: "JSON",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id_radiologista
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
        desativarRadiologista();
        ativarRadiologista();
        dataTable('table_ativos');
        dataTable('table_inativos');
    });
</script>

@endsection