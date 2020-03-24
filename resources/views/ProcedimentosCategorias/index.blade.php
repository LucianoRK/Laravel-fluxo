@extends('layouts.app')

@section('title', 'Procedimentos Categorias')

@section('content')

@can('permissao', 11)
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <h5 class="card-header text-success">
                            <div class="text-right">
                                <a class="btn btn-primary" href="usuarios/create">Nova Categoria</a>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <span class="align-middle">CATEGORIAS DE PROCEDIMENTOS</span>
                                </div>
                            </div>
                        </h5>

                        <table class="table table-bordered table-striped table_categorias">
                            <thead class="text-center">
                                <tr>
                                    <th class="text-success">#</th>
                                    <th class="text-success">NOME CATEGORIA</th>
                                    <th class="text-success">OPÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($categorias) 
                                    @foreach ($categorias as $categoria)
                                        <tr>
                                            <td class="text-center">
                                                {{ $count++}}
                                            </td>
                                            <td>
                                                [{{ $categoria->id }}] - {{ $categoria->nome }}
                                            </td>
                                            <td class="text-center" id_categoria="{{ $categoria->id }}">
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
    function desativarCategoria() {
        $('.desativar').on('click', function() {
            let id_categoria = $(this).parent().attr('id_categoria');
            desativaBotao(this);
            
            swal({
                title: 'Desativar categoria?',
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
                        url: "procedimentosCategorias/"+id_categoria,
                        type: 'delete',
                        dataType: "JSON",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id_categoria
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
        dataTable('table_categorias');
        desativarCategoria();
    });
</script>

@endsection