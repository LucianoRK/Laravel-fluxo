<form action="{{ route('clientes.update', $cliente->id)}}" method="POST">
    @method('PUT')
    {{ csrf_field() }}
    
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputNome">*Nome</label>
            <input type="text" class="form-control" id="inputNome" name="nome" value="{{$cliente->nome ?? old('nome')}}" disabled>
            </div>
       
            <div class="form-group col-md-3">
                <label for="inputCpf">*CPF</label>
                <input type="text" class="form-control cpfMask" id="inputCpf" name="cpf" value="{{$cliente->cpf ?? old('cpf')}}" disabled>
            </div>
            <div class="form-group col-md-3">
                <label for="inputRg">RG</label>
                <input type="text" class="form-control" id="inputRg" name="rg" value="{{$cliente->rg ?? false}}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputDataNascimento">*Data Nascimento</label>
                <input type="date" class="form-control" id="inputDataNascimento" name="data_nascimento" value="{{$cliente->data_nascimento ?? false}}" disabled>
            </div>
            <div class="form-group col-md-3">
                <label for="inputSexo">*Sexo</label>
                <select id="inputSexo" class="form-control" name="sexo">
                    <option {{$cliente->femenino ? 'selected' : '' }} value="femenino"> Femenino </option>
                    <option {{$cliente->masculino ? 'selected' : '' }} value="masculino"> Masculino </option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEstadoCivil">*Estado Civil</label>
                <select id="inputEstadoCivil" class="form-control" name="estado_civil">
                    <option {{$cliente->solteiro ? 'selected' : '' }} value="solteiro"> Solteiro(a) </option>
                    <option {{$cliente->casado ? 'selected' : '' }} value="casado"> Casado(a) </option>
                    <option {{$cliente->separado ? 'selected' : '' }} value="separado"> Separado(a) </option>
                    <option {{$cliente->divorciado ? 'selected' : '' }} value="divorciado"> Divórciado(a) </option>
                    <option {{$cliente->viuvo ? 'selected' : '' }} value="viuvo"> Viúvo(a) </option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputNacionalidade">*Nacionalidade</label>
                <select id="inputNacionalidade" class="form-control" name="nacionalidade" disabled>
                    @if ($cliente->nacionalidade == 'brasileiro')
                        <option value="brasileiro"> Brasileiro(a) </option>
                    @elseif ($cliente->nacionalidade == 'estrangeiro'))
                        <option value="estrangeiro"> Estrangeiro(a) </option>
                    @endif
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputCelularTitular">*Celular Titular <i title="ATENÇÃO: Este número será usado na cobrança, tenha certeza que o número é do titular" style="cursor:pointer" class="zmdi zmdi-help-outline zmdi-hc-fw"> </i> </label>
                <input type="text" class="form-control celularMask" id="inputCelularTitular" name="cel_titular" value="{{$cliente->cel_titular ?? false}}">
            </div>
            <div class="form-group col-md-4">
                <label for="inputCelularRecado">Celular Recado</label>
                <input type="text" class="form-control" id="inputCelularRecado" placeholder="Ex: Fulano 42999999999" name="cel_recado" value="{{$cliente->cel_recado ?? false}}">
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="email" value="{{$cliente->email ?? false}}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputProfissao">Profissão</label>
                <input type="text" class="form-control" id="inputProfissao" name="profissao" value="{{$cliente->profissao ?? false}}">
            </div>
            <div class="form-group col-md-4">
                <label for="inputTrabalho">Trabalho</label>
                <input type="text" class="form-control" id="inputTrabalho" name="trabalho" value="{{$cliente->trabalho ?? false}}">
            </div>
            <div class="form-group col-md-4">
                <label for="inputFoneTrabalho">Telefone Trabalho</label>
                <input type="text" class="form-control" id="inputFoneTrabalho" name="fone_trabalho" value="{{$cliente->fone_trabalho ?? false}}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputRendaMedia">Renda Média</label>
                <input type="text" class="form-control valorMask" id="inputRendaMedia" name="renda_media" value="{{$cliente->renda_media ?? false}}">
            </div>
            <div class="form-group col-md-4">
                <label for="inputResidencia">Residência</label>
                <select id="inputResidencia" class="form-control" name="residencia" value="{{$cliente->residencia ?? false}}">
                    <option {{$cliente->propria ? 'selected' : '' }} value="propria"> Própria </option>
                    <option {{$cliente->alugada ? 'selected' : '' }} value="alugada"> Alugada </option>
                    <option {{$cliente->outros ? 'selected' : '' }} value="outros"> Outros </option>
                </select>
            </div>
        </div>

        <hr class="dashed">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputNomeMae">Nome da Mãe</label>
                <input type="text" class="form-control" id="inputNomeMae" name="nome_mae" value="{{$cliente->nome_mae ?? false}}" disabled>
            </div>
        </div>
        
        <hr class="dashed">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="estado">*Estado</label>
                <select id="estado" class="form-control" name="estado">
                    @if ($estados)
                        @foreach($estados as $estado)
                            @if(isset($endereco->fk_estado) && $endereco->fk_estado == $estado->id || old('estado') == $estado->id)
                                <option selected value="{{ $estado->id }}"> {{ $estado->nome.' - '.$estado->uf }} </option>
                            @else
                                <option value="{{ $estado->id }}"> {{ $estado->nome.' - '.$estado->uf }} </option>
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="form-group col-md-4">
                <label>*Cidade</label>
                <div id="comboCidades">
                    <input disabled value="Selecione um estado antes" type="text" class="form-control">
                </div>
            </div>
            

            <div class="form-group col-md-4">
                <label for="inputCep">*CEP</label>
                <input type="text" class="form-control cepMask" id="inputCep" name="cep" value="{{$endereco->cep ?? false}}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputLogradouro">*Logradouro</label>
                <input type="text" class="form-control" id="inputLogradouro" name="logradouro" value="{{$endereco->logradouro ?? false}}">
            </div>
            <div class="form-group col-md-2">
                <label for="inputNumero">*Número</label>
                <input type="text" class="form-control" id="inputNumero" name="numero" value="{{$endereco->numero ?? false}}">
            </div>
            <div class="form-group col-md-3">
                <label for="inputBairro">*Bairro</label>
                <input type="text" class="form-control" id="inputBairro" name="bairro" value="{{$endereco->bairro ?? false}}">
            </div>
            <div class="form-group col-md-3">
                <label for="inputComplemento">Complemento</label>
                <input type="text" class="form-control" id="inputComplemento" name="complemento" value="{{$endereco->complemento ?? false}}">
            </div>
        </div>

        <hr class="dashed">
        <div class="form-group">
            <label for="observacoes">Observações</label>
            <textarea class="form-control" id="observacoes" name="obs_cadastro" rows="3"> {{$cliente->obs_cadastro ?? false}} </textarea>
        </div>
    </div>

    <div class="card-footer bg-light text-right">
        <div class="form-actions">
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-rounded">Salvar</button>
                    <a href="{{ url("/") }}" class="btn btn-secondary clear-form btn-rounded btn-outline ">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="cidade_edit" id="cidade_edit" value="{{$endereco->fk_cidade ?? false }}">
</form>

<script>
    function comboCidades() {
        $("#estado").on('change', function() {
            let estado = $(this).val();
            let cidade = $('#cidade_edit').val();

            $("#comboCidades").load("/endereco/comboCidades", { _token: "{{ csrf_token() }}", estado:estado, cidade_edit:cidade }, function() {
                
            });
        });
    }

    $(document).ready(function() { 
        comboCidades();

        if ($("#estado").val()) {
            $("#estado").trigger( "change" );
        }
    });
</script>