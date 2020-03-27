@extends('layouts.app')

@section('title', 'Editar Radiologista')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Editar Radiologista</h5>
                <form action="{{ route('radiologistas.update', $radiologista->id)}}" method="POST">
                    @method('PUT')
                    
                    @include('empresas.radiologistas.formRadiologista');
                    <input type="hidden" name="cidade_edit" id="cidade_edit" value="{{$endereco->fk_cidade ?? false }}">

                    <div class="card-footer bg-light">
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="offset-sm-3 col-md-5">
                                            <button type="submit" class="btn btn-primary btn-rounded">Gravar</button>
                                            <a href="{{ url("/radiologistas") }}" class="btn btn-secondary clear-form btn-rounded btn-outline ">Cancelar</a>
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
            comboCidades();
    
            if ($("#estado").val()) {
                $("#estado").trigger( "change" );
            }
        });
    </script>
@endsection