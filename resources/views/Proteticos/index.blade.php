@extends('layouts.app')

@section('title', 'Protéticos')

@section('content')

@can('permissao', 12)
    <div class="row">
        <div class="col-md-12">
            <!-- PROTÉTICOS ATIVOS -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <h5 class="card-header text-success">
                            <div class="text-right">
                                <a class="btn btn-primary" href="proteticos/create">Novo Protético</a>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <span class="align-middle">PROTÉTICOS ATIVOS - [ {{ $empresa->nome }} ]</span>
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
                                @if ($proteticos['ativos']) 
                                    @foreach ($proteticos['ativos'] as $protetico)
                                        <tr>
                                            <td class="text-center">
                                                {{ $count++}}
                                            </td>
                                            <td>
                                                [{{ $protetico->id }}] - {{ $protetico->nome_fantasia }}
                                            </td>
                                            <td>
                                                {{ $protetico->razao_social }}
                                            </td>
                                            <td class="text-center">
                                                {{ $protetico->celular }}
                                            </td>
                                            <td class="text-center" id_protetico="{{ $protetico->id }}">
                                                <a href="{{ url("proteticos/$protetico->id/edit") }}" class="btn btn-info btn-sm editar" title="Editar"> 
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

            <!-- USUARIOS INATIVOS -->
            @if ( count($proteticos['inativos']) > 0) 
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h5 class="card-header text-danger">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <span class="align-middle">PROTÉTICOS INATIVOS - [ {{ $empresa->nome }} ]</span>
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
                                    @foreach ($proteticos['inativos'] as $protetico)
                                        <tr>
                                            <td class="text-center">
                                                {{ $count++ }}
                                            </td>
                                            <td>
                                                [{{ $protetico->id }}] - {{ $protetico->razao_social }}
                                            </td>
                                            <td>
                                                {{ $protetico->nome_fantasia }}
                                            </td>
                                            <td class="text-center">
                                                {{ $protetico->celular }}
                                            </td>
                                            <td class="text-center" id_protetico="{{ $protetico->id }}">
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
    function desativarUsuario() {
        $('.desativar').on('click', function() {
            let id_protetico = $(this).parent().attr('id_protetico');
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
                        url: "proteticos/"+id_protetico,
                        type: 'delete',
                        dataType: "JSON",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id_protetico
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

    function ativarUsuario() {
        $('.ativar').on('click', function() {
            let id_protetico = $(this).parent().attr('id_protetico');
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
                        url: "proteticos/ativar/"+id_protetico,
                        type: 'put',
                        dataType: "JSON",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id_protetico
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
        desativarUsuario();
        ativarUsuario();
        dataTable('table_ativos');
        dataTable('table_inativos');
    });
</script>

@endsection