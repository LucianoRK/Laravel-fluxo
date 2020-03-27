@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Editar Usuário</h5>
                <form action="{{ route('usuarios.update', $usuario->id)}}" method="POST">
                    @method('PUT')
                    
                    @include('usuarios.formUsuario');
                    <input type="hidden" name="cidade_edit" id="cidade_edit" value="{{$endereco->fk_cidade ?? false }}">
                    <input type="hidden" name="fk_tipo_usuario" id="fk_tipo_usuario" value="{{$usuario->fk_tipo_usuario ?? false }}">

                    <div class="card-footer bg-light">
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="offset-sm-3 col-md-5">
                                            <button type="submit" class="btn btn-primary btn-rounded">Gravar</button>
                                            <a href="{{ url("/usuarios") }}" class="btn btn-secondary clear-form btn-rounded btn-outline ">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function comboCidades() {
            $("#estado").on('change', function() {
                let estado = $(this).val();
                let cidade = $('#cidade_edit').val();
    
                $("#comboCidades").load("/endereco/comboCidades", { _token: "{{ csrf_token() }}", estado:estado, cidade_edit:cidade }, function() {
                    
                });
            });
        }
    
        $(document).ready(function() { 
            let tipo_user = $("#fk_tipo_usuario").val();
            comboCidades();
    
            if ($("#estado").val()) {
                $("#estado").trigger( "change" );
            }

            if (tipo_user == 3) {
                $('input:checkbox').prop("disabled", false);
            }
        });
    </script>
@endsection