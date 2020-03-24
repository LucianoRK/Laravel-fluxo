@foreach ($clientes as $cliente)
    <div class="dropdown-item cliente_list" title="CPF: {{$cliente->cpf}}" href="agenda/create">{{substr($cliente->nome, 0, 40)}} - {{$cliente->especialidade_descricao}} - [{{$cliente->id_tratamento}}]</div>
@endforeach