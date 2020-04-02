@if (count($clientes) > 0) 
    @foreach ($clientes as $cliente)    
        <div class="dropdown-item cliente_list pointer" title="CPF: {{ Helper::formatCpf($cliente->cpf) }}">
            <a href="/informacoesCliente/{{$cliente->id}}">
                {{substr($cliente->nome, 0, 40)}}
            </a>
        </div>
    @endforeach
@else 
    <div class="dropdown-item cliente_list pointer">
        <span style="cursor: pointer">
            Nenhum cliente encontrado.
        </span>
    </div>   
@endif