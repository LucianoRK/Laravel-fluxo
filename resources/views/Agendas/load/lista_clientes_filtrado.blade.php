<select class="form-control select_clientes">
    @foreach ($clientes as $cliente)
        <option id_tratamento='{{$cliente->id_tratamento}}' id_cliente='{{$cliente->id_cliente}}'>
            {{$cliente->nome, 0}} - {{$cliente->especialidade_descricao}} - [{{$cliente->id_tratamento}}]
        </option>
    @endforeach
</select>
<script>
$(document).ready(function(){
   
});
</script>