@extends('layouts.app')


@section('title', 'Agenda')


@section('content')
    
<div class="container">
    <div class="row mb-2">
        <div class="input-group col-8">
            <span class="input-group-text" id="horario"> 08:00</span>
            <input type="text" class="form-control" placeholder="Nome"  aria-describedby="horario">
        </div>
        <div class="col-4 form">
            <button class="btn btn-info">EDITAR</button>
            <button class="btn btn-danger">DELETAR</button>
            <button class="btn btn-success">CADASTRAR</button>
            <button class="btn btn-dark">NADA</button>
        </div>
    </div>
    <div class="row mb-2">
        <div class="input-group col-8">
            <span class="input-group-text" id="horario"> 09:00</span>
            <input type="text" class="form-control" placeholder="Nome"  aria-describedby="horario">
        </div>
        <div class="col-4 form">
            <button class="btn btn-info">EDITAR</button>
            <button class="btn btn-danger">DELETAR</button>
            <button class="btn btn-success">CADASTRAR</button>
            <button class="btn btn-dark">NADA</button>
        </div>
    </div>
    <div class="row mb-2">
        <div class="input-group col-8">
            <span class="input-group-text" id="horario"> 10:00</span>
            <input type="text" class="form-control" placeholder="Nome"  aria-describedby="horario">
        </div>
        <div class="col-4 form">
            <button class="btn btn-info">EDITAR</button>
            <button class="btn btn-danger">DELETAR</button>
            <button class="btn btn-success">CADASTRAR</button>
            <button class="btn btn-dark">NADA</button>
        </div>
    </div>
    <div class="row mb-2">
        <div class="input-group col-8">
            <span class="input-group-text" id="horario">11:00</span>
            <input type="text" class="form-control" placeholder="Nome"  aria-describedby="horario">
        </div>
        <div class="col-4 form">
            <button class="btn btn-info">EDITAR</button>
            <button class="btn btn-danger">DELETAR</button>
            <button class="btn btn-success">CADASTRAR</button>
            <button class="btn btn-dark">NADA</button>
        </div>
    </div>
    <div class="row mb-2">
        <div class="input-group col-8">
            <span class="input-group-text" id="horario"> 12:00</span>
            <input type="text" class="form-control" placeholder="Nome"  aria-describedby="horario">
        </div>
        <div class="col-4 form">
            <button class="btn btn-info">EDITAR</button>
            <button class="btn btn-danger">DELETAR</button>
            <button class="btn btn-success">CADASTRAR</button>
            <button class="btn btn-dark">NADA</button>
        </div>
    </div>
</div>

@endsection
