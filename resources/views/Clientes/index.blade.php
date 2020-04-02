@extends('layouts.app')

@section('title', 'Informações do Cliente')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header"> 
                <span class="align-middle text-primary">
                    INFORMAÇÕES DO CLIENTE - [ NOME ]
                </span>
            </h5>
            <div class="card-body">
                <ul class="nav nav-pills nav-pills-primary nav-fill mb-3" id="pills-demo-4" role="tablist">
                    <li class="nav-item" role="presentation"><a href="#cliente" class="nav-link active show" data-toggle="tab" aria-expanded="true">Cliente</a></li>
                    <li class="nav-item" role="presentation"><a href="#cliente-conjuge" class="nav-link" data-toggle="tab" aria-expanded="true">Cônjuge</a></li>
                    <li class="nav-item" role="presentation"><a href="#cliente-dependentes" class="nav-link" data-toggle="tab" aria-expanded="true">Dependente(s)</a></li>
                    <li class="nav-item" role="presentation"><a href="#cliente-tratamentos" class="nav-link" data-toggle="tab" aria-expanded="true">Tratamento(s)</a></li>
                    <li class="nav-item" role="presentation"><a href="#cliente-financeiro" class="nav-link" data-toggle="tab" aria-expanded="true">Financeiro</a></li>
                    <li class="nav-item" role="presentation"><a href="#cliente-agenda" class="nav-link" data-toggle="tab" aria-expanded="true">Agenda</a></li>
                </ul>
                <hr class="dashed">
            </div>
            
            <div class="tab-content">
                <div class="tab-pane fadeIn active show" id="cliente">
                    @include('clientes.informacoesCliente.cliente')
                </div>
                <div class="tab-pane fadeIn" id="cliente-conjuge">
                    @include('clientes.informacoesCliente.conjuge')
                </div>
                <div class="tab-pane fadeIn" id="cliente-dependentes">
                    @include('clientes.informacoesCliente.dependentes')
                </div>
                <div class="tab-pane fadeIn" id="cliente-tratamentos">
                    @include('clientes.informacoesCliente.tratamentos')
                </div>
                <div class="tab-pane fadeIn" id="cliente-financeiro">
                    @include('clientes.informacoesCliente.financeiro')
                </div>
                <div class="tab-pane fadeIn" id="cliente-agenda">
                    @include('clientes.informacoesCliente.agenda')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
