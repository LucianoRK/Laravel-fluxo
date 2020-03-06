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
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <span class="align-middle">USUÁRIOS ATIVOS - [ ]</span>
                            </div>
                        </div>
                    </h5>

                    <table class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th class="text-success">#</th>
                                <th class="text-success">NOME</th>
                                <th class="text-success">TIPO</th>
                                <th class="text-success">ACESSOS DISPONIVEIS</th>
                                <th class="text-success">OPÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
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
                                    <td class="text-center">
                                        <span class="btn">
                                            <i class="la la-plus-circle font-size-22 text-success" title="Adcionar"></i>
                                            <i class="la la-refresh font-size-22 text-danger" title="Resetar"></i>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-info btn-rounded btn-sm" title="Editar">
                                            <i class="la la-edit text-white font-size-22"></i>
                                        </button>
                                        <button class="btn btn-danger btn-rounded btn-sm" title="Desativar">
                                            <i class="la la-trash text-white font-size-22"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- USUARIOS INATIVOS -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <h5 class="card-header text-danger">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <span class="align-middle">USUÁRIOS INATIVOS - [ ]</span>
                            </div>
                        </div>
                    </h5>

                    <table id="bs4-table" class="table table-striped table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th class="text-danger">#</th>
                                <th class="text-danger">NOME</th>
                                <th class="text-danger">TIPO</th>
                                <th class="text-danger">OPÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-danger">
                                <td class="text-center">
                                    
                                </td>

                                <td>
                                    
                                </td>
                                <td class="text-center">
                                    
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-success btn-rounded btn-sm reativar_user" title="Reativar" id_usuario_reativar="">
                                        <i class="la la-check text-white font-size-22"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection