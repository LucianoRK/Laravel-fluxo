@foreach ($clientes as $cliente)
    <a class="dropdown-item" title="CPF: {{$cliente->cpf}}" href="create/{{$cliente->id}}">{{substr($cliente->nome, 0, 40)}}</a>
@endforeach

