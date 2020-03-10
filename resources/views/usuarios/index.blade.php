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
                                <span class="align-middle">USUÁRIOS ATIVOS - [ {{ $empresa->nome }} ]</span>
                            </div>
                        </div>
                    </h5>

                    <table class="table table-bordered table-striped">
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
                            @endif    
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
                                <span class="align-middle">USUÁRIOS INATIVOS - [ {{ $empresa->nome }} ]</span>
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
                            @if ($usuarios['inativos']) 
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
                                        <td class="text-center">
                                            <button class="btn btn-success btn-rounded btn-sm" title="Reativar">
                                                <i class="la la-check text-white font-size-22"></i>
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
@endsection