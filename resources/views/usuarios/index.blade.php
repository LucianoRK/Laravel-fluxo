@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')

<div class="row">
    <div class="col-12">
        <!-- USUARIOS ATIVOS -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <h5 class="card-header text-success">
                        <div class="text-right">
                            <a class="btn btn-primary" href="usuarios/create">Novo Usuário</a>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <span class="align-middle">USUÁRIOS ATIVOS - [ {{ $empresa->nome }} ]</span>
                            </div>
                        </div>
                    </h5>

                    <table class="table table-bordered table-striped table_ativos">
                        <thead class="text-center">
                            <tr>
                                <th class="text-success">#</th>
                                <th class="text-success">NOME</th>
                                <th class="text-success">TIPO</th>
                                <th class="text-success">OPÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($usuarios['ativos']) 
                                @foreach ($usuarios['ativos'] as $usuario)
                                    <tr>
                                        <td class="text-center">
                                            {{ $usuario->id }}
                                        </td>
                                        <td>
                                            {{ $usuario->nome }}
                                        </td>
                                        <td>
                                            {{ $usuario->tipo_usuario }}
                                        </td>
                                        <td class="text-center" id_user="{{ $usuario->id }}">
                                            <button class="btn btn-info btn-sm editar" title="Editar"> 
                                                <i class="la la-edit text-white font-size-22"></i> 
                                            </button>

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
        @if ( count($usuarios['inativos']) > 0) 
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <h5 class="card-header text-danger">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <span class="align-middle">USUÁRIOS INATIVOS - [ {{ $empresa->nome }} ]</span>
                                </div>
                            </div>
                        </h5>

                        <table id="bs4-table" class="table table-striped table-bordered table_inativos">
                            <thead class="text-center">
                                <tr>
                                    <th class="text-danger">#</th>
                                    <th class="text-danger">NOME</th>
                                    <th class="text-danger">TIPO</th>
                                    <th class="text-danger">OPÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios['inativos'] as $usuario)
                                    <tr>
                                        <td class="text-center">
                                            {{ $usuario->id }}
                                        </td>
                                        <td>
                                            {{ $usuario->nome }}
                                        </td>
                                        <td>
                                            {{ $usuario->tipo_usuario }}
                                        </td>
                                        <td class="text-center" id_user="{{ $usuario->id }}">
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

<script>
    function desativarUsuario() {
        $('.desativar').on('click', function() {
            let id_user = $(this).parent().attr('id_user');
            desativaBotao(this);
            
            swal({
                title: 'Desativar usuário?',
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
                        url: "usuarios/"+id_user,
                        type: 'delete',
                        dataType: "JSON",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id_user
                        },
                        success: function (data){
                            if (data) {
                                swal({
                                    position: '',
                                    type: 'success',
                                    title: 'Sucesso!',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            } else {
                                swal({
                                    position: '',
                                    type: 'error',
                                    title: 'Erro!',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }

                            setTimeout( function() {
                                window.location.reload()
                            }, 1250 );
                        }
                    });
                }
                ativarBotao(this);
            })
        });
    }

    function ativarUsuario() {
        $('.ativar').on('click', function() {
            let id_user = $(this).parent().attr('id_user');
            desativaBotao(this);
            
            swal({
                title: 'Ativar usuário?',
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
                        url: "usuarios/ativar/"+id_user,
                        type: 'put',
                        dataType: "JSON",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id_user
                        },
                        success: function (data){
                            if (data) {
                                swal({
                                    position: '',
                                    type: 'success',
                                    title: 'Sucesso!',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            } else {
                                swal({
                                    position: '',
                                    type: 'error',
                                    title: 'Erro!',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }

                            setTimeout( function() {
                                window.location.reload()
                            }, 1250 );
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