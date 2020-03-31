@extends('layouts.app')

@section('title', 'Editar Procedimento')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Editar Procedimento</h5>
                <form action="{{ route('procedimentos.update', $procedimento->id)}}" method="POST">
                    @method('PUT')
                    @include('procedimentos.formProcedimento');

                    <div class="card-footer bg-light">
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="offset-sm-3 col-md-5">
                                            <button type="submit" class="btn btn-primary btn-rounded">Gravar</button>
                                            <a href="{{ url("/procedimentos") }}" class="btn btn-secondary clear-form btn-rounded btn-outline ">Cancelar</a>
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
@endsection