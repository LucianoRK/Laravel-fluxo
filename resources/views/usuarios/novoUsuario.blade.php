@extends('layouts.app')

@section('title', 'Novo Usuário')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Novo Usuário</h5>
            <form action="{{ route('usuarios.store') }}" method="POST">

                @include('usuarios.formUsuario');

                <div class="card-footer bg-light">
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="offset-sm-3 col-md-5">
                                        <button type="submit" id="novo_usuario_gravar" class="btn btn-primary btn-rounded">Gravar</button>
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

            $("#comboCidades").load("/endereco/comboCidades", { _token: "{{ csrf_token() }}", estado:estado }, function() {
                
            });
        });
    }

    $(document).ready(function() { 
        comboCidades();
    });
</script>
@endsection