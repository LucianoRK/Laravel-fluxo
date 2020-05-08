<select class="form-control select_clientes">
    @foreach ($clientes as $cliente)
        <option value="{{$cliente->id_tratamento}}">
            {{$cliente->nome, 0}} - {{$cliente->especialidade_descricao}} - [{{$cliente->id_tratamento}}]
        </option>
    @endforeach
</select>
