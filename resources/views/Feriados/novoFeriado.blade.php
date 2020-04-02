@extends('layouts.app')

@section('title', 'Novo Feriado')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header text-primary">NOVO FERIADO</h5>
            <form action="{{ route('feriados.store') }}" method="POST">

                @include('feriados.formFeriado')

                <div class="card-footer bg-light">
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="offset-sm-3 col-md-5">
                                        <button type="submit" class="btn btn-primary btn-rounded">Gravar</button>
                                        <a href="{{ url("/feriados") }}" class="btn btn-secondary clear-form btn-rounded btn-outline ">Cancelar</a>
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