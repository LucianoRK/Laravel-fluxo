<select class="form-control select_clientes">
    @foreach ($clientes as $cliente)
        <option href="agenda/create" title="CPF: {{$cliente->cpf}}">{{$cliente->nome, 0}} - {{$cliente->especialidade_descricao}} - [{{$cliente->id_tratamento}}]</option>
    @endforeach
</select>
<script>
$(document).ready(function(){
   
});
</script>